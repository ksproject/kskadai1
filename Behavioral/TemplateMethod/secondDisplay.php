<?php
/**
 * 他のファイルのインポート
 */
require_once 'BaseClass.php';

/**
 * Classの宣言
 * 上記のBaseのClassに肉付けを行う動作をするClass
 * 複数可能
 */
Class secondDisplay extends BaseClass {
	/**
	 * Headerの表示
	 */
	protected function displayHeader() {
		echo 'Headerの出力(2回目)<br />';
	}

	/**
	 * Bodyの表示
	 * クライアントからの渡された内容の表示
	 */
	protected function displayBody() {
		echo $this -> getdata().'2回目の表示<br />';
	}

	/**
	 * Footerの表示
	 */
	protected function displayFooter() {
		echo 'Footerの出力(2回目)<br />';
	}
}
?>