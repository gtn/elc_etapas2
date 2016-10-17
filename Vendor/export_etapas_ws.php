<?php
$start = microtime(true); 
set_time_limit(1800);

require_once(__DIR__."/config_edugroup.php");

$token = "3fHn65Tgfr433Ew2w5eerBi8Jaq";
$link_toexport = "http://bist.edugroup.at/index.php";
$pageid_import = 133;

$sql = "SELECT * FROM elc_etapas WHERE deleted=0 AND hidden=0 AND sourcename=''";
$res = query($sql);
$i = 0;
while ($row = mysql_fetch_array($res)) {
    $data = array();
    $data['id'] = $pageid_import;
    $data['token'] = $token;
    $data['gegenst'] = 1;
    $data['data[gpid]'] = $row['uid'];
    
    $data['data[title]'] = $row['kurzbezeichnung'];
    $data['data[titleshort]'] = $row['message'];
    
    $weblink = trim($row['weblink']);
    if ($weblink != '') {
        $data['data[externalurl]'] = $row['weblink'];
    };
    
    $descr_arr = explode(';', $row['relevantedeskriptoren_link']);
    foreach($descr_arr as $key => $value) {
        if ($value != 'NEW-TOPIC') {
            $parts = parse_url($value);
            parse_str($parts['query'], $query);
            $descr_id = $query['descrid'];
            $data['comp[]'] = $descr_id;
        }
    };    
    
    $data['authors[]'] = $row['name'].($row['erstelltvonschule']!='' ? ', '.$row['erstelltvonschule'] : "");
    $data['categoriesn[]'] = $row['schulstufe'];

    $postdata = http_build_query($data);
    $options = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($link_toexport, false, $context);
    
    $i++;
   
    if (isset($files))
        unset($files);
};

echo 'Processed '.$i.' records<br>';
echo 'Time: '.(microtime(true) - $start).' s.';


?>