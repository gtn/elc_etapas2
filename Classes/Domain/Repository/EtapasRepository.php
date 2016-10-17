<?php
namespace Gtn\ElcEtapas2\Domain\Repository;


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
 * The repository for Etapas
 */
class EtapasRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = array(
	'top' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'tstamp' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
    );

    public function initializeObject() {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }


    public function findAllWithFilters($filters, $limit = 0, $onlyTop = 0) {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(FALSE);
//        print_r($filters); exit;
        $constraints = array();
	// only Top eTapas
	if ($onlyTop) {
                array_push($constraints, $query->equals('top', 1));
	}
        // check filters
        if (count($filters) > 0) {
//            $constraints = array('1' => '1');
            if (count($filters['handlungsdimensionen']) > 0) {
                array_push($constraints, $query->in('handlungsdimensionen', $filters['handlungsdimensionen']));
            }
            if (is_array($filters['faecher']) && count($filters['faecher']) > 0) {
                array_push($constraints, $query->in('faecher', $filters['faecher']));
            } else if ($filters['faecher'] != '') {
                array_push($constraints, $query->equals('faecher', $filters['faecher']));
            }
            if (is_array($filters['schulstufe']) && count($filters['schulstufe']) > 0) {
                array_push($constraints, $query->in('schulstufe', $filters['schulstufe']));
            } else if ($filters['schulstufe'] != '') {
                array_push($constraints, $query->equals('schulstufe', $filters['schulstufe']));
            }
            if ($filters['dateFrom'] != '') {
                $tstamp = \DateTime::createFromFormat('d.m.Y', $filters['dateFrom']);
                $tstamp->setTime(0, 0, 0);
                $ts = $tstamp->getTimestamp();
                array_push($constraints, $query->greaterThanOrEqual('tstamp', $ts));
            }
            if ($filters['dateTo'] != '') {
                $tstamp = \DateTime::createFromFormat('d.m.Y', $filters['dateTo']);
                $tstamp->setTime(23, 59, 59);
                $ts = $tstamp->getTimestamp();
                array_push($constraints, $query->lessThanOrEqual('tstamp', $ts));
            }

        }
	if (count($constraints) > 0)
            $query->matching($query->logicalAnd($constraints));

        if ($limit > 0) {
            $query->setLimit(intval($limit));
        }

        return $query->execute();
    }

    public function findAllSorted($sorting = '', $asc = 1)
    {
        $query = $this->createQuery();
        if ($sorting != '')
            $query->setOrderings(array($sorting => ($asc==1 ? \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING : \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)));
        return $query->execute();
    }

    public function getAllFieldValues($field = 'name', $sorting = '') {
        $res = array();
        $already = array();
        $i = 1;
        if ($sorting != '')
            $etapases = $this->findAllSorted($sorting);
        else
            $etapases = $this->findAll();
        foreach($etapases as $etapas) {
            if (trim($etapas->{'get'.ucfirst($field)}()) != '' && !in_array($etapas->{'get'.ucfirst($field)}(), $already)) {
                $already[] = $etapas->{'get' . ucfirst($field)}();
                $res[$i]['id'] = $i;
                $res[$i]['title'] = $etapas->{'get' . ucfirst($field)}();
                $i++;
            }
        }
        return $res;
    }
}