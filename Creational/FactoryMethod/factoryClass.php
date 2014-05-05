<?php
//別ファイルのインポート
require_once 'readInterface.php';
require_once 'csvFileReader.php';
require_once 'xmlFileReader.php';

/**
 * Readerクラスのインスタンス生成を行うクラス
 */
class ReaderFactory {
	//インスタンスの生成
	public function create( $fileName ) {
		$reader = $this->createReader( $fileName );
		return $reader;
	}

	//Readerクラスのサブクラスを条件判定し、生成。
	private function createReader( $fileName ) {
		//返り値の判定には===を使うこと
		$poscsv = stripos( $fileName, '.csv' );//CSVファイル判定
		$posxml = stripos( $fileName, '.xml' );//XMLファイル判定

		if( $poscsv !== false ) {
			$r = new csvFileReader( $fileName );
			return $r;
		} else if( $posxml !== false ) {
			return new xmlFileReader( $fileName );
		} else {
			die( 'Not supported File : ' . $fileName );
		}
	}
}


?>