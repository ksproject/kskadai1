<?php
//別ファイルのインポート
require_once 'Item.php';

/**
 * クラス宣言
 * Itemのオブジェクトを数量を取得し、その値を返すゲッターを用意。
 */
class OrderItem {
    private $item;
    private $amount;
    public function OrderItem(Item $item, $amount) {
        $this->item = $item;
        $this->amount = $amount;
    }
    public function getItem() {
        return $this->item;
    }
    public function getAmount() {
        return $this->amount;
    }
}
?>