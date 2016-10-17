<?php
	

   class edugroup
   {
	   public $cObj;
	   
	   function selectBox($name, $fieldname, $currval) {
		   $selectbox = '<div class="selectboxContainer">';
		   $selectbox .= '<select name="'.$name.'" onchange="this.form.submit()" class="sbox_'.$fieldname.'">';
		   $selectbox .= '<option value="">- - -</option>';
		   $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('DISTINCT '.$fieldname, 'elc_etapas', 'deleted=0 AND hidden=0', '', $fieldname);
		   while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
			   $selectbox .= '<option value="'.$row[$fieldname].'" '.($currval == $row[$fieldname] ? 'selected="selected"' : '').'>'.$row[$fieldname].'</option>';
		   };
		   $selectbox .= '</select>';
		   $selectbox .= '</div>';
		   return $selectbox;
	   }
	   
      function list_records($content,$conf)
      {
        global $TSFE;
        
//        require_once("/fileadmin/elc_template/config_edugroup.php");
		$whereAdd = '';
		if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Faecher') != '')
			$whereAdd .= " AND faecher='".\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Faecher')."'";
		if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Schulstufe') != '')
			$whereAdd .= " AND schulstufe='".\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Schulstufe')."'";
	
		$sorting = 'faecher'; // old = 'position, erstelltvonschule'
		if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('sort') != '') {
			switch(\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('sort')) {
				case 'faecher' :
						$sorting = 'faecher';
						break;
				case 'faecher_desc' :
						$sorting = 'faecher desc';
						break;
				case 'kurzbezeichnung' :
						$sorting = 'kurzbezeichnung';
						break;
				case 'kurzbezeichnung_desc' :
						$sorting = 'kurzbezeichnung desc';
						break;
			};
		}
		
        $result = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'elc_etapas', 'deleted=0 AND hidden=0 '.$whereAdd, '', $sorting);
		
		$r .= 'Anzahl der etapas: '.$GLOBALS['TYPO3_DB']->sql_num_rows($result).'<br>';

        $r .= '<table class="record_list">';
        
        $r .= '<form action="" method="post"><tr>';
		$linkconf = array(
		  'parameter' => $GLOBALS['TSFE']->id,
		  'additionalParams' => '',
		  'returnLast' => 'url',
		);
		// add filters to links
		if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Faecher') != '')
			$linkconf['additionalParams'] .= '&filter_Faecher='.\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Faecher');
		if (\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Schulstufe') != '')
			$linkconf['additionalParams'] .= '&filter_Schulstufe='.\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Schulstufe');
		
		if ($sorting == 'kurzbezeichnung')
			$linkconf['additionalParams'] .= '&sort=kurzbezeichnung_desc';
		else 
			$linkconf['additionalParams'] .= '&sort=kurzbezeichnung';
		$url = $this->cObj->typoLink('', $linkconf);
        $r .= '<th><a href="'.$url.'">Kurzbezeichnung etapas</a></th>';
//        $r .= '<th>Name</th>';
//        $r .= '<th>E-Mail</th>';
        $r .= '<th>Erstellt von Schule </th>';
        $r .= '<th>Erprobt von Schule </th>';
		if ($sorting == 'faecher')
			$linkconf['additionalParams'] .= '&sort=faecher_desc';
		else 
			$linkconf['additionalParams'] .= '&sort=faecher';
		$url = $this->cObj->typoLink('', $linkconf);
        $r .= '<th><a href="'.$url.'">Fächer</a><br>'.
			$this->selectBox('filter_Faecher', 'faecher', \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Faecher')).'</th>';
        $r .= '<th>Schulstufe<br>'.$this->selectBox('filter_Schulstufe', 'schulstufe', \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('filter_Schulstufe')).'</th>';
        $r .= '<th>Vorkenntnisse u. motivationaler Einstieg </th>';
        $r .= '<th>technische Voraussetzungen </th>';
        $r .= '<th>Handlungsdimension (Bloomsche Handlungsebenen)</th>';
//        $r .= '<th>relevante Deskriptoren (Bildungsstandards - Kern- u. Erweiterungsbereich f. Zusatzaufgabe)</th>';
        $r .= '<th>relevante Deskriptoren</th>';
        $r .= '<th>Zeitbedarf </th>';
        $r .= '<th>Anmerkungen</th>';
        $r .= '<th>Lizenzierung</th>';
        $r .= '</tr></form>';
        
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)) {
            $etapas_title = "";
            $r .= '<tr>';
            // files
            // $filepath = $GLOBALS['TSFE']->tmpl->setup['plugin.']['Tx_Formhandler.']['settings.']['predef.']['formhandler-file-upload-store-uploaded-files.']['finishers.']['2.']['config.']['finishedUploadFolder'];
            if ($filepath == '')
                $filepath = 'fileadmin/etapas_upload/';            
                
            $arr_files = explode(",", $row['file']);
            if (trim($row['file']) != '') {
				$firstfilename = array_shift($arr_files);
				// if file was inserted from BE - he has relative path 
				if (strpos($firstfilename, $filepath) !== FALSE) { 
					$firstfilename = str_replace($filepath, '', $firstfilename);
				};
                $etapas_title = '<a href="'.$filepath.$firstfilename.'" target="_blank">'.$row['kurzbezeichnung'].'</a>';
                if (count($arr_files) > 0 ) {
                    $etapas_title .= '<ul>';
                    foreach ($arr_files as $key=>$value) {
						// if file was inserted from BE - he has relative path 
						if (strpos($value, $filepath) !== FALSE) {
							$value = str_replace($filepath, '', $value);
						};
                        $etapas_title .= '<li><a href="'.$filepath.$value.'" target="_blank">'.$value.'</a></li>';
                    };
                };
            }             
            $weblink = trim($row['weblink']);
            if (!empty($weblink) && (!empty($etapas_title))) {
                $link_arr = parse_url($weblink);
                if ($link_arr['host'] != '')
                    $weblink_str = $link_arr['host'];
                else 
                    $weblink_str = $weblink;
                if (count($arr_files) == 0 ) $etapas_title .= '<ul>';
                $etapas_title .= '<li><a href="'.$weblink.'" target="_blank">'.$weblink_str.'</a></li></ul>'; 
                if (count($arr_files) == 0 ) $etapas_title .= '</ul>';
                }
            else if (!empty($weblink))
                $etapas_title .= '<a href="'.$weblink.'" target="_blank">'.$row['kurzbezeichnung'].'</a>'; 
            else if (!empty($etapas_title) && (count($arr_files) > 0 ))
                $etapas_title .= '</ul>';
            if (empty($etapas_title))
                $etapas_title = $row['kurzbezeichnung'];
			// icon
            if ($row['sourcename'] == 'digicomp') {
				$img_src = 'etapas-digikomp.png';
				$img_alt = 'Digikomp';
			} else if ($row['sourcename'] == 'epop' || $row['sourcename'] == 'epop1') {
				$img_src = 'etapas-epop.png';
				$img_alt = 'ePOP';				
			} else  {
				$img_src = 'etapas-etapas.png';
				$img_alt = 'eTapas';
			}
			
				
            $r .= '<td class="title"><img src="fileadmin/uploads/'.$img_src.'" alt="'.$img_alt.'" title="'.$img_alt.'">&nbsp;'.$etapas_title.'</td>';
//            $r .= '<td class="title">'.$row['kurzbezeichnung'].'</td>';
//            $r .= '<td>'.$row['name'].'</td>';
//            $r .= '<td>'.$row['email'].'</td>';
            $r .= '<td>'.$row['erstelltvonschule'].'</td>';
            $r .= '<td>'.$row['erproptvonschule'].'</td>';
            $r .= '<td>'.$row['faecher'].'</td>';
            $r .= '<td>'.($row['schulstufe']>0 ? $row['schulstufe'] : '').'</td>';
            $r .= '<td>';
            $r .= ($row['vorkenntnisse'] != '' ? '<button type="button" class="btn btn-lg btn-danger btn-etapas" data-toggle="popover" data-placement="bottom" data-content="'.htmlspecialchars($row['vorkenntnisse']).'">Beschreibung</button>' : '');
            //$r .= ($row['vorkenntnisse'] != '' ? '<div class="hide_text"><span title="'.htmlspecialchars($row['vorkenntnisse']).'">Beschreibung</span></div>' : '');
            $r .= '</td>';
            $r .= '<td>';
            // $r .= ($row['technischevoraussetzungen'] != '' ? '<div class="hide_text"><span title="'.htmlspecialchars($row['technischevoraussetzungen']).'"> Beschreibung </span></div>' : '');
            $r .= ($row['technischevoraussetzungen'] != '' ? '<button type="button" class="btn btn-lg btn-danger btn-etapas" data-toggle="popover" data-placement="bottom" data-content="'.htmlspecialchars($row['technischevoraussetzungen']).'">Beschreibung</button>' : '');
            $r .= '</td>';
            $r .= '<td>'.$row['handlungsdimensionen'].'</td>';
/*            $arr_titles = explode(";;;", $row['relevantedeskriptoren']);
//            $r .= '<td>'.$row['relevantedeskriptoren'].'</td>';
            $bread = array_shift($arr_titles);
            if (trim($bread) != '')
                $rel_deskr = htmlspecialchars($bread);
            else 
                $rel_deskr = '';                        
            //$row['relevantedeskriptoren_link'] = ";".$row['relevantedeskriptoren_link'];
            if (trim($row['relevantedeskriptoren_link']) != '') {
                $rel_deskr .= ":\r\n";
                $arr_links = explode(";", $row['relevantedeskriptoren_link']);
                foreach ($arr_links as $key=>$value) {
                    $rel_deskr .= "- ".htmlspecialchars($arr_titles[$key])."\r\n";
                };
            };/**/
            $rel_deskr = $row['relevantedeskriptoren'];
            $r .= "<td class='popoverdescr'>";
            // $r .= ($rel_deskr != '' ? '<div class="hide_text"><span title="'.$rel_deskr.'"> Ich kann ... </span></div>' : '');
            // $r .= ($row['$rel_deskr'] != '' ? '<button type="button" class="btn btn-lg btn-danger btn-etapas" data-toggle="popover" data-placement="bottom" data-content="'.$rel_deskr.'">Ich kann ... </button>' : '');
            $r .= ($rel_deskr != '' ? '<button type="button" class="btn btn-lg btn-danger btn-etapas" data-toggle="popover" data-placement="bottom" data-content="'.$rel_deskr.'">Ich kann ... </button>' : '');
            $r .= "</td>";
            $r .= '<td>'.$row['zeitbedarf'].'</td>';
            $r .= '<td>';
            // $r .= ($row['message'] != '' ? '<div class="hide_text"><span title="'.htmlspecialchars($row['message']).'">Beschreibung</span></div>' : '');
            $r .= ($row['message'] != '' ? '<button type="button" class="btn btn-lg btn-danger btn-etapas" data-toggle="popover" data-placement="bottom" data-content="'.htmlspecialchars($row['message']).'">Beschreibung</button>' : '');
            $r .= '</td>';
            $r .= '<td>'.$row['lizenstype'].'</td>';
            $r .= '</tr>';
        }
        $r .= '</table>';
        
        $content .= $r;
		
		$legend = '<div style="margin: 15px;">
			<img src="fileadmin/uploads/etapas-etapas.png" alt="eTapas" title="eTapas">&nbsp; - eTapas<br>
			<img src="fileadmin/uploads/etapas-epop.png" alt="ePOP" title="ePOP">&nbsp; - ePOP<br>
			<img src="fileadmin/uploads/etapas-digikomp.png" alt="Digikomp" title="Digikomp">&nbsp; - Digikomp<br>			
			</div>
		';
		
        $content .= $legend;
        return $content;	 
       }
       
   }

?>






	

