<?php
/*ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL); /**/

$servername = "localhost";
$username = "dbu_eeducation-g";
$password = "D)aW6nos&UU*3AP3";
$dbname = "db_eeducation-gtn-solutions";
        
// Create connection
$dblink = mysql_connect($servername, $username, $password)
        or die("Could not connect: " . mysql_error());
mysql_select_db($dbname) 
    or die ('Can\'t use DB : ' . mysql_error());   
mysql_set_charset('utf8');


function query(){
  $args = func_get_args();
  $query = array_shift($args);
  $query = str_replace("%s","'%s'",$query);
  foreach ($args as $key => $val) {
    $args[$key] = mysql_real_escape_string($val);
  }
  $query = vsprintf($query, $args);
  if (!$query) return FALSE;

  $res = mysql_query($query) 
    or trigger_error("db: ".mysql_error()." in ".$query);
  return $res;
}


?>