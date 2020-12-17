<?php

require_once('cnct.php');

function DateLastSundayInYMD() // Copied over from main.php
{
    $DayOfWeekNumber = date("w"); // On a Sunday, this will be 0; Monday, 1; Tuesday, 2; Wednesday, 3; etc.
    $DateWeWantAsAString = "-".$DayOfWeekNumber." days"; // On a Sunday, this will just be "- 0 days"; on a monday, this will be "- 1 days"
    //However, the second parameter of the date() function that we use below, can't handle a string; it needs it to be of type time
    $DateOfLastSunday = strtotime($DateWeWantAsAString); // This line converts the above ("- x days") to a time (the number of seconds since 1970-01-01)
    $date = date("Y-m-d", $DateOfLastSunday); // This then converts it to a date in the format Y-m-d

    // $date = date("Y-m-d", strtotime("-".date("w")." days")); (This is how Girish had it before, not broken down)

    // Alexandra's other way of doing it.
    // $DateLastSundayInSecondsSinceUnixEpoch = time () - ($DayOfWeekNumber * 60 * 60 * 24);
    // $DateLastSundayInYMD = date ("Y-m-d", $DateLastSundayInSecondsSinceUnixEpoch);
    // $date = $DateLastSundayInYMD;
    
    return $date;
}

$all_articles = mysqli_query($link, "SELECT headline, publisher, url, date, sources FROM articles ORDER BY date DESC");

$rows = array(); // https://stackoverflow.com/a/383664/7207315

while($article = mysqli_fetch_array($all_articles, MYSQLI_ASSOC)) // This MYSQLI_ASSOC is new to me! I should have put it everywhere the last twenty years!
{
    $rows[] = $article;
}

print json_encode($rows);

?>