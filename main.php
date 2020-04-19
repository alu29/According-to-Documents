<?php

$Title = "According to Documents";
$Subtitle = "Investigative journalism of the highest caliber";

$BackgroundColor = "FFFFFF";
$MainColor = "374E5A";
$HighlightColor = "FF0000";

$Font_Face = "Raleway";

$iPod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");

if($iPad||$iPhone||$iPod||$android)
{
    $mobile = true;
}
else
{
    $mobile = false;
}

require_once 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;
$db = new FirestoreClient();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data = [
        'date' => date('Y-m-d'),
        'url' => $_POST['url']
    ];
    $db->collection('submissions')->add($data);
}

?>
<!DOCTYPE html> 
<html>
<head>
<title><?php echo $Title."-".$Subtitle; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<script src="https://kit.fontawesome.com/9057082ce7.js" crossorigin="anonymous"></script>
<style>
body
{
    background-color: #<?php echo $BackgroundColor; ?>;
    font-family: <?php echo $Font_Face; ?>;
    color: #<?php echo $MainColor; ?>;
    font-size: 15px;
    line-height: 1.6;
}

a
{
    color: #<?php echo $HighlightColor; ?>;
    font-weight: bold;
    text-decoration: none;
}

a:hover
{
    color: #<?php echo $HighlightColor; ?>;
    font-weight: bold;
    text-decoration: underline;
}

input
{
        box-shadow: none;
        background-color: #<?php echo $BackgroundColor; ?>;
        font-family: <?php echo $Font_Face; ?>;
        color: #<?php echo $HighlightColor; ?>;
        outline: 0;
        border-style: solid;
        border-width: 0 0 2px;
        border-color: #<?php echo $MainColor; ?>;;
        border-radius: 0px;
        font-size: 15px;
        
/*    https://stackoverflow.com/questions/37465458/input-text-field-with-only-bottom-border/37465540*/
}

input:focus
{
  border-color: #<?php echo $HighlightColor; ?>;
}

.publisher_or_sources
{
    color:grey;
    font-size: 14px;
}

.headline
{
    font-size: 16px;
    margin-top: -13px;
}

div
{
    padding: 25px;
}

/* https://www.w3schools.com/howto/howto_css_two_columns.asp */
.row 
{
  display: flex;
}

.column
{
  flex: 33%;
}

</style>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151140334-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-151140334-2');
</script>
</head>

<body>

<?php

if($mobile)
{
    $LogoSize = "75%";
}
else
{
    $LogoSize = "250";
}

?>
   
<CENTER><a href="/"><img src="logo.png" width=<?php echo $LogoSize; ?> height=<?php echo $LogoSize; ?>></a></CENTER>

<?php
if(!$mobile)
{
?>
<div class="row">
    <div class="column">
<?php
}
?>
        <h1>Welcome</h1>
        <p>The words &quot;according to documents&quot; in a news story signal investigative journalism of the highest caliber.
        <br><br>
        We want to celebrate reporting based on government or corporate reports, emails, private chat messages or something equally tangible—as opposed to that based on unnamed sources or rumors.
        <br><br>
        The idea is imperfect, of course, and some excellent reporting will be based on no documents and some terrible reporting will be based on many documents. But ultimately, it's a great rule of thumb.
        </p>

        <h1>About</h1>
        <p><i>According to Documents</i> was created in April 2020 by investigative reporters <a href="https://www.girishgupta.com" target="_blank">Girish Gupta</a>, now CTO at <i>Deepnews.ai</i>, and <a href="https://www.alexandraulmer.com/" target="_blank">Alexandra Ulmer</a>, a Special Correspondent at <i>Reuters</i>.
        </p>

<?php
if(!$mobile)
{
?>
    </div>
    <div class="column">
<?php
}
?>
        <h1>This week's selection</h1>


        <?php

            function DateLastSundayInYMD()
            {
                $DayOfWeekNumber = date("w"); // On a Sunday, this will be 0; Monday, 1; Tuesday, 2; Wednesday, 3; etc.
                $DateWeWantAsAString = "-".$DayOfWeekNumber." days"; // On a Sunday, this will just be "- 0 days"; on a monday, this will be "- 1 days"
                //However, the second parameter of the date() function that we use below, can't handle a string; it needs it to be of type time
                $DateOfLastSunday = strtotime($DateWeWantAsAString); // This line converts the above ("- x days") to a time (the number of seconds since 1970-01-01)
                $date = date("Y-m-d", $DateOfLastSunday); // This then converts it to a date in the format Y-m-d

                // $date = date("Y-m-d", strtotime("-".date("w")." days")); (This is how Girish had it before, not broken down)

                // Alexandra's other way of doing it.
                // $DateLastSundayInSecondsSinceUnixEpoch= time () - ($DayOfWeekNumber * 60 * 60 * 24);
                // $DateLastSundayInYMD = date ("Y-m-d", $DateLastSundayInSecondsSinceUnixEpoch);
                // $date = $DateLastSundayInYMD;
                
                return $date;
            }

            $articles_db = $db->collection('articles');
            $query = $articles_db
                ->where('date', '=', DateLastSundayInYMD())
                ->limit(5);
            $articles = $query->documents();

            foreach ($articles as $article)
            {
                if ($article->exists())
                {
                    echo "<p class=\"publisher_or_sources\"><i>".$article['publisher']."</i> citing <b>".$article['sources']."</b></p>";
                    echo "<p class=\"headline\"><a href=\"".$article['url']."\" target=\"_blank\">".$article['headline']."</a></p>";
                    echo "<br>";
                }
            }
        ?>
<?php

if(!$mobile)
{
?>
    </div>
    <div class="column">
<?php
}
?>
            <!-- Form copied (and heavily edited) from Mailchimp website, which provided correct form action, hidden variables, etc. https://us6.admin.mailchimp.com/lists/integration/embeddedcode?id=265953 -->
            <h1>Subscribe</h1>
            <form action="https://girishgupta.us6.list-manage.com/subscribe/post?u=8deb0bb0f3dfe79212f9cef9c&amp;id=09c1bd8f01" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <p>You'll get one email every Sunday with our selection of the week's top document-based investigative reporting. (We won't share your email address or spam you.)</p><br>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email" style="width:70%;">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8deb0bb0f3dfe79212f9cef9c_09c1bd8f01" tabindex="-1" value=""></div>
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="border-width: 2px;color:#374E5A">
            </form>

            <br><br>

            <h1>Got a suggestion?</h1>
            <?php
                if($_SERVER["REQUEST_METHOD"] != "POST")
                {
            ?>
                <form action="/" method="post">
                    <p>Help us highlight worthwhile reporting by submitting it below or <a href="mailto:hi@accordingtodocuments.com">emailing us</a>. We welcome work by freelancers, smaller publications and journalists covering underreported issues or countries.</p><br>
                    <!-- <input type="email" value="" name="email" placeholder="Your email" style="width:70%;"><br><br> -->
                    <input type="url" value="" name="url" placeholder="URL" style="width:70%;"> 
                    <input type="submit" value="Submit" name="subscribe" class="button" style="border-width: 2px;color:#374E5A">
                </form>
            <?php
                }
                else
                {
                    echo "<p><font color=#".$HighlightColor." size=8>Thank you!</font></p>";
                }
            ?>
<?php
if(!$mobile)
{
?>
    </div>
</div>
<?php
}
?>

<CENTER>
<p><font size=6><a href="https://www.twitter.com/accordingtodocs" target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://github.com/alu29/According-to-Documents" target="_blank"><i class="fab fa-github"></i></a></p>
<p><font size=2>&copy; 2020 Girish Gupta and Alexandra Ulmer </font></p>
</CENTER>

</body>
</html>


