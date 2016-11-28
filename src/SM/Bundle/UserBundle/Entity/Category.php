<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\CategoryRepository")
 */
class Category
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Category", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategory;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="Category_pid", type="integer", nullable=true)
     */
    private $categoryPid;
    
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
     * Get idCategory
     *
     * @return integer
     */
    public function getIdCategory()
    {
        return $this->idCategory;

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
     * Set CategoryPid
     *
     * @param string $categoryPid
     * @return Exchange
     */
    public function setCategoryPid($categoryPid)
    {
        $this->categoryPid = $categoryPid;

        return $this;

    }

    /**
     * Get categoryPid
     *
     * @return string
     */
    public function getCategoryPid()
    {
        return $this->categoryPid;

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
        return $this->getIdCategory();
    }
    
}
