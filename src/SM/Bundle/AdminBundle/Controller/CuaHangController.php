<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SM\Bundle\UserBundle\Entity\CuaHangThucDon;

class CuaHangController extends SMController
{
    public function indexAction()
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $listCuaHang = $cuaHangRepo->findAll();
        return $this->render('AdminBundle:CuaHang:index.html.twig', array('listCuaHang' => $listCuaHang));
    }
    
    public function detailAction($id = 1)
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $cuaHangThucDonRepo = $this->globalManager()->cuaHangThucDonRepo;
        $cuaHang = $cuaHangRepo->find($id);
        if (isset($_POST['thucdon']) && is_array($_POST['thucdon'])) {
            $addListTD = $_POST['thucdon'];
            foreach ($addListTD as $idThucDon) {
                $objThucDon = $thucDonRepo->find($idThucDon);
                $checkExist = $cuaHangThucDonRepo->findBy(array('idThucDon' => $objThucDon,
                                                                'idCuaHang' => $cuaHang));
                if (!count($checkExist)) {
                    $em = $this->getDoctrine()->getManager();
                    $objCuaHangThucDon = new CuaHangThucDon();
                    $objCuaHangThucDon->setIdCuaHang($cuaHang);
                    $objCuaHangThucDon->setIdThucDon($objThucDon);
                    $objCuaHangThucDon->setIsActive(1);
                    $objCuaHangThucDon->setDateCreation(new \DateTime);
                    $objCuaHangThucDon->setDateModification(new \DateTime);
                    $em->persist($objCuaHangThucDon);
                    $em->flush($objCuaHangThucDon);
                }
            }
        }
        
        
        $listThucDon = $thucDonRepo->findAll();
        $listThucDonCuaHang = $cuaHangThucDonRepo->findBy(array('idCuaHang' => $id));
        
        
        return $this->render('AdminBundle:CuaHang:detail.html.twig', array(
            'listThucDonCuaHang' => $listThucDonCuaHang,
            'listThucDon' => $listThucDon,
            'cuaHang' => $cuaHang,
            'id' => $id));
    }
}
