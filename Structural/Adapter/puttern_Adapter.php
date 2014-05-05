<?php
// ファイルのインポート
require_once 'baseClass.php';

/**
 * クライアント側のソース
 * OpenFlieクラスをインスタンス化する
 * 表示するファイルはbaseClass.phpとする
 */
try {
	$show_file = new OpenFile('baseClass.php');
} catch ( Exception $err ) {
	//dieはexit()と同じ。現在のスクリプトを終了。
	die($err->getMessage());
}

/**
 * プレーンテキストを表示
 * プレーンテキストとハイライトしたファイルのそれぞれを表示する。
 */
$show_file->showPlain();
echo '<hr>';//区切り
$show_file->reOpenFile();
echo '<hr>';//区切り
$show_file->display();
?>