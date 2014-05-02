<?php
//別のファイルの取り込み
require_once 'singletonClass.php';

/**
 * インスタンスを取得
 * 二つ取得して、二つ目が取得できないことを確認
 */
$inst1 = singletonClass::getInst();
//インスタンスの取得時間を変えるため実行を遅延させる
sleep(1);
$inst2 = singletonClass::getInst();

echo '<hr />';

/**
 * ２つの取得したインスタンスが同一かどうかを確認する
 * 一緒だと2つ目のインスタンスがnewされずに１つ目の情報が引き継がれたことになる
 */
echo 'instance ID : ' . $inst1->getID() . '<br />';
echo '$inst1->getID() === $inst2->getID() : ' . ( $inst1->getID() === $inst2->getID() ? 'true' : 'false' );
echo '<hr />';

/**
 * 2つのインスタンスが同一かどうかを確認する
 * 以下の実行で２つ目のインスタンスの発行がなく、１つ目と同じインスタンスになってることになる
 */
echo '$inst1 === $inst2 : ' . ($inst1 === $inst2 ? 'true' : 'false');
echo '<hr>';

/**
 * 複製できないことを確認
 */
$inst1_clone = clone $inst1;

?>