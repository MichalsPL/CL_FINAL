<?php

namespace ContactsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="ContactsBundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="Address")
     * @ORM\JoinColumn(name="personId", referencedColumnName="id", onDelete="CASCADE")
     * 
     */
    private $personId;
    
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
     * @ORM\Column(name="city", type="string", length=100)
     * @assert\notBlank(message="miasto nie może być puste")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=100)
     * @assert\notBlank(message = "ulica nie może być pusta")
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="houseNo", type="string", length=20)
     * @assert\notBlank(message = "numer domu nie może być pusty")
     */
    private $houseNo;

    /**
     * @var string
     *
     * @ORM\Column(name="aptNo", type="string", length=20, nullable=true)
     */
    private $aptNo;


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
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNo
     *
     * @param string $houseNo
     * @return Address
     */
    public function setHouseNo($houseNo)
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    /**
     * Get houseNo
     *
     * @return string 
     */
    public function getHouseNo()
    {
        return $this->houseNo;
    }

    /**
     * Set aptNo
     *
     * @param string $aptNo
     * @return Address
     */
    public function setAptNo($aptNo)
    {
        $this->aptNo = $aptNo;

        return $this;
    }

    /**
     * Get aptNo
     *
     * @return string 
     */
    public function getAptNo()
    {
        return $this->aptNo;
    }

    /**
     * Set personId
     *
     * @param \ContactsBundle\Entity\Person $personId
     * @return Address
     */
    public function setPersonId(\ContactsBundle\Entity\Person $personId = null)
    {
        $this->personId = $personId;

        return $this;
    }

    /**
     * Get personId
     *
     * @return \ContactsBundle\Entity\Person 
     */
    public function getPersonId()
    {
        return $this->personId;
    }
}
