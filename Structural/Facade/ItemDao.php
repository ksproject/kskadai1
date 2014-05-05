<?php
//別ファイルのインポート
require_once 'OrderItem.php';

/**
 * クラス宣言
 * 在庫の引き当てを行うクラス
 * Singletonパターンも含まれている
 */
class ItemDao {
	private static $inst;
	private $items;

	//コンストラクタ
	private function ItemDao() {
		$fp = fopen( 'item_data.txt', 'r' );//商品情報の読み込み

		//商品情報ファイルのヘッダー行を抜く
		$summy = fgets( $fp, 4096 );

		$this->items = array();

		/**
		 * 商品情報から各項目に値を挿入する。
		 * 商品情報のテキストファイルは固定長で入力されて保存されている
		 */
		while( $buffer = fgets( $fp, 4096 ) ) {
			$item_id = trim( substr( $buffer, 0, 10 ) );
			$item_name = trim( substr( $buffer, 10, 20 ) );
			$item_price = trim( substr( $buffer, 30 ) );

			$item = new Item( $item_id, $item_name, $item_price );
			$this->items[$item->getId()] = $item;
		}

		fclose($fp);
	}

	//ItemDaoインスタンスの取得用メソッド
	public static function getInstance() {
		if ( !isset( self::$inst ) ) {
            self::$inst = new ItemDao();
        }
        return self::$inst;
	}

	//商品IDからItemオブジェクトを取得
	public function findById( $item_id ) {
		//配列内に受け取った商品IDがあるかを調べる
		if( array_key_exists( $item_id, $this->items ) ) {
			return $this->items[$item_id];//該当すれば商品情報を返す
		} else {
			return null;//該当がなければNULLを返す
		}
	}

	//在庫の引き当て処理
	public function setAside( OrderItem $order_item ) {
		echo $order_item->getItem()->getName() . 'の引き当てをしました。<br />';
	}
}
?>