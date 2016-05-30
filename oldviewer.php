<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">-->
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>DOXBIN - ONIONLAND'S CALIPHATE SINCE 2011</title>
<link href="/style/blue.css" rel="stylesheet" type="text/css" />
</head>
<body>
<a href="/fail/intachash.txt">People keep asking us this same question, and we felt that a picture's worth a thousand words.</a> <br />
<a href="http://databinhwin4xuxx.onion/">DATABIN: Because you guys forgot to bookmark it.</a><br />
<a href="index.php">Post Dox</a> <a href="oldviewer.php">Back to the archive</a> <a href="/faq.php">FAQ</a> <a href="proscription.php"> Proscription List</a> <a href="https://twitter.com/onetruedoxbin">Twitter</a><br />
<?php

/* This page does a lot of the heavy lifting. It displays the dox and calls archive.php
when a variable isn't given for "dox." It's mostly boring stuff, so the comments will 
be minimal. */

header('Content-Disposition: inline; filename="oldviewer.php"');

if (!isset($_GET['old'])) {
    $_GET['old'] = "undefine";
}

/* Some built-in defense against skids attempting directory traversal. 
Feel free to replace the ED link with goatse, The Last Measure, or even
your own drive-by download page. No legitimate user is going to trigger 
these ifs, so feel comfortable in being as evil as you want. */

$filename = $_GET['old'];
if($filename == "") { include("oldarchive.php"); die(); }
//if(stripos($filename, '.') !== false) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }
//if(stripos($filename, '/') !== false ) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }
//if(stripos($filename, '%2f') !== false) { die('<script>document.location="http://edramalpl7oq5npk.onion/Offended"</script><meta http-equiv="refresh" content="2;url=http://edramalpl7oq5npk.onion/Offended">'); }

// Just some HTML rendering and adding the dox icon text.

if(file_exists('old/'.$filename.'.txt')) {
    echo '<div class="doxheader">';

/* The reason the textarea has rows and cols set is because it helps work
around a corner case in which the rest of the page loads before the style
sheet. If rows and cols were left undeclared, the dox would be temporarily 
unreadable, and that just won't do. */

    echo '</div><p><textarea name="oldviewer" readonly="readonly" rows="25" cols="80">';
    $old = file_get_contents('old/'.$filename.'.txt');
    echo $old;
    echo '</textarea></p></body></html>';
}
else {
include('oldarchive.php'); // Just breaking the spaghetti into easier to manage chunks.
}
?>

