<?php

    include_once 'Product.php';

    Class ShoppingCart {

        private $products = [];

        public function addProduct(Product $newProduct) {
            $this->products[$newProduct->getId()] = $newProduct;
            return $this;
        }

        public function removeProduct($productId) {
            if (isset($this->products[$productId])) {
                unset($this->products[$productId]);
            }
            return $this;
        }

        public function changeProductQuantity($productId, $newQuantity) {
            if (isset($this->products[$productId])) {
                $this->products[$productId]->setQuantity($newQuantity);
            }
            return $this;
        }

        public function printRecipt() {
            $totalPrice = 0;
            foreach ($this->products as $items) {
                echo "ID:" . $items->getId() . "<br>";
                echo " name:" . $items->getName() . "<br>";
                echo "price:" . $items->getPrice() . "<br>";
                echo "quantity: " . $items->getQuantity() . "<br>";
                echo"totalPrice:" . $items->getTotalSum() . "<br>";
                $totalPrice = $totalPrice + $items->getTotalSum() . "<br>";
                echo"<hr>";
            }
            echo " TOTAL PRICE $totalPrice";
        }

    }
