<?php

    namespace ContactsBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * Telephone
     *
     * @ORM\Table(name="telephone")
     * @ORM\Entity(repositoryClass="ContactsBundle\Repository\TelephoneRepository")
     */
    class Telephone {

        /**
         * 
         * @ORM\ManyToOne(targetEntity="Person", inversedBy="Telephone")
         * @ORM\JoinColumn(name="personId", referencedColumnName="id", onDelete="CASCADE")
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
         * @var int
         *
         * @ORM\Column(name="number", type="integer")
         * @Assert\Regex("/[0-9]+/")
         * @Assert\Length(max = 10)
         */
        private $number;

        /**
         * @var string
         *
         * @ORM\Column(name="type", type="string", length=20)
         * @assert\notBlank( message = "typ nie może być pusty")
         * @Assert\Choice(choices = {"prywatny", "służbowy"}, message = "podano nieprawodłową wartość pola")
         * 
         */
        private $type;

        /**
         * Get id
         *
         * @return integer 
         */
        public function getId() {
            return $this->id;
        }

        /**
         * Set number
         *
         * @param integer $number
         * @return Telephone
         */
        public function setNumber($number) {
            $this->number = $number;

            return $this;
        }

        /**
         * Get number
         *
         * @return integer 
         */
        public function getNumber() {
            return $this->number;
        }

        /**
         * Set type
         *
         * @param string $type
         * @return Telephone
         */
        public function setType($type) {
            $this->type = $type;

            return $this;
        }

        /**
         * Get type
         *
         * @return string 
         */
        public function getType() {
            return $this->type;
        }

        /**
         * Set personId
         *
         * @param \ContactsBundle\Entity\Person $personId
         * @return Telephone
         */
        public function setPersonId(\ContactsBundle\Entity\Person $personId = null) {
            $this->personId = $personId;

            return $this;
        }

        /**
         * Get personId
         *
         * @return \ContactsBundle\Entity\Person 
         */
        public function getPersonId() {
            return $this->personId;
        }

    }
    