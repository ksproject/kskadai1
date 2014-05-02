<?php
/**
 * Classの宣言
 */
class singletonClass {
	/**
	 * メンバ変数宣言
	 */
	private $id;

	/**
	 * インスタンスを保持する変数
	 */
	private static $inst;

	/**
	 * コンストラクタ
	 */
	private function __construct() {
		$this->id = md5( date('r') . mt_rand() );
	}

	/**
	 * 唯一のインスタンスを返すためのメソッド
	 * このClassのインスタンス
	 * !issetなのでNULLどうかの確認(このClass内の$instについて) 
	 */
	public static function getInst() {
		if( !isset( self::$inst ) ) {
			self::$inst = new singletonClass();
			echo 'instance was created';
		}
		return self::$inst;
	}

	/**
	 * IDを返すメソッド
	 */
	public function getID() {
		return $this->id;
	}

	/**
	 * インスタンスの複製（2つ目以降）を許可しないようにする
	 * 実行された時にRuntimeExceptionを返す
	 */
	public final function __clone() {
		throw new RuntimeException ( 'Not create instance ' . get_class($this) );
	}
}

?>