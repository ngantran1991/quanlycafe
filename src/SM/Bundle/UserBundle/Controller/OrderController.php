<?php

namespace SM\Bundle\UserBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends SMController
{
    public function indexAction()
    {
        $orderdata = array('name' => "trung", "age" => 24);
        return $this->render('UserBundle:Order:index.html.twig', array('orderdata' => $orderdata));
    }
}
