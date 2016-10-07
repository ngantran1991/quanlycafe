<?php

namespace SM\Bundle\UserBundle\Repository;

use SM\Bundle\UserBundle\Repository\BaseRepository;
use SM\Bundle\UserBundle\Constants\Configs;
use Doctrine\ORM\Query;

/**
 * ExchangeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExchangeRepository extends BaseRepository
{

    public function getPriceForADay($dateNow, $typeExchane)
    {
        $exQuery = $this->createQueryBuilder('ex')
            ->select('ex.idExchange, ex.valueIn, ex.valueOut')
            ->where('ex.idTypeExchange = :idTypeExchange')
            ->andWhere('ex.dateActive = :dateActive')
            ->setParameter('dateActive', $dateNow->format('Y-m-d'))
            ->setParameter("idTypeExchange", $typeExchane)
            ->getQuery();
        $result = $this->cusPriceForADay($exQuery->getArrayResult());

        return $result;

    }
    
    private function cusPriceForADay($arrPrice = array())
    {
        if (is_array($arrPrice) && count($arrPrice)) {
            if (count($arrPrice) == 1) {
                $arrPrice[0]['isClick'] = false;
                return $arrPrice;
            } else {
                $arrIdEx = array();
                for ($i = 1; $i < count($arrPrice); $i++) {
                    array_push($arrIdEx, $arrPrice[$i]['idExchange']);
                }
                $query = $this->createQueryBuilder('ex')
                ->delete('UserBundle:Exchange', 'ex')
                ->Where('ex.idExchange in (:id)')
                ->setParameter('id', $arrIdEx)
                ->getQuery();

                $query->execute();
                return array( 0 => array('valueIn' => $arrPrice[0]['valueIn'],
                        'valueOut' => $arrPrice[0]['valueOut'],
                        'isClick' => false,
                        ));
            }
        } else {
            return array( 0 => array('valueIn' => null,
                'valueOut' => null,
                'isClick' => true,
                ));
        }
    }

    /**
     * Get etat compte by user
     *
     * @param Integer $userId
     * @return Integer or Null | id etat compte
     */
    public function getEtatCompteByUserId($userId)
    {
        $userQuery = $this->createQueryBuilder('cp')
            ->select('etat.idEtatCompte')
            ->join('cp.idEtatCompte', 'etat')
            ->where('cp.idCompte = :idCompte')
            ->setParameter('idCompte', $userId)
            ->getQuery();

        $result = $userQuery->getOneOrNullResult();

        return !empty($result) ? $result['idEtatCompte'] : null;

    }

    /**
     * Get professional request information by Id
     *
     * @param Integer $professionalId
     * @return Array Professional request information
     */
    public function getProfessionalRequestDetail($professionalId)
    {
        $query = $this->createQueryBuilder('c')
            ->from('SMRESTBundle:Adresse', 'addr')
            ->select(" COALESCE(cp.nom, '') as name, COALESCE(cp.prenom, '') as first_name, cp.idCompte as user_id,"
                . " COALESCE(cp.telephoneFixe, '') as phone, COALESCE(cp.telephonePort, '') as mobile_phone,"
                . " cp.tarifDeplacement as tarif_deplacement, cp.tarifHorraire as tarif_horraire,"
                . " COALESCE(cp.description, '') as description, COALESCE(addr.adresseCompl, '') as address,"
                . " COALESCE(fi.cheminFichier,'') as user_avatar")
            ->join('addr.idCompte', 'cp')
            ->leftJoin('cp.idFichier', 'fi')
            ->where('addr.idCompte = :idCompte')
            ->setParameter('idCompte', $professionalId)
            ->groupBy('addr.idCompte')
            ->getQuery();

        $result = $query->getOneOrNullResult();

        return $result;

    }

    /**
     * Check user is actived
     *
     * @param User Object $userId
     * @return Boolean
     */
    public function checkUserIsActived($userId)
    {
        $globalManager = $this->getContainer()->get('sm_rest.global.manager');
        $etatValidate = $globalManager->getParamConfig('etat_compte_validated');
        $etatCompteRepo = $globalManager->etatCompteRepo;
        $etatValidated = $etatCompteRepo->find($etatValidate);

        $conditions = array(
            'idEtatCompte' => $etatValidated,
            'idCompte' => $userId
        );
        $query = $this->createQueryBuilder('cp')
            ->select('cp.idCompte')
            ->where('cp.idEtatCompte = :idEtatCompte')
            ->andWhere('cp.idCompte = :idCompte')
            ->setParameters($conditions);

        $result = $query->getQuery()->getResult();

        $returnData = (!empty($result)) ? true : false;

        return $returnData;

    }

    public function getCompteListByType($type, $record_num = 0, $conditions = array())
    {

        $numberRecord = ($record_num > 0) ? $record_num : $this->getContainer()->getParameter('record_per_page');

        $params = array(
            'type' => $type,
        );
        $query = $this->createQueryBuilder('cp');
        $query->where('cp.idTypeCompte IN (:type)');
        if (isset($conditions['raisonSocial']) && $conditions['raisonSocial'] != '') {
            $query->andWhere("cp.raisonSocial LIKE :parameterValue");
            $params['parameterValue'] = '%' . $conditions['raisonSocial'] . '%';
        }

        if (isset($conditions['searchKey'])) {
            $query->andWhere('cp.nom LIKE :searchKey'
                . ' OR cp.prenom LIKE :searchKey'
                . ' OR cp.email LIKE :searchKey');
            $params['searchKey'] = '%' . $conditions['searchKey'] . '%';
        }
        $query->setParameters($params);

        $query->orderBy('cp.idCompte', 'DESC');
        $total = count($query->getQuery()->getResult());

        return array(
            'info' => $query->getQuery()->getResult(),
            'total_page' => ceil($total / $numberRecord),
            'total_record' => $total
        );

    }
    
    public function findOneByMailAndDeactive($mail)
    {
        $globalManager = $this->getContainer()->get('sm_rest.global.manager');
        $etatDeactive = $globalManager->getParamConfig('etat_compte_disabled');
        $etatCompteRepo = $globalManager->etatCompteRepo;
        $etatValidated = $etatCompteRepo->find($etatDeactive);
        $conditions = array(
            'email' => $mail,
            'idEtatCompte' => $etatValidated
        );
        $query = $this->createQueryBuilder('cp')
            ->select('cp')
            ->where('cp.idEtatCompte != :idEtatCompte')
            ->andWhere('cp.email = :email')
            ->setParameters($conditions);

        $result = $query->getQuery()->getOneOrNullResult();

        return $result;
    }
    
    public function findAllProEndTimeEtat($etatCompte = null)
    {
        $conditions = array(
            'idEtatComte' => $etatCompte
        );
        $query = $this->createQueryBuilder('cp')
            ->select('cp')
            ->where('cp.idEtatCompte = :idEtatComte')
            ->andWhere('cp.dateDesactivation < CURRENT_TIMESTAMP()')
            ->setParameters($conditions);

        $result = $query->getQuery()->getResult();

        return $result;
    }
}