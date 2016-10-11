<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SM\Bundle\UserBundle\Entity\CuaHangThucDon;
use SM\Bundle\UserBundle\Entity\CuaHang;
use SM\Bundle\AdminBundle\Form\CuaHangType;
use Symfony\Component\HttpFoundation\Request;

class CuaHangController extends SMController
{
    public function indexAction()
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $listCuaHang = $cuaHangRepo->findBy(array('isActive' => 1));
        return $this->render('AdminBundle:CuaHang:index.html.twig', array('listCuaHang' => $listCuaHang));
    }
    
    public function createAction(Request $request)
    {
        $dateNow = new \DateTime();
        $objCuaHang = new CuaHang();
        $objCuaHang->setDateCreation($dateNow);
        $objCuaHang->setDateModification($dateNow);
        $objCuaHang->setIsActive(1);

        $form = $this->createForm(CuaHangType::class, $objCuaHang);
        
        if ($request->isMethod('POST')) {
            
        }
        return $this->render('AdminBundle:CuaHang:create.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    public function editAction($id = -1, Request $request)
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $objCuaHang = $cuaHangRepo->find($id);
        if (!$objCuaHang instanceof CuaHang) {
            return $this->redirect($this->generateUrl("admin_cuahang"));
        }
        $form = $this->createForm(CuaHangType::class, $objCuaHang);
        
        if ($request->isMethod('POST')) {
            
        }
        return $this->render('AdminBundle:CuaHang:edit.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    public function deleteAction($id = -1)
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $objCuaHang = $cuaHangRepo->find($id);
        if (!$objCuaHang instanceof CuaHang) {
            return $this->redirect($this->generateUrl("admin_cuahang"));
        }
        $em = $this->getDoctrine()->getManager();
        $objCuaHang->setIsActive(0);
        $em->persist($objCuaHang);
        $em->flush($objCuaHang);
        return $this->redirect($this->generateUrl("admin_cuahang"));
    }
    
    public function detailAction($id = 1)
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $cuaHangThucDonRepo = $this->globalManager()->cuaHangThucDonRepo;
        $cuaHang = $cuaHangRepo->find($id);
        if (isset($_POST['thucdon']) && is_array($_POST['thucdon'])) {
            $addListTD = $_POST['thucdon'];
            $addListGia = $_POST['gia'];
            foreach ($addListTD as $key=>$idThucDon) {
                $objThucDon = $thucDonRepo->find($idThucDon);
                $checkExist = $cuaHangThucDonRepo->findBy(array('idThucDon' => $objThucDon,
                                                                'idCuaHang' => $cuaHang));
                if (!count($checkExist)) {
                    $em = $this->getDoctrine()->getManager();
                    $objCuaHangThucDon = new CuaHangThucDon();
                    $objCuaHangThucDon->setIdCuaHang($cuaHang);
                    $objCuaHangThucDon->setIdThucDon($objThucDon);
                    if ($addListGia[$key] == null) {
                        $objCuaHangThucDon->setGia($objThucDon->getGia());
                    } else {
                        $objCuaHangThucDon->setGia($addListGia[$key]);
                    }
                    $objCuaHangThucDon->setIsActive(1);
                    $objCuaHangThucDon->setDateCreation(new \DateTime);
                    $objCuaHangThucDon->setDateModification(new \DateTime);
                    $em->persist($objCuaHangThucDon);
                    $em->flush($objCuaHangThucDon);
                }
                return $this->redirect($this->generateUrl("admin_cuahang_detail", array('id' => $id)));
            }
        }
        
        
        $listThucDon = $thucDonRepo->findAll();
        $listThucDonCuaHang = $cuaHangThucDonRepo->findBy(array('idCuaHang' => $id, 'isActive' => 1));
        
        
        return $this->render('AdminBundle:CuaHang:detail.html.twig', array(
            'listThucDonCuaHang' => $listThucDonCuaHang,
            'listThucDon' => $listThucDon,
            'cuaHang' => $cuaHang,
            'id' => $id));
    }
    
    public function detailDeleteAction($idCuaHangThucDon = -1, $idCuaHang = -1)
    {
        $cuaHangThucDonRepo = $this->globalManager()->cuaHangThucDonRepo;
        $objCuaHangThucDon = $cuaHangThucDonRepo->find($idCuaHangThucDon);
        if (!$objCuaHangThucDon instanceof CuaHangThucDon) {
            return $this->redirect($this->generateUrl("admin_cuahang_detail", array('id' => $idCuaHang)));
        }
        $em = $this->getDoctrine()->getManager();
        $objCuaHangThucDon->setIsActive(0);
        $em->persist($objCuaHangThucDon);
        $em->flush($objCuaHangThucDon);
        return $this->redirect($this->generateUrl("admin_cuahang_detail", array('id' => $idCuaHang)));
    }
            
}
