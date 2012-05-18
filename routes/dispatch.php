<?php


function initHeatMap($formin,$width,$themeout){ 

//need global app var to set a proper header for actual kml clients later
global $app;

//$heatmappy = "/Applications/MAMP/htdocs/heatmap/models/heatmap.py";
$heatmappy = "/var/www/html/heatmapr/models/heatmap.py";	
// first the killers
if (empty($width)){
	echo "No output specs, can't proceed.";
}                           


if (isset($_GET['surl']) && $_GET['surl']!= null) {

$surl = $_GET['surl'];
// echo $surl;

} else {
	
	echo "No input! Can't proceed.";
  
}
 
// good so far? first we need to parse the output requested (even though we're only supporting kml right now)
// this will be something like theme.ext?surl=url...
// as in
// viking.kml?surl=http://site.com/api/geojson.json

$themeoutarr = explode(".",$themeout); 
	
// 	if it was requested at all
if(isset($themeoutarr[1])){
	$theme = $themeoutarr[0];
	$formout = $themeoutarr[1];

} else //they forgot so we'll set it for them
 {  
	$theme = "viking";
	$formout = "kml";}

//  some param sets based on the chosen output
switch ($formout) {
	case 'kml':
		$app->response()->header('Content-Type', 'application/xml');
		//$outheader = "Content-Type: application/vnd.google-earth.kml+xml";
		$outimgpath = "tmp/kml/png";
		break;
	
	default:
		$outheader = "Content-type: application/xml";
		$outimgpath = "tmp/kml/png";
		break;
}

//header($outheader);
//$app->response()->header($outheader);     


                 
//      we need a uniquer
$stamp = time();         

// here's our built-up exec statement for heatmap.py
$heatmapcall = '/usr/local/bin/python2.7 '.$heatmappy.' -j "'.$surl.'" -o '.$outimgpath."/".$stamp.'.png -G /var/www/html/heatmapr/colorscales/'.$theme.'.png -P equirectangular ';
                
/*
if($height){
	$heatmapcall .= '-H '.$height;
}
*/

$heatmapcall .= ' -W '.$width;

// do it!
echo $heatmap=exec($heatmapcall);
//echo $heatmapcall;
//echo exec('whoami');

}
?>