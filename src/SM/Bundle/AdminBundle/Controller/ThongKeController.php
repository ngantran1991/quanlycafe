<?php

namespace SM\Bundle\AdminBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SM\Bundle\UserBundle\Entity\CuaHangThucDon;
use SM\Bundle\UserBundle\Entity\CuaHang;
use SM\Bundle\AdminBundle\Form\CuaHangType;
use Symfony\Component\HttpFoundation\Request;

class ThongKeController extends SMController
{
    public function indexAction($page = 1, Request $request)
    {
        return $this->render('AdminBundle:ThongKe:index.html.twig');
    }
            
}
