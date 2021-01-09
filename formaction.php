<?php

require_once('cnct.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['url']))
    {
        $stmt_insert = $link->prepare("INSERT INTO submissions (url) VALUES (?)");
        $stmt_insert->bind_param("s", $_POST['url']);
        $stmt_insert->execute();
        $stmt_insert->close();

        echo "<p>We've received your suggestion! Thank you.</p>";
    }
    // if (isset($_POST['email']))
    // {
    //     $stmt_insert = $link->prepare("INSERT INTO subscribers (email) VALUES (?)");
    //     $stmt_insert->bind_param("s", $_POST['url']);
    //     $stmt_insert->execute();
    //     $stmt_insert->close();

    //     echo "<p>You're subscribed! Thank you.</p>";
    // }
}

?>