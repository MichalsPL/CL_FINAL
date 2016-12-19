<?php

namespace ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="ContactsBundle\Repository\PersonRepository")
 */
class Person
{
    

    /**
     * 
     * @ORM\OneToMany(targetEntity="Address", mappedBy="Person")
     */
    private $Address;
    
        /**
     * 
     * @ORM\OneToMany(targetEntity="Email", mappedBy="Person")
     */
    private $Email;
    
        /**
     * 
     * @ORM\OneToMany(targetEntity="Telephone", mappedBy="Person")
     */
    private $Telephone;
   
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     * @assert\NotBlank(message = "imie nie może być puste")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="surname", type="string", length=100)
     * @assert\NotBlank(message= "Nazwisko nie może być puste")
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     * 
     */
    private $description;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Person
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
     * Set surname
     *
     * @param string $surname
     * @return Person
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Person
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Address = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Email = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Telephone = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add Address
     *
     * @param \ContactsBundle\Entity\Address $address
     * @return Person
     */
    public function addAddress(\ContactsBundle\Entity\Address $address)
    {
        $this->Address[] = $address;

        return $this;
    }

    /**
     * Remove Address
     *
     * @param \ContactsBundle\Entity\Address $address
     */
    public function removeAddress(\ContactsBundle\Entity\Address $address)
    {
        $this->Address->removeElement($address);
    }

    /**
     * Get Address
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Add Email
     *
     * @param \ContactsBundle\Entity\Email $email
     * @return Person
     */
    public function addEmail(\ContactsBundle\Entity\Email $email)
    {
        $this->Email[] = $email;

        return $this;
    }

    /**
     * Remove Email
     *
     * @param \ContactsBundle\Entity\Email $email
     */
    public function removeEmail(\ContactsBundle\Entity\Email $email)
    {
        $this->Email->removeElement($email);
    }

    /**
     * Get Email
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Add Telephone
     *
     * @param \ContactsBundle\Entity\Telephone $telephone
     * @return Person
     */
    public function addTelephone(\ContactsBundle\Entity\Telephone $telephone)
    {
        $this->Telephone[] = $telephone;

        return $this;
    }

    /**
     * Remove Telephone
     *
     * @param \ContactsBundle\Entity\Telephone $telephone
     */
    public function removeTelephone(\ContactsBundle\Entity\Telephone $telephone)
    {
        $this->Telephone->removeElement($telephone);
    }

    /**
     * Get Telephone
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }
}
