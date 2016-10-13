<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SM\Bundle\UserBundle\Entity\ThucDon;
use SM\Bundle\AdminBundle\Form\ThucDonType;

class ThucDonController extends SMController
{
    public function indexAction($page = 1, Request $request)
    {
        $currentPage = $request->query->getInt('page', $page);
        $request->getSession()->set('currentPageCategorie', $currentPage);
        
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $listThucDon = $thucDonRepo->findBy(array('isActive'=> 1));
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($listThucDon, $currentPage, 10);
        
        return $this->render('AdminBundle:ThucDon:index.html.twig', array(
            'entities' => $pagination,
            'numberRecord' => 10,
            'page' => $currentPage,));
    }
    
    public function createAction(Request $request)
    {
        $dateNow = new \DateTime();
        $objThucDon = new ThucDon();
        $objThucDon->setDateCreation($dateNow);
        $objThucDon->setDateModification($dateNow);
        $objThucDon->setIsActive(1);

        $form = $this->createForm(ThucDonType::class, $objThucDon);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $objThucDon->getImage();
            
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            //$this->get('helper.imageresizer')->resizeImage($file, $this->getParameter('image_cuahang_directory') , 450, 800);
            $file->move(
                $this->getParameter('image_thucdon_directory'),
                $fileName
            );
            
            $objThucDon->setImage("/uploads/thucdon/".$fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($objThucDon);
            $em->flush($objThucDon);
            return $this->redirect($this->generateUrl("admin_thucdon"));
        }
        return $this->render('AdminBundle:ThucDon:create.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    public function editAction($id = -1, Request $request)
    {
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $objThucDon = $thucDonRepo->find($id);
        if (!$objThucDon instanceof ThucDon) {
            return $this->redirect($this->generateUrl("admin_thucdon"));
        }
        $imageOld = $objThucDon->getImage();
        $objThucDon->setImage(null);
        $form = $this->createForm(ThucDonType::class, $objThucDon);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $objThucDon->getImage();
            if ($file != null) {
                $fileNameOld = str_replace('\\', "/", substr(__FILE__,0,-59)."/web/".$imageOld);
                if (file_exists($fileNameOld)) {
                    unlink($fileNameOld);
                }
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                
                //$this->get('helper.imageresizer')->resizeImage($file, $this->getParameter('image_cuahang_directory') , 450, 800);
                $file->move(
                    $this->getParameter('image_thucdon_directory'),
                    $fileName
                );
                $objThucDon->setImage("/uploads/thucdon/".$fileName);
            } else {
                $objThucDon->setImage($imageOld);
            }
            $objThucDon->setDateModification(new \DateTime);
            $em = $this->getDoctrine()->getManager();
            $em->persist($objThucDon);
            $em->flush($objThucDon);
            return $this->redirect($this->generateUrl("admin_thucdon"));
        }
        return $this->render('AdminBundle:ThucDon:edit.html.twig', array(
            'form' => $form->createView(),
            'imageOld' => $imageOld,
            'id' => $id
            ));
    }
    
    public function deleteAction($id = -1)
    {
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $objThucDon = $thucDonRepo->find($id);
        if (!$objThucDon instanceof ThucDon) {
            return $this->redirect($this->generateUrl("admin_thucdon"));
        }
        $em = $this->getDoctrine()->getManager();
        $objThucDon->setDateModification(new \DateTime);
        $objThucDon->setIsActive(0);
        $em->persist($objThucDon);
        $em->flush($objThucDon);
        return $this->redirect($this->generateUrl("admin_thucdon"));
    }
}
