<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exchange
 *
 * @ORM\Table(name="CuaHang")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\CuaHangRepository")
 */
class CuaHang
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Cua_Hang", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCuaHang;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", nullable=false)
     */
    private $address;
    
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
     * Get idCuaHang
     *
     * @return integer
     */
    public function getIdCuaHang()
    {
        return $this->idCuaHang;

    }
    
    /**
     * Set name
     *
     * @param string $name
     * @return CuaHang
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
     * Set address
     *
     * @param string $address
     * @return CuaHang
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;

    }

    /**
     * Get addess
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;

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
        return $this->getIdCuaHang();
    }
    
}
