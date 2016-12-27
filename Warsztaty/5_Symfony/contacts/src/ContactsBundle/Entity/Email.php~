<?php

    namespace ContactsBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    use Symfony\Component\Validator\Constraints as Assert;

    /**
     * Email
     *
     * @ORM\Table(name="email")
     * @ORM\Entity(repositoryClass="ContactsBundle\Repository\EmailRepository")
     */
    class Email {

        /**
         * 
         * @ORM\ManyToOne(targetEntity="Person", inversedBy="email")
         * @ORM\JoinColumn(name="personId", referencedColumnName="id", onDelete="CASCADE")
         */
        private $person;

        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         * 
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="email", type="string", length=100, unique=true)
         * * @Assert\Email(
         *     message = " email '{{ value }}' nie jest prawidłowym adresem email")
         */
        private $email;

        /**
         * @var string
         *
         * @ORM\Column(name="type", type="string", length=20)
         * @assert\notBlank( message = "typ nie może być pusty")
         * @Assert\Choice(choices = {"prywatny", "służbowy"}, message = "podano nieprawodłową wartość pola")
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
         * Set email
         *
         * @param string $email
         * @return Email
         */
        public function setEmail($email) {
            $this->email = $email;

            return $this;
        }

        /**
         * Get email
         *
         * @return string 
         */
        public function getEmail() {
            return $this->email;
        }

        /**
         * Set type
         *
         * @param string $type
         * @return Email
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
         * @return Email
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

    
    /**
     * Set person
     *
     * @param \ContactsBundle\Entity\Person $person
     * @return Email
     */
    public function setPerson(\ContactsBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \ContactsBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }
}
