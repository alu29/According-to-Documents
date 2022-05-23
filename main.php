<?php

require_once('cnct.php');

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

?>
<!DOCTYPE html> 
<html>
<head>
<title><?php echo $Title."-".$Subtitle; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<script src="https://kit.fontawesome.com/9057082ce7.js" crossorigin="anonymous"></script>
<script defer data-domain="accordingtodocuments.com" src="https://plausible.io/js/plausible.js"></script>
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
<script type="text/javascript">
function AddToMailingList(email){
  $.post("formaction.php", {email: email} , function(data){
            $("#mailinglistresult").html(data);
          });}
</script>
<script type="text/javascript">
function Submit(url){
  $.post("formaction.php", {url: url} , function(data){
            $("#submitresult").html(data);
          });}
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
        <p><i>According to Documents</i> was created by investigative reporters <a href="https://www.girishgupta.com/" target="_blank">Girish Gupta</a> and <a href="https://www.alexandraulmer.com/" target="_blank">Alexandra Ulmer</a>.
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
                // $DateLastSundayInSecondsSinceUnixEpoch = time () - ($DayOfWeekNumber * 60 * 60 * 24);
                // $DateLastSundayInYMD = date ("Y-m-d", $DateLastSundayInSecondsSinceUnixEpoch);
                // $date = $DateLastSundayInYMD;
                
                return $date;
            }

            $top_articles = mysqli_query($link, "SELECT * FROM articles WHERE date = '".DateLastSundayInYMD()."' ORDER BY date DESC LIMIT 0,5");

            while($top_article = mysqli_fetch_array($top_articles))
            {
                echo "<p class=\"headline\"><a href=\"".$top_article['url']."\" target=\"_blank\">".$top_article['headline']."</a></p>";
                echo "<p class=\"publisher_or_sources\"><i>".$top_article['publisher']."</i> citing <b>".$top_article['sources']."</b></p>";
                echo "<br>";
            }
        ?>
        
        <p><a href="#" onClick="ShowHide()">See archive...</a></p>
        <div id="archive" style="display:none">
            <?php
                $all_articles = mysqli_query($link, "SELECT * FROM articles ORDER BY date DESC");

                while($all_article = mysqli_fetch_array($all_articles))
                {
                    echo "<p class=\"headline\"><a href=\"".$all_article['url']."\" target=\"_blank\">".$all_article['headline']."</a></p>";
                    echo "<p class=\"publisher_or_sources\"><i>".$all_article['publisher']."</i> citing <b>".$all_article['sources']."</b></p>";
                    echo "<br>";
                }
            ?>
        </div>
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
                <iframe src="https://accordingtodocuments.substack.com/embed" height="320" style="border:1px solid #EEE; background:white;" frameborder="0" scrolling="no"></iframe>

            <h1>Got a suggestion?</h1>
                <p>Help us highlight worthwhile reporting by submitting it below or <a href="mailto:hi@accordingtodocuments.com">emailing us</a>. We welcome work by freelancers, smaller publications and journalists covering underreported issues or countries.</p><br>
                <input type="url" value="" id="url" placeholder="URL" style="width:70%;"> 
                <input type="submit" value="Submit" name="subscribe" class="button" style="border-width: 2px;color:#374E5A" onClick=Submit(document.getElementById("url").value)>
                <div id="submitresult"></div>
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
    
<script>
function ShowHide() {
  var x = document.getElementById("archive"); // Variable is the archive element //
  if (x.style.display === "none") { // If the DIV element is not showing, then 
    x.style.display = "block"; // Show it 
  } else { // if it is showing   
    x.style.display = "none"; // then hide it
  }
}
</script>

</body>
</html>


