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
    public function thongKeCuaHangAction(Request $request)
    {
        $cuaHangRepo = $this->globalManager()->cuaHangRepo;
        $listCuaHang = $cuaHangRepo->findBy(array('isActive' => 1));
        $idCuahang = $request->get('idCuaHang') != null ? $request->get('idCuaHang') : 1;
        $nowDate = new \DateTime();

        $setThang = $request->get('setThang') != null ? $request->get('setThang') : $nowDate->format('d-m-Y');
        
        
        return $this->render('AdminBundle:ThongKe:thongKeCuaHang.html.twig', array(
            'listCuaHang' => $listCuaHang,
            'setCuaHang' => $idCuahang,
            'setThang' => $setThang
        ));
    }
            
}
