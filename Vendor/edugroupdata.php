<?php
/* ini_set("display_errors", 1);
ini_set("track_errors", 1);
ini_set("html_errors", 1);
error_reporting(E_ALL); /**/

require_once(__DIR__."/config_edugroup.php");

/* set out document type to text/javascript instead of text/html */
//header("Content-type: text/javascript");
header("Content-type: text/javascript; charset: utf-8");
/* our multidimentional php array to pass back to javascript via ajax */


global $params_for_description_to_bist_edugroup_au;
$params_for_description_to_bist_edugroup_au = '';

if (!empty($_GET['select_number']) && ($_GET['select_number']>0)) {
    $arr_res['select_number'] = $_GET['select_number'];
} else {
    $arr_res['select_number'] = 1;
}

if (!empty($_GET['to']) && ($_GET['to']>0)) {
    $arr_res['bread'] = getBreadCrubm(3, $_GET['to']);
    $arr_data = getDescriptors($_GET['to']);
    $header_title = 'Deskriptoren';
    $select_title = 'Deskriptoren wählen';
    $arr_res['multi'] = 'multi';
} else if (!empty($_GET['su']) && ($_GET['su']>0)) {
    $arr_data = getTopics($_GET['su']);
    $header_title = 'Themen';
    $select_title = 'Thema wählen';
    $arr_res['bread'] = getBreadCrubm(2, $_GET['su']);
} else if (!empty($_GET['st']) && ($_GET['st']>0)) {
    $arr_data = getSubjects($_GET['st']);
    $header_title = 'Gegenstände';
    $select_title = 'Gegenstände wählen';
    $arr_res['bread'] = getBreadCrubm(1, $_GET['st']);
} else {
    $arr_data = getSchooltypes();
    $header_title = 'Schultypen';
    $select_title = 'Schultyp wählen';
    $arr_res['bread'] = getBreadCrubm(0);
}

if (count($arr_data)>0) {
    $arr_res['result'] = 'success';
    $arr_res['data'] = $arr_data;
} else {
    $arr_res['result'] = 'error';
    $arr_res['data'] = null;
}

$arr_res['header_title'] = $header_title;
$arr_res['select_title'] = $select_title;

echo json_encode($arr_res);

function getBreadCrubm($level=0, $paramid=0) {
    global $params_for_description_to_bist_edugroup_au, $arr_res;
    $from = ''; $where = '';
    $arr_data = array();
    switch($level) {
        case "3": 
            $params_for_description_to_bist_edugroup_au .= '&topicid='.$paramid;
            $sql = "SELECT * FROM tx_exabiscompetences_topics top WHERE top.uid=%d ORDER BY top.sorting";
            $res = query($sql, $paramid); 
            $row = mysql_fetch_assoc($res);
            if (trim($row['title'])!='')
                $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        //"link" => ' / <span onclick="SendGet({\'to\':\''.$row['uid'].'\'});">'.$row['title'].'</span>'
                        "link" => ' <span onclick="SendGet(\'to='.$row['uid'].'\', this);">'.$row['title'].'</span>'
                );
            $paramid = $row['subjid'];
        case "2": 
            $params_for_description_to_bist_edugroup_au .= '&f='.$paramid;
            $sql = "SELECT * FROM tx_exabiscompetences_subjects su WHERE su.uid=%d ORDER BY su.sorting";
            $res = query($sql, $paramid); 
            $row = mysql_fetch_assoc($res);
            if (trim($row['title'])!='')
                $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        //"link" => ' / <span onclick="SendGet({\'su\':\''.$row['uid'].'\'});">'.$row['title'].'</span>'
                        "link" => ' <span onclick="SendGet(\'su='.$row['uid'].'\', this);">'.$row['title'].'</span>'
                );
            $paramid = $row['stid'];
        case "1": 
            $params_for_description_to_bist_edugroup_au .= '&f4='.$paramid;
            $sql = "SELECT * FROM tx_exabiscompetences_schooltypes st WHERE st.uid=%d ORDER BY st.sorting";
            $res = query($sql, $paramid); 
            $row = mysql_fetch_assoc($res);
            if (trim($row['title'])!='')
                $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        "link" => ' <span onclick="SendGet(\'st='.$row['uid'].'\', this);">'.$row['title'].'</span>'
                );
        default :
            //$params_for_description_to_bist_edugroup_au .= '&f4='.$paramid;
            $arr_data[] = array(
                        "title" => 'Schultypen',
                        "link" => '<span onclick="SendGet(\'tt=tt\', this);">Schultypen</span>'
            );
            break;
    };

    $arr_data = array_reverse($arr_data);
    return $arr_data;
}

function getDescriptors($toid) {
global $params_for_description_to_bist_edugroup_au;
    $sql = "SELECT * FROM tx_exabiscompetences_descriptors de WHERE uid IN (SELECT mm.uid_local FROM tx_exabiscompetences_descriptors_topicid_mm mm WHERE mm.uid_foreign=%d) AND TRIM(de.title)<>'' ORDER BY de.sorting";
    $res = query($sql, $toid);
    $arr_data = array();

    while ($row = mysql_fetch_array($res)) {
        if (trim($row['title'])!='') {
            $externallink = 'http://bist.edugroup.at/index.php?id=6&no_cache=1&b=examp'.$params_for_description_to_bist_edugroup_au.'&descrid='.$row['uid'];
            $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        //"link" => '<span onclick="SendGet({\'de\':\''.$row['uid'].'\'});">'.$row['title'].'</span>'
                        "link" => '<option value="desc_'.$row['uid'].'" externallink="'.$externallink.'" title="'.$row['title'].'">'.$row['title'].'</option>',
                        "externallink" => $externallink
                        //f=151&f2=&f3=&f4=72&descrid=1788
            );
        };
    };
    return $arr_data;
}

function getTopics($suid) {
    $sql = "SELECT * FROM tx_exabiscompetences_topics WHERE subjid=%d AND TRIM(title)<>'' ORDER BY sorting";
    $res = query($sql, $suid);
    $arr_data = array();

    while ($row = mysql_fetch_array($res)) {
        if (trim($row['title'])!='')
            $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        //"link" => '<span onclick="SendGet({\'to\':\''.$row['uid'].'\'});">'.$row['title'].'</span>'
                        "link" => '<option value="to='.$row['uid'].'" title="'.$row['title'].'">'.$row['title'].'</option>'
            );
    };
    return $arr_data;
}

function getSubjects($stid) {
    $sql = "SELECT * FROM tx_exabiscompetences_subjects WHERE stid=%d AND TRIM(title)<>'' ORDER BY sorting";
    $res = query($sql, $stid);
    $arr_data = array();

    while ($row = mysql_fetch_array($res)) {
        if (trim($row['title'])!='')
            $arr_data[] = array(
                        "uid" => $row['uid'],
                        "title" => $row['title'],
                        //"link" => '<span onclick="SendGet({\'su\':\''.$row['uid'].'\'});">'.$row['title'].'</span>'
                        "link" => '<option value="su='.$row['uid'].'" title="'.$row['title'].'">'.$row['title'].'</option>'
            );
    };
    return $arr_data;
}


function getSchooltypes() {
    $sql_schooltypes = "SELECT * FROM tx_exabiscompetences_schooltypes WHERE TRIM(title)<>'' ORDER BY sorting";
    $res_st = query($sql_schooltypes);
    $arr_data = array();

    while ($row_st = mysql_fetch_array($res_st)) {
        if (trim($row_st['title'])!='')
            $arr_data[] = array(
                        "uid" => $row_st['uid'],
                        "title" => $row_st['title'],
                        //"link" => '<span onclick="SendGet({\'st\':\''.$row_st['uid'].'\'});">'.$row_st['title'].'</span>'
                        "link" => '<option value="st='.$row_st['uid'].'" title="'.$row_st['title'].'">'.$row_st['title'].'</option>'
            );
    };
    return $arr_data;
}


?>