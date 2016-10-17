<?php
namespace GTN\ElcEtapas2\Controller;


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
class EtapasController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * etapasRepository
     * 
     * @var \GTN\ElcEtapas2\Domain\Repository\EtapasRepository
     * @inject
     */
    protected $etapasRepository = NULL;

    /**
     * action shortList
     *
     * @return void
     */
    public function shortListAction()
    {
        $filter = array();
        $limit = ($this->settings['maxNumbersOfRecords'] > 0 ? $this->settings['maxNumbersOfRecords'] : 15);
        $etapas = $this->etapasRepository->findAllWithFilters($filter, $limit, $this->settings['onlyTop']);
        $this->view->assign('etapases', $etapas);
    }
    
    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $filter = $this->getFilters();

//        print_r($filter);
        if(count($filter)>0) {
            $this->view->assign('filter', $filter);
            $this->view->assign('filterActivated', 1);
        }
//        $GLOBALS['TYPO3_DB']->debugOutput = true;
        $etapas = $this->etapasRepository->findAllWithFilters($filter);
        $this->view->assign('etapases', $etapas);
    }
    
    /**
     * action show
     * 
     * @param int $etapas
     * @return void
     */
    public function showAction($etapas)
    {
        $etapasObj = $this->etapasRepository->findByUid(intval($etapas));
        $this->view->assign('etapas', $etapasObj);
    }
    
    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     * 
     * @param \GTN\ElcEtapas2\Domain\Model\Etapas $newEtapas
     * @return void
     */
    public function createAction(\GTN\ElcEtapas2\Domain\Model\Etapas $newEtapas)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->etapasRepository->add($newEtapas);
        $this->redirect('list');
    }
    
    /**
     * action edit
     * 
     * @param \GTN\ElcEtapas2\Domain\Model\Etapas $etapas
     * @ignorevalidation $etapas
     * @return void
     */
    public function editAction(\GTN\ElcEtapas2\Domain\Model\Etapas $etapas)
    {
        $this->view->assign('etapas', $etapas);
    }
    
    /**
     * action update
     * 
     * @param \GTN\ElcEtapas2\Domain\Model\Etapas $etapas
     * @return void
     */
    public function updateAction(\GTN\ElcEtapas2\Domain\Model\Etapas $etapas)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->etapasRepository->update($etapas);
        $this->redirect('list');
    }
    
    /**
     * action delete
     * 
     * @param \GTN\ElcEtapas2\Domain\Model\Etapas $etapas
     * @return void
     */
    public function deleteAction(\GTN\ElcEtapas2\Domain\Model\Etapas $etapas)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->etapasRepository->remove($etapas);
        $this->redirect('list');
    }

    /**
     * action filters
     *
     * @return void
     */
    public function filtersAction()
    {
        $allHandlungsdimensionen = $this->etapasRepository->getAllFieldValues('handlungsdimensionen', 'handlungsdimensionen');
        $this->view->assign('allHandlungsdimensionen', $allHandlungsdimensionen);
        $allFaecher = $this->etapasRepository->getAllFieldValues('faecher', 'faecher');
        $this->view->assign('allFaecher', $allFaecher);
//        $allSchulstufe = $this->etapasRepository->getAllFieldValues('schulstufe');
        for ($i=1; $i<=13; $i++) {
            $allSchulstufe[$i] = array('id' => $i, 'title' => $i);
        }/**/
//        $allSchulstufe = $this->etapasRepository->getAllFieldValues('schulstufe', 'schulstufe');
        $this->view->assign('allSchulstufe', $allSchulstufe);

        $filter = $this->getFilters();
        $this->view->assign('filter', $filter);
    }

    public function getFilters() {
        $filter = array();
        // clear filters
        if($this->request->hasArgument('filterClear')) {
            $serialized = serialize(array());
            setcookie("etapasFilter", $serialized, time() + (3600 * 24 * 365) );
        } else
            // new filters
        if($this->request->hasArgument('filter')) {
            $filter = $this->request->getArgument('filter');
            // clear empty values
            if ($filter['handlungsdimensionen'])
                $filter['handlungsdimensionen'] = array_filter($filter['handlungsdimensionen']);
            if ($filter['faecher'])
                if (is_array($filter['faecher']))
                    $filter['faecher'] = array_filter($filter['faecher']);
            if ($filter['schulstufe'])
                if (is_array($filter['schulstufe']))
                    $filter['schulstufe'] = array_filter($filter['schulstufe']);
            $filter = array_filter($filter);

            $serialized = serialize($filter);
            setcookie("etapasFilter", $serialized, time() + (3600 * 24 * 365) );
        } else
            // filter from cookies
        if (isset($_COOKIE['etapasFilter'])) {
            $filter = unserialize($_COOKIE['etapasFilter']);
        }
        return $filter;
    }

    public function listAjaxFilteredAction() {
//        $this->listAction();
        $this->forward('list');
//        $this->redirect('list');
    }

}