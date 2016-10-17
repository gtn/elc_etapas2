<?php
namespace Gtn\ElcEtapas2\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
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
 * Test case for class Gtn\ElcEtapas2\Controller\EtapasController.
 *
 */
class EtapasControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Gtn\ElcEtapas2\Controller\EtapasController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Gtn\\ElcEtapas2\\Controller\\EtapasController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllEtapassFromRepositoryAndAssignsThemToView()
	{

		$allEtapass = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$etapasRepository = $this->getMock('Gtn\\ElcEtapas2\\Domain\\Repository\\EtapasRepository', array('findAll'), array(), '', FALSE);
		$etapasRepository->expects($this->once())->method('findAll')->will($this->returnValue($allEtapass));
		$this->inject($this->subject, 'etapasRepository', $etapasRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('etapass', $allEtapass);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenEtapasToView()
	{
		$etapas = new \Gtn\ElcEtapas2\Domain\Model\Etapas();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('etapas', $etapas);

		$this->subject->showAction($etapas);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenEtapasToEtapasRepository()
	{
		$etapas = new \Gtn\ElcEtapas2\Domain\Model\Etapas();

		$etapasRepository = $this->getMock('Gtn\\ElcEtapas2\\Domain\\Repository\\EtapasRepository', array('add'), array(), '', FALSE);
		$etapasRepository->expects($this->once())->method('add')->with($etapas);
		$this->inject($this->subject, 'etapasRepository', $etapasRepository);

		$this->subject->createAction($etapas);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenEtapasToView()
	{
		$etapas = new \Gtn\ElcEtapas2\Domain\Model\Etapas();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('etapas', $etapas);

		$this->subject->editAction($etapas);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenEtapasInEtapasRepository()
	{
		$etapas = new \Gtn\ElcEtapas2\Domain\Model\Etapas();

		$etapasRepository = $this->getMock('Gtn\\ElcEtapas2\\Domain\\Repository\\EtapasRepository', array('update'), array(), '', FALSE);
		$etapasRepository->expects($this->once())->method('update')->with($etapas);
		$this->inject($this->subject, 'etapasRepository', $etapasRepository);

		$this->subject->updateAction($etapas);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenEtapasFromEtapasRepository()
	{
		$etapas = new \Gtn\ElcEtapas2\Domain\Model\Etapas();

		$etapasRepository = $this->getMock('Gtn\\ElcEtapas2\\Domain\\Repository\\EtapasRepository', array('remove'), array(), '', FALSE);
		$etapasRepository->expects($this->once())->method('remove')->with($etapas);
		$this->inject($this->subject, 'etapasRepository', $etapasRepository);

		$this->subject->deleteAction($etapas);
	}
}
