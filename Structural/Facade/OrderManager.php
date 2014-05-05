<?php
//別ファイルのインポート
require_once 'Order.php';
require_once 'ItemDao.php';
require_once 'OrderDao.php';

/**
 * クラス宣言
 * Facadeクラスに相当するクラス
 */
class OrderManager {
    public static function order( Order $order ) {
        $item_dao = ItemDao::getInstance();
        foreach( $order->getItems() as $order_item ) {
            $item_dao->setAside( $order_item );
        }
        OrderDao::createOrder( $order );
    }
}
?>