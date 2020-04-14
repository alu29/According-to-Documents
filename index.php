<!DOCTYPE html> 
<html>
<head>
<title>According to Documents - Investigative journalism of the highest caliber</title>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
<style>
body
{
    background-color: white;
    font-family: Raleway;
    color: #374E5A;
    font-size: 15px;
}

a
{
    color: red;
    font-weight: bold;
    text-decoration: none;
}

a:hover
{
    color: red;
    font-weight: bold;
    text-decoration: underline;
}

input
{
        box-shadow: none;
        background-color: #FFFFFF;
        font-family: Raleway;
        color: red;
        outline: 0;
        border-style: solid;
        border-width: 0 0 2px;
        border-color: #374E5A;
        border-radius: 0px;
        font-size: 15px;
        
/*    https://stackoverflow.com/questions/37465458/input-text-field-with-only-bottom-border/37465540*/
}

input:focus
{
  border-color: red;
}

.publisher
{
    color:grey;
    font-size: 10px;
}

.headline
{
    font-size: 18px;
}

.centeredtext
{
    text-align:center;
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
</head>


<body>
   
<!-- <h1 class="centeredtext">According to Documents</h1> -->
<CENTER><img src="logo.png" width=250 height=250></CENTER>

<div class="row">
    <div class="column">
        <h1>Welcome</h1>
        <p>&quot;...according to documents...&quot; &mdash; These words demonstrate investigative journalism of the highest caliber.
            <br><br>
            We want to celebrate the work of reporters who obtain government reports, internal company emails or private chat messages in order to show their stories are true and, ultimately, how journalism based on concrete evidence makes for smarter, deeper stories.
            <br><br>
            The idea is imperfect, of course, and some excellent reporting will be based on no documents and some terrible reporting will be based on many documents. But ultimately, it's a great rule of thumb.
        </p>
    </div>
    <div class="column">
        <h1>Great journalism</h1>
            <p class="publisher">New York Times</p>
            <p class="headline"><a href="https://www.nytimes.com/2020/04/11/us/politics/coronavirus-red-dawn-emails-trump.html">The 'Red Dawn' Emails: 8 Key Exchanges on the Faltering Response to Coronavirus</a></p>
            <br>
            <p class="publisher">Indian Express</p>
            <p class="headline"><a href="https://indianexpress.com/article/india/india-lockdown-migrant-movement-labour-death-delhi-agra-morena-6337959/">Last call of an Indian migrant who died walking: "If you can, come get me"</a></p>
            <br>
            <p class="publisher">Reuters</p>
            <p class="headline"><a href="www.seattletimes.com">In change, sunny day in Toronto</a></p>
    </div>
    <div class="column">
            <!-- Form copied (and heavily edited) from Mailchimp website, which provided correct form action, hidden variables, etc. https://us6.admin.mailchimp.com/lists/integration/embeddedcode?id=265953 -->
            <h1>Subscribe</h1>
            <form action="https://girishgupta.us6.list-manage.com/subscribe/post?u=8deb0bb0f3dfe79212f9cef9c&amp;id=b7c89642aa" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <p>You'll get one email every Friday with the best evidence-based journalism in the world. We'll not share you email address or spam you.</p><br>
                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email" style="width:70%;">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8deb0bb0f3dfe79212f9cef9c_b7c89642aa" tabindex="-1" value=""></div>
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="border-width: 2px;color:#374E5A">
            </form>
        </p>
    </div>
</div>

</body>
</html>
