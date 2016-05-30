<html>
<head>
<title>DOX-BIN</title>
<style>
body {
    color: #fff;
    background: #000020;
    background: -webkit-gradient(linear, left top, left bottom, from(#000020), to(#000060));
    background: -moz-linear-gradient(99% 1% -90deg,#000020,#000060);
    font-family: "Tahoma", sans-serif;
    font-size: 10pt;
   
}
a:link {
    color: #00afcf;
    -webkit-animation: 1s;
    -moz-transition-duration: 1s;
    font-size: 12pt;
    font-family: "Helvetica", sans-serif;
}
a:visited {
    color: #fff;
    position: relative;
    top: 1px;
    text-shadow: 0px 0px 3px #fff;
    -webkit-animation: 1s;
    -moz-transition-duration: 1s;
    font-size: 12pt;
    font-family: "Helvetica", sans-serif;
}

a:hover {
    color: #00afaf;
    text-shadow: 0px 0px 10px #0033cc;
    -webkit-animation: .1s;
    -moz-transition-duration: .1s;
    font-size: 14pt;
    padding: 4px;
}

a:active {
    color: #fff;
    position: relative;
    top: 1px;
    text-shadow: 0px 0px 3px #fff;
    -webkit-animation: .2s;
    -moz-transition-duration: .2s;
}
</style>
</head>
<body>
<a href="javascript:history.go(-1)">Back...</a><br>
THE OWNER OF THIS SITE IS NOT RESPONSIBLE FOR USER SUBMITTED CONTENT!!<br>
HOWEVER, CONTENT WILL NOT BE REMOVED UNLESS IT VIOLATES IRANIAN LAW<br>
OR IS SPAM. IN THE CASE THAT YOU ARE BUTTHURT ABOUT YOUR INFO BEING HERE,<br>
THEN FUCK OFF AND DIE IN A FIRE, KTHX. ----- DOXBIN ADMINISTRATORS<br>
Donate (bitcoin): 1BnyLax6U3gLDCxeu45JWdjb2DrWjFGGPG<br>
<img src=/faqdragonmarkr.png align=right>
<?php
if ($handle = opendir('dox')) {
    while (false !== ($file = readdir($handle))) {
        $xfile = str_replace(".txt", "", $file);
        if($file != "." && $file != ".." && $file != ".htaccess" && $file != ".txt" && $file != "*.txt") {
            if(stristr($file,'.txt'))
               echo "<a href=\"doxviewer.php?dox=".$xfile."\">".$file."</a>";
            else
               echo '<a href="dox/'.$file.'">'.$file.'</a>';
            if(file_exists('verification/'.$file)) {
                $datestamp = file_get_contents('verification/'.$file);
                echo ' <img src="/green-checkbox.gif" alt="'.$datestamp.'" title="'.$datestamp.'">';
           }
           echo '<br>'; }
    }
    closedir($handle);
}
?>
<a href="#">Back to top...</a>
</body>
</html>
