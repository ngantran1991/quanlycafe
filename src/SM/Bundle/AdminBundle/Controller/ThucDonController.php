<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ThucDonController extends SMController
{
    public function indexAction($page = 1, Request $request)
    {
        $currentPage = $request->query->getInt('page', $page);
        $request->getSession()->set('currentPageCategorie', $currentPage);
        
        $thucDonRepo = $this->globalManager()->thucDonRepo;
        $listThucDon = $thucDonRepo->findAll();
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($listThucDon, $currentPage, 10);
        
        return $this->render('AdminBundle:ThucDon:index.html.twig', array(
            'entities' => $pagination,
            'numberRecord' => 10,
            'page' => $currentPage,));
    }
}
