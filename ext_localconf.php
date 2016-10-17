<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Gtn.' . $_EXTKEY,
	'Elcetapas',
	array(
		'Etapas' => 'list,show,filters,shortList,listAjaxFiltered',
	),
	// non-cacheable actions
	array(
		'Etapas' => 'list,show,filters,shortList,listAjaxFiltered',
	)
);
