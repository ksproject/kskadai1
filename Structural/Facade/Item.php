<?php
/**
 * クラス宣言
 */
class Item {
    private $id;
    private $name;
    private $price;
    public function Item($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
}

?>