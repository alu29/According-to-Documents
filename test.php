<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient();



$articles_db = $db->collection('articles');
$query = $articles_db
    ->where('date', '=', '2020-04-19')
    ->orderBy('headline')
    ->limit(5);
$articles = $query->documents();

foreach ($articles as $article)
{
    if ($article->exists())
    {
        echo "<a href=".$article['url'].">".$article['headline']."</a> by ".$article['publisher']."<br><br>";
    }
    else
    {
        // printf('Document %s does not exist!' . PHP_EOL, $snapshot->id());
    }
}

?>