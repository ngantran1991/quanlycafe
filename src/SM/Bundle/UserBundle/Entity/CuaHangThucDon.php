<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CuaHangThucDon
 *
 * @ORM\Table(name="CuaHang_ThucDon", indexes={@ORM\Index(name="Id_Cua_Hang", columns={"Id_Cua_Hang"}), @ORM\Index(name="Id_Thuc_Don", columns={"Id_Thuc_Don"})})
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\CuaHangThucDonRepository")
 */
class CuaHangThucDon
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Cua_Hang_Thuc_Don", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCuaHangThucDon;
    
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
     * @var \ThucDon
     *
     * @ORM\ManyToOne(targetEntity="ThucDon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Thuc_Don", referencedColumnName="Id_Thuc_Don")
     * })
     */
    private $idThucDon;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Gia", type="integer", nullable=false)
     */
    private $gia;
    
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
     * Get idCuaHangThucDon
     *
     * @return integer
     */
    public function getIdCuaHangThucDon()
    {
        return $this->idCuaHangThucDon;

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
     * Set idThucDon
     *
     * @param \SM\Bundle\UserBundle\Entity\ThucDon $idThucDon
     * @return ThucDon
     */
    public function setIdThucDon(\SM\Bundle\UserBundle\Entity\ThucDon $idThucDon = null)
    {
        $this->idThucDon = $idThucDon;

        return $this;

    }

    /**
     * Get idThucDon
     *
     * @return \SM\Bundle\UserBundle\Entity\ThucDon
     */
    public function getIdThucDon()
    {
        return $this->idThucDon;

    }
    
    /**
     * Set gia
     *
     * @param string $gia
     * @return Exchange
     */
    public function setGia($gia)
    {
        $this->gia = $gia;

        return $this;

    }

    /**
     * Get gia
     *
     * @return string
     */
    public function getGia()
    {
        return $this->gia;

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
        return $this->getIdCuaHangThucDon();
    }
    
}
