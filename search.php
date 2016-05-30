<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>DOXBIN - Search</title>
    <link href="/style/blue.css" rel="stylesheet" type="text/css" />
</head>

<body>
<a href="index.php">Post dox</a> <a href="doxviewer.php">Back to the archive</a><br />

<table>
<thead>
    <tr>
        <th class="doxcols">Name</th>
	<th class="doxcols">Hits</th>
        <th class="doxcols">Date</th>
        <th class="doxcols">Time</th>
        <th class="doxcols">Filesize</th>
    </tr>
</thead>

<?php
    date_default_timezone_set("UTC");

    // recursively get a list of directories
    function rdirs($dir, $dirs = Array()) {
        $dirs[] = $dir;

        foreach (glob("$dir/*", GLOB_ONLYDIR) as $dirname) {
            if (!in_array($dirname, $dirs)) {
                $dirs = rdirs($dirname, $dirs);
            }
        }

        return $dirs;
    }

    // glob through a bunch of directories
    function rglob($dirs, $search) {
        if(!is_array($dirs)) {
            $dirs = Array($dirs);
        }

        $glob_results = Array();

        foreach($dirs as $dir) {
            foreach(rdirs($dir) as $dirname) {
                foreach(glob("$dirname/$search") as $filename) {
                    $glob_results[] = $filename;
                }
            }
        }

        return $glob_results;
    }

    // check if a string is in a file
    function in_file($filename, $search) {
        return stristr(file_get_contents($filename), $search) !== FALSE;
    }

    // get the sexy doxbin stats
    function file_html_stats($filename) {
        $output     = "";
        $path_name  = pathinfo($filename)['dirname'];
        $link_title = pathinfo($filename)['filename'];
        $file       = pathinfo($filename)['basename'];

        $url = ($path_name == "dox") ? "doxviewer.php?dox=$link_title" : $filename;

        $output .= "<a href=\"$url\" target=\"_blank\" alt=\"$link_title\">$link_title</a>";
    
        if ($path_name == "dox" && file_exists("img/verification/$file")) {
            $datestamp = file_get_contents("img/verification/$file");
            $output   .= " <img src=\"img/green-checkbox.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }
        if ($path_name == "dox" && file_exists("img/ssn/$file")) {
            $datestamp = file_get_contents("img/ssn/$file");
            $output   .= " <img src=\"img/ssn.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }
        if ($path_name == "dox" && file_exists("img/rip/$file")) {
            $datestamp = file_get_contents("img/rip/$file");
            $output   .= " <img src=\"img/rip.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }
        if ($path_name == "dox" && file_exists("img/mail/$file")) {
            $datestamp = file_get_contents("img/mail/$file");
            $output   .= " <img src=\"img/mail.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }
        if ($path_name == "dox" && file_exists("img/isp/$file")) {
            $datestamp = file_get_contents("img/isp/$file");
            $output   .= " <img src=\"img/isp.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }
        if ($path_name == "dox" && file_exists("img/db/$file")) {
            $datestamp = file_get_contents("img/db/$file");
            $output   .= " <img src=\"img/db.png\" alt=\"$datestamp\" title=\"$datestamp\"/>";
        }
        if ($path_name == "dox" && file_exists("img/pr/$file")) {
            $datestamp = file_get_contents("img/pr/$file");
            $output   .= " <img src=\"img/pr.png\" alt=\"$datestamp\" title=\"$datestamp\" />";
        }

        $output .= "</td><td>";

        //the rest of the listing
        //the number of hits of the file
        $output .= file_get_contents("hits/$file");
        $output .= "</td><td>";

        //the date of the file
        $output .= date("m/d/Y", filemtime($filename));
        $output .= "</td><td>";

        //the time of the file
        $output .= date("H:i:s", filemtime($filename));
        $output .= "</td><td>";

        //the filesize in KB of the file
        $filesize = filesize($filename);
        $file_kb  = round(($filesize / 1024), 2);
        $output  .= "$file_kb KB</td></tr>\n";

        return $output;
    }

    // search a directory
    function search_directory($dir, $keyword, $extension) {
        $results = Array();
        $keyword_underscores = preg_replace("/ /", "_", $keyword);

        $highest_match_percent = -1;
        $closest_match  = "";

        foreach(rglob($dir, "*.$extension") as $filename) {
            $file = pathinfo($filename)['filename'];
            $url = (pathinfo($filename)['dirname'] == "dox") ? "doxviewer.php?dox=$file" : $filename;

            similar_text(strtolower($file), strtolower($keyword_underscores), $match_percent);

        //    if($match_percent == 100) {
        //        header("Location: $url");
        //    }
 
            if(in_file($filename, $keyword) || stristr($filename, $keyword_underscores)) {
                $results[] = $filename;
            }

            if($match_percent >= $highest_match_percent && $match_percent > 70) {
                 $closest_match = $url;
                 $highest_match_percent = $match_percent;
            }
        }

        return Array($closest_match, $results);
    }

    function do_search($dir, $keyword, $page) {
        $message = "Search results for <i>$keyword</i>. ";
        $output  = "";

        // paginate search results
        $pageindex = 0;
        $results   = search_directory($dir, $keyword, "txt");
        $closest_match = $results[0];
        $results = $results[1];

        if(count($results) == 0) {
            $message = "No results for <i>$keyword</i>. ";
        } else if(count($results) == 1) {
            $url = (pathinfo($results[0])['dirname'] == "dox") ? "doxviewer.php?dox=" . pathinfo($results[0])['filename'] : $results[0];
            header("Location: $url");
        }

        if($closest_match != "") {
            if(strstr($closest_match, "doxviewer.php?dox=")) {
                $display = str_replace("doxviewer.php?dox=", "", $closest_match);
            } else {
                $display = pathinfo($closest_match)['filename'];
            }

            $message .= "Did you mean <i><a href=\"$closest_match\" target=\"_blank\" alt=\"$display\">$display</a></i>?";
        }

        foreach($results as $index=>$result) {
            if($pageindex == $page) {
                $output .= sprintf("<tr><td>%02d. ", ($index));
                $output .= file_html_stats($result);
            }

            if(($index+1) % 100 == 0) {
                $pageindex++;
            }
        }

        if($page > $pageindex) {
            $message = "Page number too high";
        }

        $output .= "<tr><td align=\"center\"><br><br>";

        if($page > 0) {
            $output .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?keyword=$keyword&page=" . ($page - 1) . "\">previous</a>";
        }

        if($page > 0 && $page + 1 < $pageindex) {
            $output .= " -- ";
        }

        if($page + 1 < $pageindex) {
            $output .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?keyword=$keyword&page=" . ($page + 1) . "\">next</a>";
        }

        $output .= "</td></tr>";

        return Array($message, $output);
    }

    $allowed_dirs = [ "dox", "old", "fail" ];
    if(!isset($_GET['dirs'])) {
        $dirs = Array("dox");
    } else {
        $dirs = Array();

        if(!is_array($_GET['dirs'])) {
            $_GET['dirs'] = Array($_GET['dirs']);
        }

        foreach($_GET['dirs'] as $dir) {
            $dir = intval($dir);
            if($dir < count($allowed_dirs) && $dir >= 0) {
                $dirs[] = $allowed_dirs[$dir];
            }
        }
    }

    if(!isset($_GET['keyword'])) {
        $message = "Search query required";
    }

    if(!isset($_GET['page'])) {
        $page = 0;
    } else {
        $page = intval($_GET['page']);
    }

    $keyword = htmlentities(preg_replace("/[\\.\\/\\\\]/", "", $_GET['keyword']));

    if($keyword === "") {
        $message = "Search query required";
    }

    if(!isset($message)) {
        $output = do_search($dirs, $keyword, $page);
        $message = $output[0];
        $output  = $output[1];
    }
?>

    <tbody>
         <br><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" target="_self">
         <input type="text" name="keyword" class="text" size="12"  maxlength="30" value="<?php echo $keyword; ?>">
         <input type="checkbox" name="dirs[]" value="0" /> Dox 
         <input type="checkbox" name="dirs[]" value="1" /> Old
         <input type="checkbox" name="dirs[]" value="2" /> Fail
         &nbsp;<input type="submit" value="Search" class="button">
         </form>
    <br><br>

    <p class="header"><?php echo $message; ?></p>

<?php 
    if(isset($output)) {
        echo $output; 
    }
?>

</tbody>
</table>
<div class="doxheader"><a href="doxviewer.php">Back to archive</a><br />This search is powered by ColdFusion!</div>
</body>
</html>

