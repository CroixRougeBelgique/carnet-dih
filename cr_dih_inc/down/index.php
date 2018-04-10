<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

/**
 * Present a size (in bytes) as a human-readable value
 *
 * @param int    $size        size (in bytes)
 * @param int    $precision    number of digits after the decimal point
 * @return string
 */
function bytestostring($size, $precision = 0) {
    $sizes = array(' YB', ' ZB', ' EB', ' PB', ' TB', ' GB', ' MB', ' kB', ' B');
    $total = count($sizes);

    while($total-- && $size > 1024) $size /= 1024;
    return round($size, $precision).$sizes[$total];
}

/*
function that reads directory content and
returns the result as links to every file in the directory
also it disply type wheather its a file or directory
pas ceci mais la taille filetype($file)
*/
function DirDisply() {

$TrackDir=opendir(".");

	while ($file = readdir($TrackDir)) {

		if ($file == "." || $file == ".." || $file == ".htaccess" || $file == ".DS_Store" || $file == "index.php") { }
		else {
			$gindispfiles[] = "<tr><td><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=$file target=_blank>$file</a></font> </td><td align=\"right\">&nbsp;&nbsp;&nbsp;".bytestostring(filesize($file))."</td></tr>";
		}
	}
	closedir($TrackDir);

	sort($gindispfiles);
	$gincount = count ($gindispfiles); 

	for ($i=0; $i<$gincount; $i++) { 
      print $gindispfiles[$i];
    }
    
	return;
}

?> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Overnet download center</title>
</head>
<body marginwidth="40" marginheight="40">

<b><font face="Verdana, Arial, Helvetica, sans-serif">Current Directory contains
following files and sub Directories...</font></b><br />
<p>
<table>
<?php
@ DirDisply();
?>
</table>

</body>
</html>
