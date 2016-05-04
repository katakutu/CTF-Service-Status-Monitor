<style>

h1{

text-align: left;

}

h4{

text-align: left;

}
</style>
<h1 style="text-align: center;">SHODAN Service Monitor</h1>
<h2 style="text-align: right; position:absolute;top:0px;right:5px;">Created By Logan Simpson</h2>
<link href="css/bootstrap.min.css" rel="stylesheet">
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

$shodan = $ini['shodan'];
$bowser = $ini['bowser'];
$funky = $ini['funky'];
$shadow = $ini['shadow'];
$glados = $ini['glados'];
$kirby = $ini['kirby'];
$rob = $ini['rob'];
$conker = $ini['conker'];

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

<div class="row">
  <div class="col-sm-3">
        <h1>SHODAN</h1>
	<h4><?php echo $shodan; ?></h4>
	<img src="images/shodan.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shodan, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shodan, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shodan, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shodan, $mysql)); ?>;">&nbsp;</p>
  </div>  
  <div class="col-sm-3">
        <h1>GLaDOS</h1>
        <h4><?php echo $glados; ?></h4>
        <img src="images/glados.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($glados, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($glados, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($glados, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($glados, $mysql)); ?>;">&nbsp;</p>
  </div>  
  <div class="col-sm-3">
        <h1>Bowser</h1>
        <h4><?php echo $bowser; ?></h4>
        <img src="images/bowser.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($bowser, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($bowser, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($bowser, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($bowser, $mysql)); ?>;">&nbsp;</p>
  </div>  
  <div class="col-sm-3">
        <h1 style="text-align:left;">Funky Kong</h1>
        <h4><?php echo $funky; ?></h4>
        <img src="images/funky.png" class='thumbnail-icon' style="height:120px;"/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($funky, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($funky, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($funky, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($funky, $mysql)); ?>;">&nbsp;</p>
  </div>
</div>

<div class="row">

  <div class="col-sm-3">
        <h1>Shadow</h1>
        <h4><?php echo $shadow; ?></h4>
        <img src="images/shadow.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shadow, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shadow, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shadow, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($shadow, $mysql)); ?>;">&nbsp;</p>
  </div>
    <div class="col-sm-3">
        <h1>Kirby</h1>
        <h4><?php echo $kirby; ?></h4>
        <img src="images/kirby.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($kirby, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($kirby, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($kirby, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($kirby, $mysql)); ?>;">&nbsp;</p>
  </div>
    <div class="col-sm-3">
        <h1>R.O.B.</h1>
        <h4><?php echo $rob; ?></h4>
        <img src="images/rob.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($rob, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($rob, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($rob, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($rob, $mysql)); ?>;">&nbsp;</p>
  </div>
    <div class="col-sm-3">
        <h1>Conker</h1>
        <h4><?php echo $conker; ?></h4>
        <img src="images/conker.png" class='thumbnail-icon'/>
        <b>FTP</b>
        <p style="background-color: <?php echo getProperColor(pingServer($conker, $ftp)); ?>;">&nbsp;</p>
        <b>SSH</b>
        <p style="background-color: <?php echo getProperColor(pingServer($conker, $ssh)); ?>;">&nbsp;</p>
        <b>Apache</b>
        <p style="background-color: <?php echo getProperColor(pingServer($conker, $apache)); ?>;">&nbsp;</p>
        <b>MySQL</b>
        <p style="background-color: <?php echo getProperColor(pingServer($conker, $mysql)); ?>;">&nbsp;</p>
  </div>

</div>

