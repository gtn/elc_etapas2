<?php

namespace GTN\ElcEtapas2\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \GTN\ElcEtapas2\Domain\Model\Etapas.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class EtapasTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \GTN\ElcEtapas2\Domain\Model\Etapas
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \GTN\ElcEtapas2\Domain\Model\Etapas();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getErstelltvonschuleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getErstelltvonschule()
		);
	}

	/**
	 * @test
	 */
	public function setErstelltvonschuleForStringSetsErstelltvonschule()
	{
		$this->subject->setErstelltvonschule('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'erstelltvonschule',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getErproptvonschuleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getErproptvonschule()
		);
	}

	/**
	 * @test
	 */
	public function setErproptvonschuleForStringSetsErproptvonschule()
	{
		$this->subject->setErproptvonschule('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'erproptvonschule',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFaecherReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFaecher()
		);
	}

	/**
	 * @test
	 */
	public function setFaecherForStringSetsFaecher()
	{
		$this->subject->setFaecher('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'faecher',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSchulstufeReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setSchulstufeForIntSetsSchulstufe()
	{	}

	/**
	 * @test
	 */
	public function getVorkenntnisseReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVorkenntnisse()
		);
	}

	/**
	 * @test
	 */
	public function setVorkenntnisseForStringSetsVorkenntnisse()
	{
		$this->subject->setVorkenntnisse('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'vorkenntnisse',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTechnischevoraussetzungenReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTechnischevoraussetzungen()
		);
	}

	/**
	 * @test
	 */
	public function setTechnischevoraussetzungenForStringSetsTechnischevoraussetzungen()
	{
		$this->subject->setTechnischevoraussetzungen('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'technischevoraussetzungen',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHandlungsdimensionenReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHandlungsdimensionen()
		);
	}

	/**
	 * @test
	 */
	public function setHandlungsdimensionenForStringSetsHandlungsdimensionen()
	{
		$this->subject->setHandlungsdimensionen('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'handlungsdimensionen',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRelevantedeskriptorenReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRelevantedeskriptoren()
		);
	}

	/**
	 * @test
	 */
	public function setRelevantedeskriptorenForStringSetsRelevantedeskriptoren()
	{
		$this->subject->setRelevantedeskriptoren('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'relevantedeskriptoren',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getZeitbedarfReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getZeitbedarf()
		);
	}

	/**
	 * @test
	 */
	public function setZeitbedarfForStringSetsZeitbedarf()
	{
		$this->subject->setZeitbedarf('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'zeitbedarf',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMessageReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMessage()
		);
	}

	/**
	 * @test
	 */
	public function setMessageForStringSetsMessage()
	{
		$this->subject->setMessage('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'message',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLizenstypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLizenstype()
		);
	}

	/**
	 * @test
	 */
	public function setLizenstypeForStringSetsLizenstype()
	{
		$this->subject->setLizenstype('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'lizenstype',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFileReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFile()
		);
	}

	/**
	 * @test
	 */
	public function setFileForStringSetsFile()
	{
		$this->subject->setFile('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'file',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getKurzbezeichnungReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getKurzbezeichnung()
		);
	}

	/**
	 * @test
	 */
	public function setKurzbezeichnungForStringSetsKurzbezeichnung()
	{
		$this->subject->setKurzbezeichnung('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'kurzbezeichnung',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPositionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getPosition()
		);
	}

	/**
	 * @test
	 */
	public function setPositionForStringSetsPosition()
	{
		$this->subject->setPosition('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'position',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRelevantedeskriptorenLinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRelevantedeskriptorenLink()
		);
	}

	/**
	 * @test
	 */
	public function setRelevantedeskriptorenLinkForStringSetsRelevantedeskriptorenLink()
	{
		$this->subject->setRelevantedeskriptorenLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'relevantedeskriptorenLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWeblinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWeblink()
		);
	}

	/**
	 * @test
	 */
	public function setWeblinkForStringSetsWeblink()
	{
		$this->subject->setWeblink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'weblink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMaterialmedienbedarfReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMaterialmedienbedarf()
		);
	}

	/**
	 * @test
	 */
	public function setMaterialmedienbedarfForStringSetsMaterialmedienbedarf()
	{
		$this->subject->setMaterialmedienbedarf('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'materialmedienbedarf',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getNamensnennungTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNamensnennungType()
		);
	}

	/**
	 * @test
	 */
	public function setNamensnennungTypeForStringSetsNamensnennungType()
	{
		$this->subject->setNamensnennungType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'namensnennungType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getKommerziellenutzungTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getKommerziellenutzungType()
		);
	}

	/**
	 * @test
	 */
	public function setKommerziellenutzungTypeForStringSetsKommerziellenutzungType()
	{
		$this->subject->setKommerziellenutzungType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'kommerziellenutzungType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBearbeitungTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBearbeitungType()
		);
	}

	/**
	 * @test
	 */
	public function setBearbeitungTypeForStringSetsBearbeitungType()
	{
		$this->subject->setBearbeitungType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'bearbeitungType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getWeitergabeTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getWeitergabeType()
		);
	}

	/**
	 * @test
	 */
	public function setWeitergabeTypeForStringSetsWeitergabeType()
	{
		$this->subject->setWeitergabeType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'weitergabeType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLizensacceptReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setLizensacceptForIntSetsLizensaccept()
	{	}

	/**
	 * @test
	 */
	public function getSourcenameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSourcename()
		);
	}

	/**
	 * @test
	 */
	public function setSourcenameForStringSetsSourcename()
	{
		$this->subject->setSourcename('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'sourcename',
			$this->subject
		);
	}
}
