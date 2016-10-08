<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exchange
 *
 * @ORM\Table(name="ThucDon")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\ThucDonRepository")
 */
class ThucDon
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Thuc_Don", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idThucDon;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Gia", type="integer", nullable=false)
     */
    private $gia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", nullable=false)
     */
    private $detail;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", nullable=false)
     */
    private $image;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="string", length=300, nullable=true)
     */
    private $note;

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
     * Get idThucDon
     *
     * @return integer
     */
    public function getIdThucDon()
    {
        return $this->idThucDon;

    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return ThucDon
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;

    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;

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
     * Set detail
     *
     * @param string $detail
     * @return CuaHang
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;

    }

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;

    }
    
    /**
     * Set image
     *
     * @param string $image
     * @return CuaHang
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;

    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;

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
        return $this->getIdThucDon();
    }
    
}
