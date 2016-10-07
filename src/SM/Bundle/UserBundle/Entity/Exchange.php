<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exchange
 *
 * @ORM\Table(name="Exchange", indexes={@ORM\Index(name="Id_Type_Exchange", columns={"Id_Type_Exchange"}), @ORM\Index(name="Id_Type_Price", columns={"Id_Type_Price"})})
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\ExchangeRepository")
 */
class Exchange
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Exchange", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idExchange;
    
    /**
     * @var \TypeExchange
     *
     * @ORM\ManyToOne(targetEntity="TypeExchange")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Type_Exchange", referencedColumnName="Id_Type_Exchange")
     * })
     */
    private $idTypeExchange;
    
    /**
     * @var \TypePrice
     *
     * @ORM\ManyToOne(targetEntity="TypePrice")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Type_Price", referencedColumnName="Id_Type_Price")
     * })
     */
    private $idTypePrice;
    
    /**
     * @var float
     *
     * @ORM\Column(name="Value_In", type="float", nullable=false)
     */
    private $valueIn;
    
    /**
     * @var float
     *
     * @ORM\Column(name="Value_Out", type="float", nullable=false)
     */
    private $valueOut;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Active", type="date", nullable=true)
     */
    private $dateActive;
    
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
     * Get idExchange
     *
     * @return integer
     */
    public function getIdExchange()
    {
        return $this->idExchange;

    }
    
    /**
     * Set idTypeExchange
     *
     * @param \SM\Bundle\UserBundle\Entity\TypeExchange $idTypeExchange
     * @return Exchange
     */
    public function setIdTypeExchange(\SM\Bundle\UserBundle\Entity\TypeExchange $idTypeExchange = null)
    {
        $this->idTypeExchange = $idTypeExchange;

        return $this;

    }

    /**
     * Get idTypeExchange
     *
     * @return \SM\Bundle\UserBundle\Entity\TypeExchange
     */
    public function getIdTypeExchange()
    {
        return $this->idTypeExchange;

    }
    
    /**
     * Set idTypePrice
     *
     * @param \SM\Bundle\UserBundle\Entity\TypePrice $idTypePrice
     * @return Exchange
     */
    public function setIdTypePrice(\SM\Bundle\UserBundle\Entity\TypePrice $idTypePrice = null)
    {
        $this->idTypePrice = $idTypePrice;

        return $this;

    }

    /**
     * Get idTypePrice
     *
     * @return \SM\Bundle\UserBundle\Entity\TypePrice
     */
    public function getIdTypePrice()
    {
        return $this->idTypePrice;

    }
    
    /**
     * Set valueIn
     *
     * @param string $valueIn
     * @return Exchange
     */
    public function setValueIn($valueIn)
    {
        $this->valueIn = $valueIn;

        return $this;

    }

    /**
     * Get valueIn
     *
     * @return string
     */
    public function getValueIn()
    {
        return $this->valueIn;

    }
    
    /**
     * Set valueOut
     *
     * @param string $valueOut
     * @return Exchange
     */
    public function setValueOut($valueOut)
    {
        $this->valueOut = $valueOut;

        return $this;

    }

    /**
     * Get valueOut
     *
     * @return string
     */
    public function getValueOut()
    {
        return $this->valueOut;

    }
    
    /**
     * Set dateActive
     *
     * @param \DateTime $dateActive
     * @return Exchange
     */
    public function setDateActive($dateActive)
    {
        $this->dateActive = $dateActive;

        return $this;

    }

    /**
     * Get dateActive
     *
     * @return \DateTime
     */
    public function getDateActive()
    {
        return $this->dateActive;

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
        return $this->getIdExchange();
    }
    
}
