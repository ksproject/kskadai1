<?php
//別ファイルのインポート
require_once 'OrderItem.php';

/**
 * クラス宣言
 */
class Order {
    private $items;

    //コンストラクタ
    public function Order() {
        $this->items = array();
    }

    //OrderItemオブジェクトを格納するメソッド
    public function addItem(OrderItem $order_item) {
        $this->items[$order_item->getItem()->getId()] = $order_item;
    }

    //アイテム情報ゲッター
    public function getItems() {
        return $this->items;
    }
}
?>