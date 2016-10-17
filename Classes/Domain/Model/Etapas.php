<?php
namespace Gtn\ElcEtapas2\Domain\Model;


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
 * Etapas
 */
//class Etapas extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
class Etapas extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * email
     * 
     * @var string
     */
    protected $email = '';
    
    /**
     * erstelltvonschule
     * 
     * @var string
     */
    protected $erstelltvonschule = '';
    
    /**
     * erproptvonschule
     * 
     * @var string
     */
    protected $erproptvonschule = '';
    
    /**
     * faecher
     * 
     * @var string
     */
    protected $faecher = '';
    
    /**
     * schulstufe
     * 
     * @var int
     */
    protected $schulstufe = 0;
    
    /**
     * vorkenntnisse
     * 
     * @var string
     */
    protected $vorkenntnisse = '';
    
    /**
     * technischevoraussetzungen
     * 
     * @var string
     */
    protected $technischevoraussetzungen = '';
    
    /**
     * handlungsdimensionen
     * 
     * @var string
     */
    protected $handlungsdimensionen = '';
    
    /**
     * relevantedeskriptoren
     * 
     * @var string
     */
    protected $relevantedeskriptoren = '';
    
    /**
     * zeitbedarf
     * 
     * @var string
     */
    protected $zeitbedarf = '';
    
    /**
     * message
     * 
     * @var string
     */
    protected $message = '';
    
    /**
     * lizenstype
     * 
     * @var string
     */
    protected $lizenstype = '';
    
    /**
     * file
     * 
     * @var string
     */
    protected $file = '';
    
    /**
     * kurzbezeichnung
     * 
     * @var string
     */
    protected $kurzbezeichnung = '';
    
    /**
     * position
     * 
     * @var string
     */
    protected $position = '';
    
    /**
     * relevantedeskriptorenLink
     * 
     * @var string
     */
    protected $relevantedeskriptorenLink = '';
    
    /**
     * weblink
     * 
     * @var string
     */
    protected $weblink = '';
    
    /**
     * materialmedienbedarf
     * 
     * @var string
     */
    protected $materialmedienbedarf = '';
    
    /**
     * namensnennungType
     * 
     * @var string
     */
    protected $namensnennungType = '';
    
    /**
     * kommerziellenutzungType
     * 
     * @var string
     */
    protected $kommerziellenutzungType = '';
    
    /**
     * bearbeitungType
     * 
     * @var string
     */
    protected $bearbeitungType = '';
    
    /**
     * weitergabeType
     * 
     * @var string
     */
    protected $weitergabeType = '';
    
    /**
     * lizensaccept
     * 
     * @var int
     */
    protected $lizensaccept = 0;
    
    /**
     * sourcename
     * 
     * @var string
     */
    protected $sourcename = '';

    /**
     * top
     * 
     * @var int
     */
    protected $top = 0;

    
    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Returns the email
     * 
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     * 
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the erstelltvonschule
     * 
     * @return string $erstelltvonschule
     */
    public function getErstelltvonschule()
    {
        return $this->erstelltvonschule;
    }
    
    /**
     * Sets the erstelltvonschule
     * 
     * @param string $erstelltvonschule
     * @return void
     */
    public function setErstelltvonschule($erstelltvonschule)
    {
        $this->erstelltvonschule = $erstelltvonschule;
    }
    
    /**
     * Returns the erproptvonschule
     * 
     * @return string $erproptvonschule
     */
    public function getErproptvonschule()
    {
        return $this->erproptvonschule;
    }
    
    /**
     * Sets the erproptvonschule
     * 
     * @param string $erproptvonschule
     * @return void
     */
    public function setErproptvonschule($erproptvonschule)
    {
        $this->erproptvonschule = $erproptvonschule;
    }
    
    /**
     * Returns the faecher
     * 
     * @return string $faecher
     */
    public function getFaecher()
    {
        return $this->faecher;
    }
    
    /**
     * Sets the faecher
     * 
     * @param string $faecher
     * @return void
     */
    public function setFaecher($faecher)
    {
        $this->faecher = $faecher;
    }
    
    /**
     * Returns the schulstufe
     * 
     * @return int $schulstufe
     */
    public function getSchulstufe()
    {
        return $this->schulstufe;
    }
    
    /**
     * Sets the schulstufe
     * 
     * @param int $schulstufe
     * @return void
     */
    public function setSchulstufe($schulstufe)
    {
        $this->schulstufe = $schulstufe;
    }
    
    /**
     * Returns the vorkenntnisse
     * 
     * @return string $vorkenntnisse
     */
    public function getVorkenntnisse()
    {
        return $this->vorkenntnisse;
    }
    
    /**
     * Sets the vorkenntnisse
     * 
     * @param string $vorkenntnisse
     * @return void
     */
    public function setVorkenntnisse($vorkenntnisse)
    {
        $this->vorkenntnisse = $vorkenntnisse;
    }
    
    /**
     * Returns the technischevoraussetzungen
     * 
     * @return string $technischevoraussetzungen
     */
    public function getTechnischevoraussetzungen()
    {
        return $this->technischevoraussetzungen;
    }
    
    /**
     * Sets the technischevoraussetzungen
     * 
     * @param string $technischevoraussetzungen
     * @return void
     */
    public function setTechnischevoraussetzungen($technischevoraussetzungen)
    {
        $this->technischevoraussetzungen = $technischevoraussetzungen;
    }
    
    /**
     * Returns the handlungsdimensionen
     * 
     * @return string $handlungsdimensionen
     */
    public function getHandlungsdimensionen()
    {
        return $this->handlungsdimensionen;
    }
    
    /**
     * Sets the handlungsdimensionen
     * 
     * @param string $handlungsdimensionen
     * @return void
     */
    public function setHandlungsdimensionen($handlungsdimensionen)
    {
        $this->handlungsdimensionen = $handlungsdimensionen;
    }
    
    /**
     * Returns the relevantedeskriptoren
     * 
     * @return string $relevantedeskriptoren
     */
    public function getRelevantedeskriptoren()
    {
        return $this->relevantedeskriptoren;
    }
    
    /**
     * Sets the relevantedeskriptoren
     * 
     * @param string $relevantedeskriptoren
     * @return void
     */
    public function setRelevantedeskriptoren($relevantedeskriptoren)
    {
        $this->relevantedeskriptoren = $relevantedeskriptoren;
    }
    
    /**
     * Returns the zeitbedarf
     * 
     * @return string $zeitbedarf
     */
    public function getZeitbedarf()
    {
        return $this->zeitbedarf;
    }
    
    /**
     * Sets the zeitbedarf
     * 
     * @param string $zeitbedarf
     * @return void
     */
    public function setZeitbedarf($zeitbedarf)
    {
        $this->zeitbedarf = $zeitbedarf;
    }
    
    /**
     * Returns the message
     * 
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     * Sets the message
     * 
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     * Returns the lizenstype
     * 
     * @return string $lizenstype
     */
    public function getLizenstype()
    {
        return $this->lizenstype;
    }
    
    /**
     * Sets the lizenstype
     * 
     * @param string $lizenstype
     * @return void
     */
    public function setLizenstype($lizenstype)
    {
        $this->lizenstype = $lizenstype;
    }
    
    /**
     * Returns the file
     * 
     * @return string $file
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * Sets the file
     * 
     * @param string $file
     * @return void
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
    
    /**
     * Returns the kurzbezeichnung
     * 
     * @return string $kurzbezeichnung
     */
    public function getKurzbezeichnung()
    {
        return $this->kurzbezeichnung;
    }
    
    /**
     * Sets the kurzbezeichnung
     * 
     * @param string $kurzbezeichnung
     * @return void
     */
    public function setKurzbezeichnung($kurzbezeichnung)
    {
        $this->kurzbezeichnung = $kurzbezeichnung;
    }
    
    /**
     * Returns the position
     * 
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }
    
    /**
     * Sets the position
     * 
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
    
    /**
     * Returns the relevantedeskriptorenLink
     * 
     * @return string $relevantedeskriptorenLink
     */
    public function getRelevantedeskriptorenLink()
    {
        return $this->relevantedeskriptorenLink;
    }
    
    /**
     * Sets the relevantedeskriptorenLink
     * 
     * @param string $relevantedeskriptorenLink
     * @return void
     */
    public function setRelevantedeskriptorenLink($relevantedeskriptorenLink)
    {
        $this->relevantedeskriptorenLink = $relevantedeskriptorenLink;
    }
    
    /**
     * Returns the weblink
     * 
     * @return string $weblink
     */
    public function getWeblink()
    {
        return $this->weblink;
    }
    
    /**
     * Sets the weblink
     * 
     * @param string $weblink
     * @return void
     */
    public function setWeblink($weblink)
    {
        $this->weblink = $weblink;
    }
    
    /**
     * Returns the materialmedienbedarf
     * 
     * @return string $materialmedienbedarf
     */
    public function getMaterialmedienbedarf()
    {
        return $this->materialmedienbedarf;
    }
    
    /**
     * Sets the materialmedienbedarf
     * 
     * @param string $materialmedienbedarf
     * @return void
     */
    public function setMaterialmedienbedarf($materialmedienbedarf)
    {
        $this->materialmedienbedarf = $materialmedienbedarf;
    }
    
    /**
     * Returns the namensnennungType
     * 
     * @return string $namensnennungType
     */
    public function getNamensnennungType()
    {
        return $this->namensnennungType;
    }
    
    /**
     * Sets the namensnennungType
     * 
     * @param string $namensnennungType
     * @return void
     */
    public function setNamensnennungType($namensnennungType)
    {
        $this->namensnennungType = $namensnennungType;
    }
    
    /**
     * Returns the kommerziellenutzungType
     * 
     * @return string $kommerziellenutzungType
     */
    public function getKommerziellenutzungType()
    {
        return $this->kommerziellenutzungType;
    }
    
    /**
     * Sets the kommerziellenutzungType
     * 
     * @param string $kommerziellenutzungType
     * @return void
     */
    public function setKommerziellenutzungType($kommerziellenutzungType)
    {
        $this->kommerziellenutzungType = $kommerziellenutzungType;
    }
    
    /**
     * Returns the bearbeitungType
     * 
     * @return string $bearbeitungType
     */
    public function getBearbeitungType()
    {
        return $this->bearbeitungType;
    }
    
    /**
     * Sets the bearbeitungType
     * 
     * @param string $bearbeitungType
     * @return void
     */
    public function setBearbeitungType($bearbeitungType)
    {
        $this->bearbeitungType = $bearbeitungType;
    }
    
    /**
     * Returns the weitergabeType
     * 
     * @return string $weitergabeType
     */
    public function getWeitergabeType()
    {
        return $this->weitergabeType;
    }
    
    /**
     * Sets the weitergabeType
     * 
     * @param string $weitergabeType
     * @return void
     */
    public function setWeitergabeType($weitergabeType)
    {
        $this->weitergabeType = $weitergabeType;
    }
    
    /**
     * Returns the lizensaccept
     * 
     * @return int $lizensaccept
     */
    public function getLizensaccept()
    {
        return $this->lizensaccept;
    }
    
    /**
     * Sets the lizensaccept
     * 
     * @param int $lizensaccept
     * @return void
     */
    public function setLizensaccept($lizensaccept)
    {
        $this->lizensaccept = $lizensaccept;
    }
    
    /**
     * Returns the sourcename
     * 
     * @return string $sourcename
     */
    public function getSourcename()
    {
        return $this->sourcename;
    }
    
    /**
     * Sets the sourcename
     * 
     * @param string $sourcename
     * @return void
     */
    public function setSourcename($sourcename)
    {
        $this->sourcename = $sourcename;
    }

    public function getFiles() {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
        $settings = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS, 'elcetapas2_elcetapas');

        $files = array();
        $filepath = $settings['etapas']['pathToUploadedFiles'];

        $arr_files = explode(",", $this->getFile());
        foreach ($arr_files as $key=>$value) {
            // if file was inserted from BE - he has relative path
            if (strpos($value, $filepath) !== FALSE) {
                $value = str_replace($filepath, '', $value);
            }
	    if ($value != '')
	    	$files[] = array('path' => $filepath.$value, 'name' => $value);
        };
        return $files;
    }

    /**
     * Returns the top
     * 
     * @return int $top
     */
    public function getTop()
    {
        return $this->top;
    }
    
    /**
     * Sets the top
     * 
     * @param int $top
     * @return void
     */
    public function setTop($top)
    {
        $this->top = $top;
    }
    
	public function getBloom() {
		if ($this->getHandlungsdimensionen() == 'Reflektieren') return 'bloom-1';
		if ($this->getHandlungsdimensionen() == 'Anwenden') return 'bloom-2';
		if ($this->getHandlungsdimensionen() == 'Verstehen') return 'bloom-3';
		if ($this->getHandlungsdimensionen() == 'Analysieren') return 'bloom-4';

		return 'bloom-other';
	}

}