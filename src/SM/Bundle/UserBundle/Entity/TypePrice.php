<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TypeExchange
 *
 * @ORM\Table(name="Type_Price")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\TypePriceRepository")
 */
class TypePrice
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Type_Price", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTypePrice;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=true)
     */
    private $name;

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

    public function __construct()
    {
        $this->address = new ArrayCollection();

    }

    /**
     * Get idTypeExchange
     *
     * @return integer
     */
    public function getIdTypeExchange()
    {
        return $this->idTypeExchange;

    }

    /**
     * Set name
     *
     * @param string $name
     * @return TypeExchange
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
     * Set isActive
     *
     * @param string $isActive
     * @return TypeExchange
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
     * @return TypeExchange
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
     * @return TypeExchange
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
        return $this->getId();
    }
}
