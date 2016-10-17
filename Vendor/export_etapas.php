<?php

require_once(__DIR__."/config_edugroup.php");

class SimpleXMLExtended extends SimpleXMLElement {
  public function addCData($cdata_text) {
    $node = dom_import_simplexml($this); 
    $no   = $node->ownerDocument; 
    $node->appendChild($no->createCDATASection($cdata_text)); 
  } 
}

$xml = new SimpleXMLExtended('<xml/>');
$examples = $xml->addChild('examples');

$sql = "SELECT * FROM elc_etapas WHERE deleted=0 AND hidden=0";
$res = query($sql);
while ($row = mysql_fetch_array($res)) {
    $example = $examples->addChild('example');
    $example->addAttribute('id', $row['uid']);
    //$example->addChild('title', $row['kurzbezeichnung']);
    $example->title = NULL;
    $example->title->addCData($row['kurzbezeichnung']);
    $example->titleshort = NULL;
    $example->titleshort->addCData($row['kurzbezeichnung']);
    $example->description = NULL;
    $example->task = NULL;
    $example->solution = NULL;
    $example->attachement = NULL;
    $example->completefile = NULL;
    $example->tips = NULL;
    $example->externalurl = NULL;
    $example->externalsolution = NULL;
    $example->externaltask = NULL;
    $example->sorting = 0;
    $example->lang = 0;
    $example->iseditable = 0;
    $example->parentid = 0;
    
    $example->descrid = NULL;
    $descr_arr = explode(';', $row['relevantedeskriptoren_link']);
    $descr_str = '';
    foreach($descr_arr as $key => $value) {
        $parts = parse_url($value);
        parse_str($parts['query'], $query);
        $descr_id = $query['descrid'];
        $descr_str .= ','.$descr_id;
    };
    $descr_str = substr($descr_str, 1);
    $example->descrid->addCData($descr_str);
    $file_value = trim($row['file']);
    if ($file_value != '') {
        $files = $example->addChild('files');
        $files_arr = explode(',', $row['file']);
        foreach($files_arr as $key => $value) {
			$standart_path = 0;
			// if file was inserted from BE - he has relative path 
			if (strpos($value, 'fileadmin/etapas_upload/') !== FALSE) {
				$value = str_replace('fileadmin/etapas_upload/', '', $value);
				$standart_path = 1;
			};
            $file = $files->addChild('file');
            $file->name = NULL;
            $file->name->addCData($value);
            $file->link = NULL;
			if ($standart_path == 1)
				$file->link->addCData('http://www.elc20.com/fileadmin/etapas_upload/'.$value);
			else 
				$file->link->addCData('http://www.elc20.com/'.$value);
        };
    };
    $weblink = trim($row['weblink']);
    if ($weblink != '') {
        if (!isset($files))
            $files = $example->addChild('files');
        $file = $files->addChild('file');
        $file->name = NULL;
        $file->name->addCData('weblink');
        $file->link = NULL;
        $file->link->addCData($weblink);
    };
/*		<title><![CDATA[Hardware Anschaffungen]]></title>
		<titleshort><![CDATA[Hardware Anschaffungen]]></titleshort>
		<description><![CDATA[Zeitbedarf in Minuten:	30
Hilfsmittel:	PC mit aktuellem Betriebssystem und MS Windows MovieMaker, Internet; Aufgabenstellung
Didaktische Hinweise:	Teamarbeit mit 2-3 SchülerInnen. Teilen Sie jedem Team ein Thema zu.]]></description>
		<task><![CDATA[http://bist.edugroup.at/uploads/tx_exabiscompetences/Aufgabenstellung.pdf]]></task>
		<solution/>
		<attachement><![CDATA[http://bist.edugroup.at/uploads/tx_exabiscompetences/netbook_email.WMV]]></attachement>
		<completefile><![CDATA[http://bist.edugroup.at/uploads/tx_exabiscompetences/Gesamtbeispiel.zip]]></completefile>
		<tips/>
		<externalurl/>
		<externalsolution/>
		<externaltask/>
		<sorting>7936</sorting>
		<lang>0</lang>
		<iseditable>0</iseditable>
		<parentid>0</parentid>
/**/    
    //$example->addChild('title', '111');
    if (isset($files))
        unset($files);
}

Header('Content-type: text/xml');
print($xml->asXML());
?>