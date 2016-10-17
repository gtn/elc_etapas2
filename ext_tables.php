<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Gtn.' . $_EXTKEY,
	'Elcetapas',
	'Etapas'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_elcetapas';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_elcetapas.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'elc_etapas2');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('elc_etapas', 'EXT:elc_etapas2/Resources/Private/Language/locallang_csh_elc_etapas.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('elc_etapas');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('elc_etapas');
