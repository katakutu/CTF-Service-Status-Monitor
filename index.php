<h1 style="text-align: center;">SHODAN Service Monitor</h1>
<a href='http://www.github.com/logepoge1' style="text-align: right; position:absolute;top:5px;right:5px;"><img src="GitHub-Mark-32px.png"/></a>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel=stylesheet>
<?php

date_default_timezone_set('America/Chicago');
echo '<p style="text-align:center;">' . date("M-d-y h:i:s A e") . '</p>';

header("Refresh: 45; URL=index.php");

error_reporting(1);
$ini = parse_ini_file('config.ini');

$status = "DOWN";
$ftp = 21;
$ssh = 22;
$mysql = 3306;
$apache = 80;

//Pulls the variables from the config.ini file. This is where you set teams
$shodan = $ini['shodan'];
$bowser = $ini['bowser'];
$funky = $ini['funky'];
$shadow = $ini['shadow'];
$glados = $ini['glados'];
$kirby = $ini['kirby'];
$rob = $ini['rob'];
$conker = $ini['conker'];

//The initialization of this multidimensional array is crucial
//for the inner array, use the following template:
//array("Header Team Name", "Matches variables above", "$ActualVariable", "Image location")
$teamArray = array(
	array("Shodan", "$shodan", $shodan, "shodan.png"),
	array("Bowser", "$bowser", $bowser, "bowser.png"),
	array("Funky Kong", "$funky", $funky, "funky.png"),
	array("Shadow", "$shadow", $shadow, "shadow.png"),
	array("GLaDOS", "$glados", $glados, "glados.png"),
	array("Kirby", "$kirby", $kirby, "kirby.png"),
	array("R.O.B.", "$rob", $rob, "rob.png"),
	array("Conker", "$conker", $conker, "conker.png")
);

function getProperColor($value)
{
    if ($value == 'UP')
        return 'lightgreen';
    else if ($value == 'DOWN')
        return 'red';
}

function pingServer($ip, $port){
	global $status;
    try {
    	$file      = fsockopen ($ip, $port, $errno, $errstr, 1);
} catch(Exception $e){
  return "DOWN";
}
    if (!$file) $status = "DOWN";  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
	$status = "UP";
    }
    return $status;
}

?>
<style>
.col-sm-3 {
 border: 2px solid black;
}

.thumbnail-icon{
width:80px;
height:80px;
position:absolute;
top:15px;
right:15px;
}
</style>

<?php

echo '<div class="row">';
for($j=0; $j<count($teamArray); $j++){
  echo '<div class="col-sm-3">';
        echo '<h1>' . $teamArray[$j][0] . '</h1>';
		echo '<h4>' . $teamArray[$j][2] . '</h4>';
		echo '<img src="images/' . $teamArray[$j][3] . '" class="thumbnail-icon"/>';
        echo '<b>FTP</b>';
        echo '<p style="background-color: ' . getProperColor(pingServer($teamArray[$j][1], $ftp)) . '">&nbsp;</p>';
        echo '<b>SSH</b>';
        echo '<p style="background-color: ' . getProperColor(pingServer($teamArray[$j][1], $ssh)) . '">&nbsp;</p>';
        echo '<b>Apache</b>';
        echo '<p style="background-color: ' . getProperColor(pingServer($teamArray[$j][1], $apache)) . '">&nbsp;</p>';
        echo '<b>MySQL</b>';
        echo '<p style="background-color: ' . getProperColor(pingServer($teamArray[$j][1], $mysql)) . '">&nbsp;</p>';
  echo '</div>'; 
  }
echo '</div>';
?>

<div class="footer" style="bottom:0px;text-align:center;"><b>Created By <a href="http://www.logansimpson.xyz">Logan Simpson</a></b></div>
