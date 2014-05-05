<?php
//別ファイルのインポート
require_once 'Reader.class.php';

/**
 * CSVファイル読み込み用クラス
 * インターフェースの読み込みあり
 */
class CsvFileReader implements Reader {
	//内容表示するファイル名
	private $fileName;

	//ハンドル用変数
	private $handler;

	/**
	 * コンストラクタ
	 */
	public function CsvFileReader( $fileName ) {
		//読み込み可能か判断。読み込めない場合Exceptionを投げる
		if( !is_readable( $fileName ) ) {
			throw new Exception('file "' . $fileName . '" is not read!');
		}
		$this->fileName = $fileName;
	}

	/**
	 * ファイルの読み込みを行う
	 */
	public function read() {
		//読み取り専用
		$this->handler = fopen( $this->fileName, "r" );
	}

	/**
	 * 内容の表示を行う
	 */
	public function display() {
		//変数宣言
		$column = 0;
		$tmp = '';

		//区切り文字は','にして、最大文字列長はテストケースのため100文字に設定
		while( $data = fgetcsv( $this->handler, 100, ',' ) ) {
			$num = count( $data );
			for( $c = 0 ; $c < $num ; $c++ ) {
				if( $c == 0 ) {
					if( $column != 0 && $data[$c] != $tmp ) {
						echo '</ul>';
					}
					if( $data[$c] != $tmp ) {
						echo '<b>' . $data[$c] . '</b>';
						echo '<ul>';
						$tmp = $data[$c];
					}
				} else {
					echo '<li>';
                    echo $data[$c];
                    echo '</li>';
				}
			}
			$column++;
		}
		echo '</ul>';
		fclose( $this->handler );
	}
}
?>