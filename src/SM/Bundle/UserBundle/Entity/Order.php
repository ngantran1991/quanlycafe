<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Order
 *
 * @ORM\Table(name="`Order`")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\OrderRepository")
 */
class Order
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Order", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrder;
        
    /**
     * @var \CuaHang
     *
     * @ORM\ManyToOne(targetEntity="CuaHang")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Cua_Hang", referencedColumnName="Id_Cua_Hang")
     * })
     */
    private $idCuaHang;

    /**
     * @var string
     *
     * @ORM\Column(name="List_Product_id", type="string", nullable=false)
     */

    private $listProductid;

    /**
     * @var string
     *
     * @ORM\Column(name="List_Product_no", type="string", nullable=false)
     */
    private $listProductno;

    /**
     * @var integer
     *
     * @ORM\Column(name="Is_Active", type="integer", nullable=false)
     */
    private $isActive;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Creation", type="datetime", nullable=false)
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Modification", type="date", nullable=true)
     */
    private $dateModification;

//    public function __construct()
//    {
//        $this->address = new ArrayCollection();
//
//    }

    /**
     * Get idOrder
     *
     * @return integer
     */
    public function getIdOrder()
    {
        return $this->idOrder;

    }
    
    /**
     * Set idCuaHang
     *
     * @param \SM\Bundle\UserBundle\Entity\CuaHang $idCuaHang
     * @return CuaHang
     */
    public function setIdCuaHang(\SM\Bundle\UserBundle\Entity\CuaHang $idCuaHang = null)
    {
        $this->idCuaHang = $idCuaHang;

        return $this;

    }

    /**
     * Get idCuahang
     *
     * @return \SM\Bundle\UserBundle\Entity\CuaHang
     */
    public function getIdCuaHang()
    {
        return $this->idCuahang;

    }
    
    /**
     * Set listProductid
     *
     * @param string $name
     * @return string
     */
    public function setList_Product_id($listProductid)
    {
        $this->listProductid = $listProductid;

        return $this;

    }

    /**
     * Get listProductid
     *
     * @return string
     */
    public function getList_Product_id()
    {
        return $this->listProductid;

    }

    /**
     * Set listProductno
     *
     * @param string $name
     * @return string
     */
    public function setList_Product_no($listProductno)
    {
        $this->listProductno = $listProductno;

        return $this;

    }

    /**
     * Get listProductno
     *
     * @return string
     */
    public function getList_Product_no()
    {
        return $this->listProductno;

    }
    
    /**
     * Set isActive
     *
     * @param string $isActive
     * @return Exchange
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;

    }

    /**
     * Get isActive
     *
     * @return string
     */
    public function getIsActive()
    {
        return $this->isActive;

    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Exchange
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;

    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;

    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateModification
     * @return Exchange
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;

    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;

    }

    public function getId()
    {
        return $this->getIdOrder();
    }
    
}
