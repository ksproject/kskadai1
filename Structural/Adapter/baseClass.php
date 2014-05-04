<?php
/**
 * 指定されたファイルの内容を表示するクラス。
 */
class OpenFile {
	/**
	 * 内容を表示するファイル名
	 */
	private $fileName;

	/**
	 * コンストラクタ
	 */
	public function __const( $fileName ) {
		//ファイルが存在していないか、読み取ることが不可能な場合Exceptionを投げる
		if( !is_readable( $fileName ) ) {
			throw new Exception( 'file "' . $fileName . '" is not readable!' );
		}
		$this->fileName = $fileName
	}

	/**
	 * プレーンテキストとして表示
	 */
	public function showPlain() {
		echo '<pre>';//preタグは中身をそのまま表示するタグ。※<>は特殊文字と判断される場合がある
		/**
		 * 特殊文字列をHTMLエンティティに変換するｈｔmlspecialcharsを使う
		 * file_get_contentsはファイル内のすべての内容を文字列として読み込む
		 * 第二引数にENT_QUOTESを付けるとシングルクォートをエスケープしてくれる
		 */
		echo htmlspecialchars( file_get_contents( $this->fileName ), ENT_QUOTES );
		echo "</pre>";
	}

	/**
	 * ファイルの中身を再度表示
	 */
	public function reOpenFile() {
		highlight_file( $this->fileName );
	}
}
?>