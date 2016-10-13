<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SM\Bundle\UserBundle\Entity\Category;
use SM\Bundle\AdminBundle\Form\CategoryType;

class CategoryController extends SMController
{
    public function indexAction($page = 1, Request $request)
    {
        $currentPage = $request->query->getInt('page', $page);
        $request->getSession()->set('currentCategorie', $currentPage);
        
        $categoryRepo = $this->globalManager()->categoryRepo;
        $listCategory = $categoryRepo->findBy(array('isActive'=> 1));
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($listCategory, $currentPage, 10);
        
        return $this->render('AdminBundle:Category:index.html.twig', array(
            'entities' => $pagination,
            'numberRecord' => 10,
            'page' => $currentPage,));
    }
    
    public function createAction(Request $request)
    {
        $dateNow = new \DateTime();
        $objCategory = new Category();
        $objCategory->setDateCreation($dateNow);
        $objCategory->setDateModification($dateNow);
        $objCategory->setIsActive(1);

        $form = $this->createForm(CategoryType::class, $objCategory);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($objCategory);
            $em->flush($objCategory);
            return $this->redirect($this->generateUrl("admin_category"));
        }
        return $this->render('AdminBundle:Category:create.html.twig', array(
            'form' => $form->createView(),
            ));
    }
    
    public function editAction($id = -1, Request $request)
    {
        $categoryRepo = $this->globalManager()->categoryRepo;
        $objCategory = $categoryRepo->find($id);
        if (!$objCategory instanceof Category) {
            return $this->redirect($this->generateUrl("admin_category"));
        }
        
        $form = $this->createForm(CategoryType::class, $objCategory);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $objCategory->setDateModification(new \DateTime);
            $em = $this->getDoctrine()->getManager();
            $em->persist($objCategory);
            $em->flush($objCategory);
            return $this->redirect($this->generateUrl("admin_category"));
        }
        return $this->render('AdminBundle:Category:edit.html.twig', array(
            'form' => $form->createView(),
            'id' => $id
            ));
    }
    
    public function deleteAction($id = -1)
    {
        $categoryRepo = $this->globalManager()->categoryRepo;
        $objCategory = $categoryRepo->find($id);
        if (!$objCategory instanceof Category) {
            return $this->redirect($this->generateUrl("admin_cateogory"));
        }
        $em = $this->getDoctrine()->getManager();
        $objCategory->setDateModification(new \DateTime);
        $objCategory->setIsActive(0);
        $em->persist($objCategory);
        $em->flush($objCategory);
        return $this->redirect($this->generateUrl("admin_category"));
    }
}
