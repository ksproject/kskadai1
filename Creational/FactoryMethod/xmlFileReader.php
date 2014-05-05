<?php
//別ファイルのインポート
require_once 'readInterface.php';

/**
 * XMLファイル読み込み用クラス
 * インターフェースの読み込みあり
 */
class XmlFileReader implements Reader {
    //内容表示するファイル名
    private $fileName;

    //ハンドル用変数
    private $handler;

    /**
     * コンストラクタ
     */
    public function XmlFileReader( $fileName ) {
        //読み込み可能か判断。読み込めない場合Exceptionを投げる
        if ( !is_readable( $fileName ) ) {
            throw new Exception('file "' . $fileName . '" is not read!');
        }
        $this->fileName = $fileName;
    }

    /**
     * ファイルの読み込みを行う
     */
    public function read() {
        //読み取り専用
        $this->handler = simplexml_load_file( $this->fileName );
    }

    /**
     * 文字コードの変換を行う
     */
    private function convert( $str ) {
        //内部文字エンコーディングを取得してセット。
        // "auto" は、"ASCII,JIS,UTF-8,EUC-JP,SJIS" に展開という意味
        return mb_convert_encoding( $str, mb_internal_encoding(), "auto" );
    }

    /**
     * 内容の表示を行う
     */
    public function display() {
        foreach( $this->handler->group as $group ) {
            echo '<b>' . $this->convert( $group['name'] ) . '</b>';
            echo '<ul>';
            foreach( $group->puttern as $puttern ) {
                echo '<li>';
                echo $this->vonvert( $puttern['name'] );
                echo '</li>';
            }
            echo '</ul>';
        }
    }
}
?>