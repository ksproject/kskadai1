<?php
//別ファイルのインポート
require_once 'Order.php';
require_once 'OrderItem.php';
require_once 'ItemDao.php';
require_once 'OrderManager.php';

/**
 * オーダークラスのインスタンス化
 */
$order = new Order();

//インスタンスの取得
$item_dao = ItemDao::getInstance();

//注文情報の入力
$order->addItem(new OrderItem($item_dao->findById(1), 2));
$order->addItem(new OrderItem($item_dao->findById(2), 1));
$order->addItem(new OrderItem($item_dao->findById(3), 3));

/**
 * 注文処理はこの1行だけ
 */
OrderManager::order($order);
?>