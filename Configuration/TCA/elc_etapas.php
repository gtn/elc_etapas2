<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas',
		'label' => 'kurzbezeichnung',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'dividers2tabs' => TRUE,
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
		),
		'searchFields' => 'name,email,erstelltvonschule,erproptvonschule,faecher,schulstufe,vorkenntnisse,technischevoraussetzungen,handlungsdimensionen,relevantedeskriptoren,zeitbedarf,message,lizenstype,file,kurzbezeichnung,position,relevantedeskriptoren_link,weblink,materialmedienbedarf,namensnennung_type,kommerziellenutzung_type,bearbeitung_type,weitergabe_type,lizensaccept,sourcename,top,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('elc_etapas2') . 'Resources/Public/Icons/elc_etapas.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, email, erstelltvonschule, erproptvonschule, faecher, schulstufe, vorkenntnisse, technischevoraussetzungen, handlungsdimensionen, relevantedeskriptoren, zeitbedarf, message, lizenstype, file, kurzbezeichnung, position, relevantedeskriptoren_link, weblink, materialmedienbedarf, namensnennung_type, kommerziellenutzung_type, bearbeitung_type, weitergabe_type, lizensaccept, sourcename, top',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, name, email, erstelltvonschule, erproptvonschule, faecher, schulstufe, vorkenntnisse, technischevoraussetzungen, handlungsdimensionen, relevantedeskriptoren, zeitbedarf, message, lizenstype, file, kurzbezeichnung, position, relevantedeskriptoren_link, weblink, materialmedienbedarf, namensnennung_type, kommerziellenutzung_type, bearbeitung_type, weitergabe_type, lizensaccept, sourcename, top, '),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array (
		'hidden' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'kurzbezeichnung' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.kurzbezeichnung',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'name' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.name',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'email' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.email',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'erstelltvonschule' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.erstelltvonschule',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'erproptvonschule' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.erproptvonschule',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'faecher' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.faecher',
			'config' => array (
				'type' => 'input',
				'size' => '30',
				'eval' => 'required',
			)
		),
		'schulstufe' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.0', '5'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.1', '6'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.2', '7'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.3', '8'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.4', '9'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.5', '10'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.6', '11'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.7', '12'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.schulstufe.I.8', '13'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'vorkenntnisse' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.vorkenntnisse',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'technischevoraussetzungen' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.technischevoraussetzungen',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'handlungsdimensionen' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.handlungsdimensionen',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.handlungsdimensionen.I.0', 'Verstehen'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.handlungsdimensionen.I.1', 'Anwenden'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.handlungsdimensionen.I.2', 'Reflektieren'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.handlungsdimensionen.I.3', 'Analysieren'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'relevantedeskriptoren' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.relevantedeskriptoren',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
				'wizards' => array(
					'specialWizard' => array(
						'type' => 'userFunc',
						'userFunc' => 'GTN\\ElcEtapas2\\Utilites\\BeUtilite->descriptorSelectWizard',
					)
				),
			)
		),
		'relevantedeskriptoren_link' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.relevantedeskriptoren_link',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'zeitbedarf' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.zeitbedarf',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'message' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.message',
			'config' => array (
				'type' => 'text',
				'cols' => '30',
				'rows' => '5',
			)
		),
		'lizenstype' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.lizenstype',
			'config' => array (
				'type' => 'select',
				'items' => array (
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.lizenstype.I.1', 'Creative Commons cc-by'),
					array('LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.lizenstype.I.2', 'Creative Commons cc-by-sa'),
				),
				'size' => 1,
				'maxitems' => 1,
			)
		),
		/* 		'file' => Array (
                    'label' => 'LLL:EXT:lang/locallang_general.php:LGL.images',
                    'config' => Array (
                        'type' => 'group',
                        'internal_type' => 'file',
                        'allowed' => 'pdf,*',
                        'uploadfolder' => 'fileadmin/etapas_upload/',
                        'show_thumbs' => '1',
                        'size' => '3',
                        'maxitems' => '10',
                        'minitems' => '0',
                        'autoSizeMax' => 10,
                    )
                ), */
		'file' => array(
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.file',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file_reference',
				'uploadfolder' => 'fileadmin/etapas_upload/',
				'size' => 3,
				'minitems' => 0,
				'maxitems' => 10,
				'autoSizeMax' => 10,
				'wizards' => array(
					'specialWizard' => array(
						'type' => 'userFunc',
						'userFunc' => 'GTN\\ElcEtapas2\\Utilites\\BeUtilite->filelinksWizard',
					)
				)
			)
		),
		/* 		'file' => array (		
                    'exclude' => 0,		
                    'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.file',		
                    'config' => array (
                        'type' => 'input',	
                        'size' => '30',
                    )
                ), */
		'weblink' => array (
			'exclude' => 0,
			'label' => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.weblink',
			'config' => array (
				'type' => 'input',
				'size' => '30',
			)
		),
		'top' => array (
			'exclude' => 1,
			'label'   => 'LLL:EXT:elc_etapas2/Resources/Private/Language/locallang_db.xlf:elc_etapas.top',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),

	),
);