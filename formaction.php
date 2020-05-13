<?php

require_once 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient();

use \DrewM\MailChimp\MailChimp; //https://github.com/drewm/mailchimp-api

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['url']))
    {
        $data = [
            'date' => date('Y-m-d'),
            'url' => $_POST['url']
        ];
        $db->collection('submissions')->add($data);

        echo "<p>We've received your suggestion! Thank you.</p>";
    }
    if (isset($_POST['email']))
    {
        require_once("mailchimpapikey.php"); // Contains nothing but $MailChimpAPIKey = "...";
        $MailChimp = new MailChimp($MailChimpAPIKey);
        $MailChimp->post("lists/09c1bd8f01/members", [
            'email_address' => $_POST['email'],
            'status'        => 'subscribed',
        ]);

        echo "<p>You're subscribed! Thank you.</p>";
    }
}

?>