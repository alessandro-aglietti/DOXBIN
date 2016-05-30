<?php
//ini_set('display_errors', 'on');
header('Content-Disposition: inline; filename="index.php"');
session_start();

$name = hash('sha512', mt_rand());
$_SESSION["name"] = $name;

$dox = hash('sha512', mt_rand());
$_SESSION["dox"] = $dox;

$hidden = hash('sha512', mt_rand());
$_SESSION["hidden"] = $hidden;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>DOXBIN - Post Dox</title>
<link href="/style/blue.css" rel="stylesheet" type="text/css" />
</head>
<body id="center" onload="document.getElementById('captcha-form').focus()">
<h1>DOXBIN</h1>
<h2>Not sure what this site's about? Click the &quot;Dox Archive&quot; link below and browse around before using the text boxes below.</h2>
<h2><a href="doxviewer.php">Dox Archive</a> | <a href="old/">Old Dox</a> | <a href="fail/">Fail Dox</a> | <a href="proscription.php">Proscription List</a> | <a href="faq.php">FAQ</a> | <a href="privacy.php">Privacy Policy</a></h2><br />
<form action="post.php" method="post">
<p>
<input type="text" id="name" name="<?php echo $_SESSION["name"]; ?>" placeholder="Enter a name here" /><br />
<textarea id="dox" name="<?php echo $_SESSION["dox"]; ?>" rows="25" cols="80" placeholder="DOX go here. This is not your personal slam page, nor is it a page on which to brag about having 0wned someone, or to complain that they 0wned you. Post whatever info you have and SHUT UP. There are no limits on what kind of info you can post, so feel free to drop SSNs, financial, medical info, or anything else that is blatantly illegal. We have a strict non-removal policy, so once the dox go up, they stay up unless they are inaccurate, or you didn't include at least a name and address. Asking for dox to be removed is probably the surest way for them to be updated and expanded upon. You have been warned."></textarea><br />
<p><strong>Type in the CAPTCHA (Thanks, <a href="https://code.google.com/p/cool-php-captcha/">cool-php-captcha</a>) because <a href="/doxviewer.php?dox=Krashed">Krashed</a> wanted to play:</strong></p>
<img src="captcha.php" id="captcha" /><br/>
<a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>


<input type="text" name="captcha" id="captcha-form" autocomplete="off" /><br/>
<input type="submit" value="Post" /><br />
<input type="text" name="<?php echo $hidden; ?>" value="" style="visibility: hidden;" />
</p>

<?php
/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
        $captcha_message = "Invalid captcha";
        $style = "background-color: #FF606C";
    } else {
        $captcha_message = "Valid captcha";
        $style = "background-color: #CCFF99";
    }

    $request_captcha = htmlspecialchars($_REQUEST['captcha']);

    echo <<<HTML
        <div id="result" style="$style">
        <h2>$captcha_message</h2>
        <table>
        <tr>
            <td>Session CAPTCHA:</td>
            <td>{$_SESSION['captcha']}</td>
        </tr>
        <tr>
            <td>Form CAPTCHA:</td>
            <td>$request_captcha</td>
        </tr>
        </table>
        </div>
HTML;
    unset($_SESSION['captcha']);
}
?>

</form>
<p>
  Grab the <a href="code/">source code</a> and <a href="dx.tbz2">dox</a> archives today!<br />
  You can also browse the <a href="old/">old</a> and <a href="fail/">fail</a> dox folders.
</p>

<p>
Join us on IRC: irc.wtfux.org #doxbin<br />
Follow us on Twitter (<a href="https://twitter.com/#!/loldoxbin">@loldoxbin</a>)<br />
<a href="mailto:intangir@riseup.net">E-mail us here</a>. <a href="pgp.txt">Our PGP key</a> (Use it)<br />
Complaints: (414) 369-2464<br />
Bitcoin Tip Jar: 1CJWQv6FwjYLHbKKGHm82kyot2ioNbyEaQ<br />
<!-- Complaints: (315) 727-6807<br /> -->
<!-- Complaints: (514) 262-3126<br /> -->
</p>
</body>
</html>
