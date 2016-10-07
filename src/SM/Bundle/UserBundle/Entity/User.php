<?php

namespace SM\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity(repositoryClass="SM\Bundle\UserBundle\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_User", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Firstname", type="string", length=100, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Lastname", type="string", length=100, nullable=true)
     */
    private $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=100, nullable=true, unique=true)
     */
    private $username;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=100, nullable=true)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=true)
     */
    private $email;

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
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;

    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;

    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;

    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;

    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;

    }
    
    
    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;

    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;

    }


    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;

    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;

    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;

    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;

    }
    
    /**
     * Set isActive
     *
     * @param string $isActive
     * @return User
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
     * @return User
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
     * @return User
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
    
    public function getRoles()
    {
        return ['ROLE_ADMIN'];
    }
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function eraseCredentials()
    {
    }

    public function getId()
    {
        return $this->getId();
    }
}
