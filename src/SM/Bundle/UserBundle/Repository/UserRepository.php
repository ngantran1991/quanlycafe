<?php

namespace SM\Bundle\UserBundle\Repository;

use SM\Bundle\UserBundle\Repository\BaseRepository;
use SM\Bundle\UserBundle\Constants\Configs;
use Doctrine\ORM\Query;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends BaseRepository
{

    /**
     *
     * Load compte object by email or id
     *
     * @param string $emailOrId
     * @param boolean $isEmail true: $emailOrId is email; false: $emailOrId is Id
     * @return Compte object
     */
    public function loadCompteByEmailOrId($emailOrId, $isEmail = true)
    {
        $query = $this->createQueryBuilder('c')
            ->select('c.idCompte, c.nom, c.prenom, c.email, c.password,'
                . ' c.raisonSocial,'
                . "ci.idCivilite as gender, type.idTypeCompte, type.typeCompteKey")
            ->join('c.idCivilite', 'ci')
            ->join('c.idTypeCompte', 'type');
        if (!$isEmail) {
            $customQuery = $query->where('c.idCompte = :idCompte')
                ->setParameter('idCompte', $emailOrId)
                ->getQuery();
        } else {
            $customQuery = $query->where('c.email = :email')
                ->setParameter('email', $emailOrId)
                ->getQuery();
        }

        return $customQuery->getOneOrNullResult();

    }

    /**
     *
     * Check email exist
     *
     * @param string $email
     * @return Boolean
     */
    public function checkEmailExist($email)
    {
        $query = $this->createQueryBuilder('cp')
            ->select('cp.idCompte')
            ->where('cp.email = :email')
            ->setParameter('email', $email)
            ->getQuery();

        $result = $query->getOneOrNullResult();

        return !empty($result) ? true : false;

    }

    public function getCompteProfileById($userId, $currentHost)
    {
        $dataResponse = array();
        $userQuery = $this->createQueryBuilder('cp')
            ->select('cp.idCompte, cp.nom, cp.prenom, cp.email, IDENTITY(cp.idEtatCompte) as etat,'
                . ' cp.telephoneFixe as phone, cp.raisonSocial, cp.telephonePort as mobilePhone,'
                . ' cp.nSiret, cp.nTvaIntra, cp.tarifHorraire, cp.tarifDeplacement,'
                . ' cp.description, ci.idCivilite as gender, tcp.idTypeCompte, cp.dateCreation as created_date, '
                . ' cp.dateDesactivation as date_deactivation, '
                . ' cp.codeNaf as code_naf, '
                . ' fc.cheminFichier as image')
            ->join('cp.idCivilite', 'ci')
            ->join('cp.idTypeCompte', 'tcp')
            ->leftJoin('cp.idFichier', 'fc')
            ->where('cp.idCompte = :idCompte')
            ->setParameter('idCompte', $userId)
            ->getQuery();
        $userInfo = $userQuery->getOneOrNullResult();
        if (!empty($userInfo)) {
            $dataResponse['user_id'] = $userId;
            $dataResponse['email'] = $userInfo['email'];
            $dataResponse['etat'] = $userInfo['etat'];
            $dataResponse['gender'] = $userInfo['gender'];
            $dataResponse['first_name'] = $userInfo['prenom'];
            $dataResponse['name'] = $userInfo['nom'];
            $dataResponse['phone'] = $userInfo['phone'];
            $dataResponse['mobile_phone'] = $userInfo['mobilePhone'];
            $dataResponse['social_reason'] = $userInfo['raisonSocial'] ? $userInfo['raisonSocial'] : '';
            $dataResponse['siret'] = $userInfo['nSiret'];
            $dataResponse['num_tva_intra'] = $userInfo['nTvaIntra'];
            $dataResponse['code_naf'] = $userInfo['code_naf'] == null ? "" : $userInfo['code_naf'];
            $dataResponse['description'] = $userInfo['description'] ? $userInfo['description'] : '';
            $dataResponse['tarif_horraire'] = $userInfo['tarifHorraire'];
            $dataResponse['tarif_deplacement'] = $userInfo['tarifDeplacement'];
            $createdDate = $userInfo['created_date'];
            $dataResponse['date_created'] = $createdDate;
            if (isset($userInfo['date_deactivation']) && $userInfo['date_deactivation']) {
                $dateDeactive = $userInfo['date_deactivation'];
            } else {
                $dateDeactive = $createdDate;
                $dateDeactive->modify('+1 year');
                //issue net 2127
                $dateDeactive->modify('+1 months');
            }
            $dataResponse['date_deactivation'] = $dateDeactive;
            $dataResponse['user_type_id'] = $userInfo['idTypeCompte'];
            $dataResponse['image'] = (isset($userInfo['image']) && !empty($userInfo['image'])) ? $currentHost . $userInfo['image'] : "";

            $addressQuery = $this->createQueryBuilder('addressQuery')
                ->select('addr.adresseCodePostale, addr.adresseVille,'
                    . "addr.adresseNum, addr.adresseRue, addr.adresseCompl,"
                    . "addr.adresseRueCompl, at.idTypeAdresse as addrTypeId")
                ->from('SMRESTBundle:Adresse', 'addr')
                ->join('addr.idTypeAdresse', 'at')
                ->where('addr.idCompte = :idCompte')
                ->setParameter('idCompte', $userId)
                ->groupBy('addr.idCompte')
                ->getQuery();
            $userAddress = $addressQuery->getOneOrNullResult();

            $dataResponse['no_way'] = $userAddress['adresseNum'] ? $userAddress['adresseNum'] : '';
            $dataResponse['address_line1'] = $userAddress['adresseRue'] ? $userAddress['adresseRue'] : '';
            $dataResponse['address_line2'] = $userAddress['adresseRueCompl'] ? $userAddress['adresseRueCompl'] : '';
            $dataResponse['address'] = $userAddress['adresseCompl'] ? $userAddress['adresseCompl'] : '';
            $dataResponse['code_postal'] = $userAddress['adresseCodePostale'] ? $userAddress['adresseCodePostale'] : '';
            $dataResponse['ville'] = $userAddress['adresseVille'] ? $userAddress['adresseVille'] : '';
            $dataResponse['address_type'] = $userAddress['addrTypeId'] ? $userAddress['addrTypeId'] : Configs::DEFAULT_ADDRESS_TYPE;

            $documentQuery = $this->createQueryBuilder('documentQuery')
                ->select('fi.idFichier, fi.nomFichier, fiType.idTypeFichier')
                ->from('SMRESTBundle:Documents', 'doc')
                ->join('doc.idFichier', 'fi')
                ->join('fi.idTypeFichier', 'fiType')
                ->where('doc.idCompte = :idCompte')
                ->groupBy('fi.idFichier')
                ->setParameter('idCompte', $userId)
                ->getQuery();
            $userDocument = $documentQuery->getResult();
            if (!empty($userDocument)) {
                foreach ($userDocument as $item) {
                    if (isset($item['idTypeFichier'])) {
                        $fileType = $item['idTypeFichier'];
                        switch ($fileType) {
                            case Configs::PASSPORT_EURO_FILE_TYPE:
                            case Configs::PASSPORT_NON_EURO_FILE_TYPE:
                                $dataResponse['passport_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::HOMEBILL_FILE_TYPE:
                                $dataResponse['homebill_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::RIB_FILE_TYPE:
                                $dataResponse['rib_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::KBIS_FILE_TYPE:
                                $dataResponse['kbis_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::COMPANY_STATUS_FILE_TYPE:
                                $dataResponse['social_status_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::DECENNAL_INSURANCE_FILE_TYPE:
                                $dataResponse['assurance_decennale_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            case Configs::CIVIL_INSURANCE_FILE_TYPE:
                                $dataResponse['assurance_civile_file'] = array(
                                    'id' => $item['idTypeFichier'],
                                    'name' => $item['nomFichier']
                                );
                                break;
                            default:
                                break;
                        }
                    }
                }
            } else {
                $dataResponse['passport_file'] = '';
                $dataResponse['homebill_file'] = '';
                $dataResponse['rib_file'] = '';
                $dataResponse['kbis_file'] = '';
                $dataResponse['social_status_file'] = '';
                $dataResponse['assurance_decennale_file'] = '';
                $dataResponse['assurance_civile_file'] = '';
            }
        }

        return $dataResponse;

    }

    /**
     * Get ContributorDetail
     *
     * @param SM\Bundle\RESTBundle\Entity\Compte $compte
     */
    public function contributorDetail($compte)
    {
        $userQuery = $this->createQueryBuilder('cp')
            ->select('cp.idCompte as user_id, cp.nom as name, cp.prenom as first_name, cp.email,'
                . ' cp.telephoneFixe as phone, cp.raisonSocial as social_reason,'
                . ' cp.nSiret as siret, ci.idCivilite as gender, fi.cheminFichier as image_path, fi.nomFichier as image_name')
            ->join('cp.idCivilite', 'ci')
            ->leftJoin('cp.idFichier', 'fi')
            ->where('cp.idFichier = fi.idFichier')
            ->where('cp.idCompte = :idCompte')
            ->setParameter('idCompte', $compte)
            ->getQuery();
        $result = $userQuery->getOneOrNullResult();

        return $result;

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
