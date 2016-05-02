<style>

h1{

text-align: center;

}

h4{

text-align: center;

}
</style>
<h1>SHODAN Service Monitor</h1>

<link href="css/bootstrap.min.css" rel="stylesheet">
<?php

//error_reporting(1);
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
</style>

<div class="row">
  <div class="col-sm-3">
        <h1>SHODAN</h1>
	<h4><?php echo $shodan; ?></h4>
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
        <h1>Funky Kong</h1>
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

