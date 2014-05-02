<?php
/**
 * Classの宣言
 * このClassがBaseになる
 */
abstract class BaseClass {
	/**
	 * 変数宣言
	 * 表示するデータ
	 */
	$outputData;

	/**
	 * コンストラクタの設定
	 */
	public function const( $data ) {
		$this -> $outputData = $data;

	}

	/**
	 * Baseとなるメソッド
	 * 一番メインとなる動作をする
	 */
	public function mainDisplay() {
		$this -> displayHeader();
		$this -> displayBody();
		$this -> displayFooter();
	}

	/**
	 * データの取得
	 * ゲッター
	 */
	public function getData() {
		return $this -> $outputData;
	}

	/**
	 * Headerを表示する
	 * サブクラスに実装を任せる、抽象メソッド
	 * abstractのメソッドなので｛｝はない。
	 */
	protected abstract function displayHeader();

	/**
	 * Bodyを表示する
	 * サブクラスに実装を任せる、抽象メソッド
	 * abstractのメソッドなので｛｝はない。
	 */
	protected abstract function displayBody();

	/**
	 * Headerを表示する
	 * サブクラスに実装を任せる、抽象メソッド
	 * abstractのメソッドなので｛｝はない。
	 */
	protected abstract function displayFooter();
}
?>