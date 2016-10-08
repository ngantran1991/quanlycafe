<?php

namespace SM\Bundle\UserBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
		$data = array('listCategory' => $listCategory,
			'listThucDonByCategory'=> $listThucDonByCategory);
		return $this->render('UserBundle:Order:index.html.twig',$data);
	}
	public function saveformorderAction(){
		if(isset($_POST)){
			$data = $_POST;
			var_dump("<pre>",$data);
			$response = new Response('Contact us');
			return $response;

		}
	}
}
