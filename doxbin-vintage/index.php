<html>
<head>
<title>DOX-BIN</title>
<?php 
if(isset($_GET['style'])) { $style = $_GET["style"]; }
else { $style = 'blue'; }
if(file_exists('style/'.$style.'.css')) {
echo '<link href="style/'.$style.'.css" rel="stylesheet" type="text/css" />'; 
} else { 
echo '<link href="style/hacker.css" rel="stylesheet" type="text/css" />';
}
?>
</head>
<body>
<h1>DOX-BIN</h1>
<form action="post.php" method="post">
<input type="text" id="naem" name="naem" placeholder="Name" /><br />
<?php
if($style != "plain") {
echo '<img src=/faqdragonmark.png width=132 height=275 align=left><img src=/faqdragonmarkr.png width=132 height=275 align=right>'; } ?>
<textarea id="dox" name="dox">DOX go here.</textarea><br />
<input type="submit" value="Post" />
<form>
<h1><a href="doxviewer.php">DOX Archive</a></h1>
<small>style: <a href="?style=black">black</a> <a href="?style=blue">blue</a> <a href="?style=plain">plain</a> <a href="?style=h">h</a> <a href="?style=hacker">hacker</a><br>
Donate (bitcoin): 1BnyLax6U3gLDCxeu45JWdjb2DrWjFGGPG
</body>
</html>
