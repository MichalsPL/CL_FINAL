<?php

    class Product {

        private $id;
        private $name;
        private $description;
        private $price;
        private $quantity;
        static private $nextId = 0;

        public function __construct($description, $price, $quantity) {
            $this->setDescription($description)
                    ->setPrice($price)
                    ->setQuantity($quantity);
            self::$nextId++;
            $this->id = self::$nextId;
        }

        public function setName($name) {
            if (isset($name) && trim($name) != "")
                $this->name = $name;
            return$this;
        }

        public function setDescription($description) {
            if (isset($description) && trim($description))
                $this->description = $description;
            return$this;
        }

        public function setPrice($price) {
            if (is_float($price) && $price > 0.01)
                $this->price = $price;
            else if (!is_float($price) && $price > 0.01)
                $this->price = floatval($price);
            return$this;
        }

        public function setQuantity($quantity) {
            if (is_integer($quantity) && $quantity > 0)
                $this->quantity = $quantity;
            return $this->quantity;
        }

        public function getId() {

            return $this->id;
        }

        public function getName() {

            return $this->name;
        }

        public function getDescription() {
            $this->description;
            return $this;
        }

        public function getPrice() {

            return $this->price;
        }

        public function getQuantity() {

            return $this->quantity;
        }

        public function getTotalSum() {
            if ($this->quantity < 3) {
                $totalSum = $this->price * $this->quantity;
            } else {
                $totalSum = ($this->price) * 0.8 * $this->quantity;
            }
            return $totalSum;
        }

    }
    