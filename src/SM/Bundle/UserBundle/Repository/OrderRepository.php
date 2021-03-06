<?php

namespace SM\Bundle\UserBundle\Repository;

use SM\Bundle\UserBundle\Repository\BaseRepository;
use SM\Bundle\UserBundle\Constants\Configs;
use Doctrine\ORM\Query;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderRepository extends BaseRepository
{
    public function getListOrderForCuaHang($objCuaHang = null, $setThang = null, $listMenu = array())
    {
        $dateTimeSet = date_create_from_format('d-m-Y', $setThang);

        $ordQuery = $this->createQueryBuilder('ord')
            ->select('ord')
            ->where('ord.isActive = 1')
            ->andWhere('MONTH(ord.dateCreation) = :dateCreation')
            ->andWhere('ord.idCuaHang = :idCuaHang')
            ->setParameter('dateCreation', $dateTimeSet->format('m'))
            ->setParameter("idCuaHang", $objCuaHang)
            ->getQuery();
        $result = $this->cusOrderForCuaHang($ordQuery->getArrayResult(), $listMenu);

        return $result;
    }
    private function cusOrderForCuaHang($arrOrder, $listMenu)
    {
        $arrReturn = array();
        foreach ($arrOrder as $key=>$order) {
            $arrOneOrder = array();
            $arrOneOrder['stt'] = $key+1;
            $arrProduct = array();
            $arrListProductName = explode("- ", $order['listProductid']);
            $arrListProductNo = explode("- ", $order['listProductno']);
            $arrListProductPrice = explode("- ", $order['listProductPrices']);
            foreach ($arrListProductName as $key=>$idThucDon) {
                $arrOneThucDon = array();
                $arrOneThucDon['name'] = $listMenu[$idThucDon];
                $arrOneThucDon['soLuong'] = $arrListProductNo[$key];
                $arrOneThucDon['price'] = $arrListProductPrice[$key];
                array_push($arrProduct, $arrOneThucDon);
            }
            $arrOneOrder['product'] = $arrProduct;
            $arrOneOrder['Total'] = $order['totalPrices'];
            $arrOneOrder['date'] = $order['dateCreation']->format('d-m-Y H:i:s');
            array_push($arrReturn, $arrOneOrder);
        }
        return $arrReturn;
    }
}
