<?php
namespace Gtn\ElcEtapas2\Utilites;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * EtapasController
 */
class BeUtilite
{

    public function filelinksWizard($PA, $fObj) {
        $output = '';
        // $output .= print_r($PA, true);
        if ($PA['row']['file'] <> '') {
            $files = explode(',', $PA['row']['file']);
            // $output .= '<div style="font-weight: bold;">Links to files:</div>';
            $output .= '<div style="font-size: 0.75em;">';
            foreach ($files as $file) {
                $file = urldecode($file);
                $path_parts = pathinfo($file);
                $filepath = $path_parts['dirname'];
                if ($filepath=='.')
                    $filepath = 'fileadmin/etapas_upload';
                $filename = $path_parts['basename'];
                // Typo3 6.2 return '|filename' - delete it
                if ($spos = strpos($filename, '|'));
                $filename = substr($filename, 0, $spos);
                $output .= '<a href="'.\TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('TYPO3_SITE_URL').$filepath.'/'.$filename.'" target="_blank">'.$filename.'</a><br>';
            }
            $output .= '</div>';
        }
        return $output;
    }

    public function descriptorSelectWizard($PA, $fObj) {
        $output = '';
        $output = '<style type="text/css">
						select.edugroupdata {
							width:300px;
						}
						ul.breadcrumb {
							margin-bottom: 0px !important;
							padding-left: 0px !important;
						}
						ul.breadcrumb li {
							display:inline;
							color: #000283;
							cursor: pointer
						}
						.descriptorselector:nth-child(even) {
							background-color: #F2F0F0;
						}
						.descriptorselector .servicebar {
							display: block;

						}
						.descriptorselector .servicebar span{
						}
        </style>';
        $output .= '<script src="../typo3conf/ext/elc_etapas2/Resources/Public/JavaScript/datafromDB_BE.js"></script>';
        $servicebar = '<span class="servicebar" style="display: none;">
						<span title="entfernen relevante Deskriptoren" href="#" class="delete"><span class="t3-icon t3-icon-actions t3-icon-actions-edit t3-icon-edit-delete">&nbsp;</span></span>
						<span title="hinzufugen auf relevante Deskriptoren" href="#" class="add"><span class="t3-icon t3-icon-actions t3-icon-actions-document t3-icon-document-new">&nbsp;</span></span>
					</span>';
        $output .= '<div style="width:200px; font-size: 0.75em;">';
        $number = 1;
        $exists = 0;
        // $output .= print_r($PA['row']['relevantedeskriptoren_link'], true);
        if ($PA['row']['relevantedeskriptoren_link'] != '') {
            $topics = explode('NEW-TOPIC;', $PA['row']['relevantedeskriptoren_link']);
            foreach ($topics as $topic_key => $topic) {
                if ($topic != '') {
                    $arr_descr = array();
                    $descriptors = explode(';', $topic);
                    foreach ($descriptors as $descriptor) {
                        if ($descriptor != '') {
                            $parts = parse_url($descriptor);
                            parse_str($parts['query'], $query);
                            $topicid = $query['topicid'];
                            // $output .= $descriptor;
                            // $output .= ' ; descrid='.$query['descrid'];
                            // $output .= '<br>';
                            $arr_descr[] = $query['descrid'];
                            $exists = 1;
                        }
                    }
                    // for exists topics
                    $output .= '<div id="select_number_'.$number.'" class="descriptorselector" go="to='.$topicid.'" descr_selected='.implode(',', $arr_descr).'><ul class="breadcrumb"></ul><select class="edugroupdata" onchange="onchangeSendGet(this);" name="edugroupdata"></select>';
                    $output .= $servicebar;
                    $output .= '</div>';
                    // $output .= '</div>';
                    $number++;
                };
            };
        } else {
            // no exists data
            $output .= '<div id="select_number_1" class="descriptorselector"><ul class="breadcrumb"></ul><select class="edugroupdata" onchange="onchangeSendGet(this);" name="edugroupdata"></select>';
            $output .= $servicebar;
            $output .= '</div>';
        }
        $output .= '</div>';
        $output .= '<script>var exists_data = '.$exists.';</script>';
        return $output;
    }


}