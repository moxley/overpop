<?php
$pagename = "index";

$mactestfile = "macserver.txt";
if (file_exists($mactestfile)) {
  $servername = "overpop";
}
else {
  $servername = "www.overpopulation.org";
}

$sourcepage = "http://www.overpopulation.org/prepage/$pagename.php";

$home = "/www/overpopulation.org/subdomains/www";

$targetfilename = "$home/$pagename.html";

$webpage = file_get_contents($sourcepage);

if ($webpage === false)
{
echo "<b>WOA!! error - Unable to load $sourcepage - to static page! Update Failed! Error: $webpage</b>";
exit();
}

$fp = fopen($targetfilename, 'w');
if($fp) {
  fwrite($fp, $webpage);
  fclose($fp);
}
else {
	echo "<b>WOA Could not open $targetfilename</b>";
	exit();
}

echo $webpage;

echo "<b>WOA!! - $targetfilename generated - END</b>";

?>