<?php
/**
 * 他のファイルのインポート
 */
require_once 'firstDisplay.php';
require_once 'secondDisplay.php';

/**
 * クライアント側でのコード
 */

//テストデータの入力
$data = 'hoge';

/**
 * クラスのインスタンス化
 */ 
$display1 = new firstDisplay($data);
$display2 = new secondDisplay($data);

/**
 * 結果の出力
 */
$display1 -> mainDisplay();
echo '<hr />';
$display2 -> mainDisplay();

?>
