<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>DOXBIN - ALL FUTURE INSTANCES OF ICON BEGGING WILL BE RMED.</title>
<link href="/style/blue.css" rel="stylesheet" type="text/css" />
</head>
<body>
BTC Tip Jar: 1CJWQv6FwjYLHbKKGHm82kyot2ioNbyEaQ <br />
<a href="http://swat.city">SWAT CITY: NOT YOUR MOM'S HACKFORUMS EXCLUSIVE.</a><br />
<a href="http://databinhwin4xuxx.onion/">DATABIN: Because you guys forgot to bookmark it.</a><br />
<a href="index.php">Post Dox</a> <a href="doxviewer.php">Back to the archive</a> <a href="/faq.php">FAQ</a> <a href="proscription.php"> Proscription List</a> <a href="https://twitter.com/loldoxbin">Twitter</a><br />
<?php

/* This page does a lot of the heavy lifting. It displays the dox and calls archive.php
when a variable isn't given for "dox." It's mostly boring stuff, so the comments will 
be minimal. */

header('Content-Disposition: inline; filename="doxviewer.php"');

if (!isset($_GET['dox'])) {
    $_GET['dox'] = "undefine";
}

/* Some built-in defense against skids attempting directory traversal. 
Feel free to replace the ED link with goatse, The Last Measure, or even
your own drive-by download page. No legitimate user is going to trigger 
these ifs, so feel comfortable in being as evil as you want. */

$filename = $_GET['dox'];
if($filename == "") { include("archive.php"); die(); }
if(stripos($filename, '.') !== false) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }
if(stripos($filename, '/') !== false ) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }
if(stripos($filename, '%2f') !== false) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }

// Just some HTML rendering and adding the dox icon text.

if(file_exists('dox/'.$filename.'.txt')) {
    echo '<div class="doxheader">';

    if(file_exists('img/verification/'.$filename.'.txt')) {
       $ver = file_get_contents('img/verification/'.$filename.'.txt');
        echo '<div class="verified">'.$ver.'</div>';
    }
    if(file_exists('img/ssn/'.$filename.'.txt')) {
       $ver = file_get_contents('img/ssn/'.$filename.'.txt');
        echo '<div class="ssn">'.$ver.'</div>';
    }
    if(file_exists('img/rip/'.$filename.'.txt')) {
       $ver = file_get_contents('img/rip/'.$filename.'.txt');
        echo '<div class="rip">'.$ver.'</div>';
    }

    if(file_exists('img/mail/'.$filename.'.txt')) {
       $ver = file_get_contents('img/mail/'.$filename.'.txt');
        echo '<div class="mail">'.$ver.'</div>';
    }

    if(file_exists('img/isp/'.$filename.'.txt')) {
       $ver = file_get_contents('img/isp/'.$filename.'.txt');
        echo '<div class="isp">'.$ver.'</div>';
    }

    if(file_exists('img/db/'.$filename.'.txt')) {
       $ver = file_get_contents('img/db/'.$filename.'.txt');
        echo '<div class="db">'.$ver.'</div>';
    }

    if(file_exists('img/pr/'.$filename.'.txt')) {
       $ver = file_get_contents('img/pr/'.$filename.'.txt');
        echo '<div class="pr">'.$ver.'</div>';
    }

    if(file_exists('img/cabincr3w/'.$filename.'.txt')) {
       $ver = file_get_contents('img/cabincr3w/'.$filename.'.txt');
        echo '<div class="cabincrew">'.$ver.'</div>';
    }

    if(file_exists('img/doxbin/'.$filename.'.txt')) {
       $ver = file_get_contents('img/doxbin/'.$filename.'.txt');
        echo '<div class="doxbin">'.$ver.'</div>';
    }

    if(file_exists('img/doxcake/'.$filename.'.txt')) {
       $ver = file_get_contents('img/doxcake/'.$filename.'.txt');
        echo '<div class="doxcake">'.$ver.'</div>';
    }

    if(file_exists('img/ncf/'.$filename.'.txt')) {
       $ver = file_get_contents('img/ncf/'.$filename.'.txt');
        echo '<div class="ncf">'.$ver.'</div>';
    }

    if(file_exists('img/pinkmeth/'.$filename.'.txt')) {
       $ver = file_get_contents('img/pinkmeth/'.$filename.'.txt');
        echo '<div class="pinkmeth">'.$ver.'</div>';
    }

    if(file_exists('img/r4pe/'.$filename.'.txt')) {
       $ver = file_get_contents('img/r4pe/'.$filename.'.txt');
        echo '<div class="rape">'.$ver.'</div>';
    }

    if(file_exists('img/ugnazi/'.$filename.'.txt')) {
       $ver = file_get_contents('img/ugnazi/'.$filename.'.txt');
        echo '<div class="ugnazi">'.$ver.'</div>';
    }

/* The reason the textarea has rows and cols set is because it helps work
around a corner case in which the rest of the page loads before the style
sheet. If rows and cols were left undeclared, the dox would be temporarily 
unreadable, and that just won't do. */

    echo '</div><p><textarea name="doxviewer" readonly="readonly" rows="25" cols="80">';
    $dox = file_get_contents('dox/'.$filename.'.txt');
    echo $dox;
    echo '</textarea></p></body></html>';
}
else {
include('archive.php'); // Just breaking the spaghetti into easier to manage chunks.
}
?>

