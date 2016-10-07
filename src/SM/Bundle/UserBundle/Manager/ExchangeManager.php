<?php

namespace SM\Bundle\UserBundle\Manager;

use SM\Bundle\UserBundle\Constants\Configs;
use Doctrine\ORM\EntityManager;
use SM\Bundle\UserBundle\Entity\Exchange;

/**
 * Description of GlobalManager
 *
 */
class ExchangeManager
{

    public $em;
    protected $container;
    protected $translator;
    protected $router;
    protected $globalManager;
    
    /**
     * Construct
     *
     * @param type $em
     * @param type $container
     * @param type $translator
     * @param type $router
     */
    public function __construct(EntityManager $em, $container, $translator, $router)
    {

        $this->em = $em;
        $this->container = $container;
        $this->translator = $translator;
        $this->router = $router;
        $this->globalManager = new GlobalManager($em, $container, $translator, $router);

    }
    
    public function getDataExchangeGoldADay($dateNow, $typeExchane)
    {
        $typeExchangeRepo = $this->globalManager->typeExchangeRepo;
        $typePriceRepo = $this->globalManager->typePriceRepo;
        $exchangeRepo = $this->globalManager->exchangeRepo;
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "www.24h.com.vn/ajax/box_ban_tin_gia_vang/index/1/".$dateNow->format('Y-m-d')); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);
        $strPrice = substr($output, strpos($output, 'SJC99.99N'), 300);
        $arr = explode('SJC99.99N', $strPrice);

        $is24 = true;
        if (count($arr) == 1) {
            $arrPrice = $arr;
            $is24 = false;
        } else {
            $arrPrice = explode(chr(ord(explode(" ", $arr[1])[0][0])), $arr[1]);
            $is24 = strpos($arrPrice[4], "Không có") ? false : true;
        }
        
        if (!$is24) {
            $sXML = $this->download_page('http://www2.sjc.com.vn/xml/tygiavang.xml');
            $oXML = new \SimpleXMLElement($sXML);
            
            $arrResponse = $this->xml2array($oXML);
            
            $dateActive = date_create_from_format('d/m/Y', substr($arrResponse['ratelist']['@attributes']['updated'], 12, 10));
            
            $checkObjExchange = $exchangeRepo->findBy(array('dateActive' => $dateActive,
                                                        'isActive' => 1,
                                                        'idTypeExchange' => 1));
            
            if ($checkObjExchange == null) {
                $arrItems = $this->xml2array($arrResponse['ratelist']['city'][0]);
                $arrPrice = $this->xml2array($arrItems['item'][0]);

                $valueIn = (float)$arrPrice['@attributes']['buy'] * 1000;
                $valueOut = (float)$arrPrice['@attributes']['sell'] * 1000;
                $objExchange = new Exchange();
                $this->em->getConnection()->beginTransaction();
                $objExchange->setValueIn($valueIn);
                $objExchange->setValueOut($valueOut);
                $objExchange->setIsActive(1);
                $objExchange->setDateCreation($dateNow);
                $objExchange->setDateActive($dateActive);
                $objExchange->setDateModification($dateNow);
                $objTypeExchange = $typeExchangeRepo->find($typeExchane);
                $objExchange->setIdTypeExchange($objTypeExchange);
                $objTypePrice = $typePriceRepo->find(1);
                $objExchange->setIdTypePrice($objTypePrice);
                $this->em->persist($objExchange);
                $this->em->flush($objExchange);
                $this->em->getConnection()->commit();
            }
            $priceList = $exchangeRepo->getPriceForADay($dateNow, $typeExchane);

            return $priceList[0];

        } else {
            $valueIn = str_replace(".", "", substr($arrPrice[4], strpos($arrPrice[4], '>') + 1, strlen($arrPrice[4])));
            $num = 8;
            if ($arrPrice[8] == 'td class="cellYellow">') {
                $num = 9;
            }
            $valueOut = str_replace(".", "", substr($arrPrice[$num], strpos($arrPrice[$num], '>') + 1, strlen($arrPrice[$num])));

            $objExchange = new Exchange();
            $this->em->getConnection()->beginTransaction();
            $objExchange->setValueIn($valueIn);
            $objExchange->setValueOut($valueOut);
            $objExchange->setIsActive(1);
            $objExchange->setDateCreation($dateNow);
            $objExchange->setDateActive($dateNow);
            $objExchange->setDateModification($dateNow);
            $objTypeExchange = $typeExchangeRepo->find($typeExchane);
            $objExchange->setIdTypeExchange($objTypeExchange);
            $objTypePrice = $typePriceRepo->find(1);
            $objExchange->setIdTypePrice($objTypePrice);
            $this->em->persist($objExchange);
            $this->em->flush($objExchange);
            $this->em->getConnection()->commit();
            
            return array('valueIn' => $objExchange->getValueIn(),
                'valueOut' => $objExchange->getValueOut(),
                'isClick' => $objExchange->getValueIn() != null && $objExchange->getValueOut() != null ? false : true,
                );
        }
    }
    
    private function download_page($path){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$path);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	$retValue = curl_exec($ch);			 
	curl_close($ch);
	return $retValue;
    }
    
    private function xml2array ( $xmlObject, $out = array () )
    {
        foreach ( (array) $xmlObject as $index => $node )
            $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

        return $out;
    }

}
