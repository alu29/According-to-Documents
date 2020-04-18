<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient();

$handle=fopen("https://docs.google.com/spreadsheets/d/e/2PACX-1vRa7Hw4OQZ4Zwh7JKXavkF2ZfoUtprtyGicTtJJu2P6U7ffAofBStVjoqx-a9AEYh_LpVg5nlza0CEc/pub?output=csv", "r");

$i=0;
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) //https://www.php.net/manual/en/function.fgetcsv.php
{
    // if ($i==0)
    // {
    //     $fields = $data;
    //     $i++;
    // }

    // $headline = $data[0];
    // $publisher = $data[1];
    // $url = $data[2];
    // $date = $data[2];
    // $sources = explode(";", $data[3]);
    // $added_by = $data[4];

    $data = [
        'headline' => $data[0],
        'publisher' => $data[1],
        'url' => $data[2],
        'date' => $data[3],
        'sources' => $data[4],
        'added_by' => $data[5]
    ];
    $db->collection('articles')->document($i)->set($data);

    $i++;
}

$db->collection('articles')->document('0')->delete();

echo "Added ".number_format($i)." rows.";

?>