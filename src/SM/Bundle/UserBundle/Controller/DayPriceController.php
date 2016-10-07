<?php
namespace SM\Bundle\UserBundle\Controller;

use SM\Bundle\UserBundle\Plugins\Controller\SMController;
use Symfony\Component\HttpFoundation\Request;
use SM\Bundle\UserBundle\Entity\Exchange;
use SM\Bundle\UserBundle\Form\ExchangeType;

class DayPriceController extends SMController
{
    public function indexAction(Request $request)
    {
        $exchangeRepo = $this->globalManager()->exchangeRepo;
        $typePriceRepo = $this->globalManager()->typePriceRepo;
        $typeExchane = 1;
        $dateNow = new \DateTime();
        $priceList = $exchangeRepo->getPriceForADay($dateNow, $typeExchane);
        
        $objExchange = new Exchange();
        $objExchange->setDateActive($dateNow->format('d-m-Y'));
        $objExchange->setValueIn($priceList[0]['valueIn']);
        $objExchange->setValueOut($priceList[0]['valueOut']);

        $form = $this->createForm(ExchangeType::class, $objExchange);
        
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                
                $objExchange->setDateActive(new \Datetime($objExchange->getDateActive()));
                $checkData = $exchangeRepo->findBy(array('idTypeExchange' => $objExchange->getIdTypeExchange(),
                    'dateActive' => $objExchange->getDateActive()
                    ));
                if(count($checkData) == 0) {
                    $manager = $this->getDoctrine()->getManager();
                    $manager->getConnection()->beginTransaction();
                    $objExchange->setIsActive(1);
                    $objExchange->setDateCreation($dateNow);
                    $objExchange->setDateModification($dateNow);
                    $objTypePrice = $typePriceRepo->find(1);
                    $objExchange->setIdTypePrice($objTypePrice);
                    $manager->persist($objExchange);
                    $manager->flush($objExchange);
                    $manager->getConnection()->commit();
                }
                $url = $this->generateUrl('price_a_day');
                return $this->redirect($url);
            }
        }
        
        return $this->render('UserBundle:DayPrice:index.html.twig', array(
            'dateNow' => $dateNow->format('d-m-Y'),
            'typeExchane' => $typeExchane,
            'form' => $form->createView(),
            'isClick' => $priceList[0]['isClick']
            ));
    }
    
    public function createAction(Request $request)
    {
        $objExchange = new Exchange();

        $form = $this->createForm(ExchangeType::class, $objExchange);
        
    }
    
    public function ajaxIndexAction(Request $request)
    {
        $exchangeRepo = $this->globalManager()->exchangeRepo;
        $typeExchane = $request->get('typeExchange') == null ? 1 : $request->get('typeExchange');
        $dateNow = $request->get('dateCurr') == null ? new \DateTime() : date_create_from_format('d-m-Y', $request->get('dateCurr'));

        $priceList = $exchangeRepo->getPriceForADay($dateNow, $typeExchane);
        
         return $this->json($priceList[0]);
    }
    
    public function ajaxAllPriceDetailAction(Request $request)
    {
        $exchangeRepo = $this->globalManager()->exchangeRepo;
        $typePriceRepo = $this->globalManager()->typePriceRepo;
        $typeExchangeRepo = $this->globalManager()->typeExchangeRepo;
        $typeExchane = $request->get('typeExchange') == null ? 1 : $request->get('typeExchange');
        $dateNow = $request->get('dateCurr') == null ? new \DateTime() : date_create_from_format('d-m-Y', $request->get('dateCurr'));
        $priceList = $exchangeRepo->getPriceForADay($dateNow, $typeExchane);
        
        $exchangeManager = $this->get('user.exchange.manager');

        // price gold
        if ($priceList[0]['valueIn'] == null) {
            if ($typeExchane == 1) {
                return $this->json($exchangeManager->getDataExchangeGoldADay($dateNow, $typeExchane));
            }
        }

        return $this->json($priceList[0]);
    }
}


