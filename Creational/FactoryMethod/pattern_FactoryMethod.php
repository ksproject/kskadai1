<?php
//別ファイルのインポート
require_once 'factoryClass.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta http-equiv="Content-type" content="text/html";charset="utf-8" />
	<title>PHP｜デザインパターン</title>
</head>
<body>
<?php
/**
 * 外部からの入力ファイル
 * 今回はCSV
 */
$fileName = 'foobar.csv';

$factory = new ReaderFactory();
//インスタンス化用のメソッド呼び出し
$data = $factory->create( $fileName );
//読み込み
$data->read();
//内容表示
$data->display();
?>
</body>
</html>