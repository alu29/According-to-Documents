<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); 

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient();

$articles_db = $db->collection('articles');
$articles = $articles_db->documents();
foreach ($articles as $article)
{
    echo "<a href=".$article['url'].">".$article['headline']."</a> by ".$article['publisher']."<br><br>";
    $i=0;
    foreach ($article['sources'] as $source)
    {   
        echo "- ".$source."<br>";
        $i++;
    }
    echo "<hr>";
}

?>