<html>
<head>
<title>DOX-BIN</title>
<style>
body {
    color: #fff;
    background: #000;
    background: -webkit-gradient(linear, left top, left bottom, from(#000020), to(#000060));
    background: -moz-linear-gradient(99% 1% -90deg,#000020,#000060);
}

textarea {
    font-family: "Droid Sans Mono", "Consolas", monospace;
    background: #000;
    background: -webkit-gradient(linear, left top, left bottom, from(#000020), to(#000060));
    background: -moz-linear-gradient(99% 1% -90deg,#000020,#000060);
    color: #00afcf;
    width: 99%;
    height: 94%;
    border: none;
}
</style>
</head>
<?php
$filename = $_GET["dox"];
if($filename == "") { include("archive.php"); die(); }
if(stristr($filename, ".")) { die('<script>document.location="http://www.youtube.com/watch?v=1pS9qGiINGI"</script><meta http-equiv="refresh" content="2;url=http://http://www.youtube.com/watch?v=1pS9qGiINGI">'); }
if(stristr($filename, "/")) { die('<script>document.location="http://www.youtube.com/watch?v=1pS9qGiINGI"</script><meta http-equiv="refresh" content="2;url=http://http://www.youtube.com/watch?v=1pS9qGiINGI">'); }
if(stristr($filename, "%2f")) { die('<script>document.location="http://www.youtube.com/watch?v=1pS9qGiINGI"</script><meta http-equiv="refresh" content="2;url=http://http://www.youtube.com/watch?v=1pS9qGiINGI">'); }

if(file_exists('dox/'.$filename.'.txt')) {
    echo '<body><font size=1><a href=doxviewer.php>Back to archive</a>';
    if(file_exists('verification/'.$filename.'.txt')) {
        $ver = file_get_contents('verification/'.$filename.'.txt'); 
        echo '<br><font color="#00FF00">'.$ver.'</font>';
    }
    echo "</small><textarea>";
    $dox = file_get_contents('dox/'.$filename.'.txt');
    echo $dox; 
    echo '</textarea></body></html>';
}
else { include('archive.php'); }
?>

