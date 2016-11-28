<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ThongKe
 *
 * @ORM\Table(name="ThongKe", indexes={@ORM\Index(name="Id_Cua_Hang", columns={"Id_Cua_Hang"})})
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\ThongKeRepository")
 */
class ThongKe
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Thong_Ke", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idThongKe;
    
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
     * @var integer
     *
     * @ORM\Column(name="Gia_Tren_Bill", type="integer", nullable=false)
     */
    private $giaTrenBill;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Gia_Thuc_Te", type="integer", nullable=false)
     */
    private $giaThucTe;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Is_Active", type="integer", nullable=false)
     */
    private $isActive;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Start", type="datetime", nullable=false)
     */
    private $dateStart;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_End", type="datetime", nullable=false)
     */
    private $dateEnd;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=1000, nullable=true)
     */
    private $note;
    
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
     * Get idThongKe
     *
     * @return integer
     */
    public function getIdThongKe()
    {
        return $this->idThongKe;

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
     * Set giaTrenBill
     *
     * @param string $giaTrenBill
     * @return Exchange
     */
    public function setGiaTrenBill($giaTrenBill)
    {
        $this->giaTrenBill = $giaTrenBill;

        return $this;

    }

    /**
     * Get giaTrenBill
     *
     * @return string
     */
    public function getGiaTrenBill()
    {
        return $this->giaTrenBill;

    }
    
    /**
     * Set giaThucTe
     *
     * @param string $giaThucTe
     * @return Exchange
     */
    public function setGiaThucTe($giaThucTe)
    {
        $this->giaThucTe = $giaThucTe;

        return $this;

    }

    /**
     * Get giaThucTe
     *
     * @return string
     */
    public function getGiaThucTe()
    {
        return $this->giaThucTe;

    }
    
    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Exchange
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;

    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;

    }
    
    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Exchange
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;

    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;

    }
    
    /**
     * Set note
     *
     * @param string $note
     * @return Exchange
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;

    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;

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
        return $this->getIdThongKe();
    }
    
}
