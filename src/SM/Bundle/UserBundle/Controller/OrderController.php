<?php

namespace SM\Bundle\UserBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use SM\Bundle\UserBundle\Entity\Order;
use SM\Bundle\UserBundle\Entity\CuaHang;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends SMController
{
	public function indexAction()
	{
		$thucDonRepo = $this->globalManager()->thucDonRepo;
		$listThucDon = $thucDonRepo->findAll();

		$cateGoryRepo = $this->globalManager()->categoryRepo;
		$listCategory = $cateGoryRepo->findAll();

		$listThucDonByCategory = array();
		foreach ($listCategory as $key => $ct) {
			array_push($listThucDonByCategory, $thucDonRepo->findByIdCategory($ct->getidCategory()));
		}
		$id_cua_hang = 1;
		$data = array('listCategory' => $listCategory,
			'listThucDonByCategory'=> $listThucDonByCategory,
			'id_cua_hang' => $id_cua_hang);
		return $this->render('UserBundle:Order:index.html.twig',$data);
	}
	public function saveformorderAction(){
		if(isset($_POST)){
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$post = $_POST;
			$data['List_Product_no'] = implode(',', $post['input_no_order']);
			$data['List_Product_id'] = implode(',', $post['id_no_order']);
			$data['Id_Cua_Hang'] = $post['id_cua_hang'];
			$data['Is_Active'] = 0;
			$data['Date_Creation'] = new \DateTime;
			$data['Date_Modification'] = new \DateTime;
			//var_dump("<pre>",$data);
			$cuaHangRepo = $this->globalManager()->cuaHangRepo;
			$cuaHang_id = $cuaHangRepo->find(intval($data['Id_Cua_Hang']));
			$order = new Order();
			$order->setIdCuaHang($cuaHang_id);
			$order->setList_Product_id($data['List_Product_id']);
			$order->setList_Product_no($data['List_Product_no']);
			$order->setIsActive($data['Is_Active']);
			$order->setDateCreation($data['Date_Creation']);
			$order->setDateModification($data['Date_Modification']);

			$em = $this->getDoctrine()->getManager();
			$em->persist($order);
			$em->flush($order);
			return new Response('Saved new order with id '.$order->getId());

		}
	}
}
