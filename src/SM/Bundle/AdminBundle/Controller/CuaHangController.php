<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CuaHangController extends SMController
{
    public function indexAction()
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $listCuaHang = $cuaHangRepo->findAll();
        return $this->render('AdminBundle:CuaHang:index.html.twig', array('listCuaHang' => $listCuaHang));
    }
}
