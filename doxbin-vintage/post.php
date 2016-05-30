<?php
if(file_exists("DISABLEPOST")) { die('posting is currently disabled due to an attack, AIDS, or something else bad.'); }
if(isset($_POST["naem"])) { $tehnaem = $_POST["naem"]; } else { die("fail"); }
if(isset($_POST["dox"])) { $tehdox = $_POST["dox"]; } else { die("fail"); }
if(file_exists("dox/".$tehnaem.".txt")) { die("already exist. <a href=dox/".$tehnaem.".txt>clicky.</a>"); }
if(stristr($tehnaem, "php")) { die("HACKQUERING ATTEMPT BLOCKED"); }
if(stristr($tehnaem, ".")) { die("HACKQUERING ATTEMPT BLOCKED"); }
if(stristr($tehnaem, "/")) { die("HACKQUERING ATTEMPT BLOCKED"); }
if(stristr($tehnaem, "<")) { die("HACKQUERING ATTEMPT BLOCKED"); }
if(stristr($tehnaem, ">")) { die("HACKQUERING ATTEMPT BLOCKED"); }
    $tehfiel = fopen("dox/".$tehnaem.".txt","w");
    $tehdoxx = strip_tags($tehdox);
    fwrite($tehfiel,$tehdoxx);
    chmod("dox/".$tehnaem.".txt", 0644);
    echo 'dox is poasted. <a href="doxviewer.php?dox='.$tehnaem.'">clicky.</a>';
    echo '<br> Donate (bitcoin): 1BnyLax6U3gLDCxeu45JWdjb2DrWjFGGPG';

?>
