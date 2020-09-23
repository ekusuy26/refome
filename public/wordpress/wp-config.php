<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link https://ja.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define( 'DB_NAME', 'refome' );

/** MySQL データベースのユーザー名 */
define( 'DB_USER', 'root' );

/** MySQL データベースのパスワード */
define( 'DB_PASSWORD', '' );

/** MySQL のホスト名 */
define( 'DB_HOST', '127.0.0.1' );

/** データベースのテーブルを作成する際のデータベースの文字セット */
define( 'DB_CHARSET', 'utf8mb4' );

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define( 'DB_COLLATE', '' );

define('FS_METHOD','direct');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '8d3x=gf0d0oC>vGLHC]C@RrdE79$|DYv}ExD@@|!GLu4u2K<^;|I*RxGLt/:Hyx:' );
define( 'SECURE_AUTH_KEY',  ';YI49%qv::L#<61QAZkp;dpuF]mzv*3[S`Rb&u:lU7!)7R>Ec/gkh[V)G>SWYk;}' );
define( 'LOGGED_IN_KEY',    '>xKfmz(elY).Ha5N{)t/9E`~<~#[}}%RMio15 }@t.Y)BS>&m[Hi(y9v[PH+Q.4a' );
define( 'NONCE_KEY',        't`bXLO(SSQB~1iE3RaPsh-LZN=$i^>HTVlgZ6(pEJx9:oo7ZU1z;lKW^xAuTo6/Q' );
define( 'AUTH_SALT',        ',pd8D7C ,WN#J!%Gk[Vb3Xiad4sk/:jM>N(S?hYaq.4]:+C98-Rk-89Kn6<iq3!O' );
define( 'SECURE_AUTH_SALT', '0Fymo.>prP16x/*esPE`.1rhvi<=RznA,N:8.b.#Il`Oaun![JPz^@j1m1Xd>7%g' );
define( 'LOGGED_IN_SALT',   'b}H#3 RtUh@a5hCLZV35)sqpD?: Op?8r!nt;|Rw-z4=g? :_9lZC7F[#@`T^.M ' );
define( 'NONCE_SALT',       'P403L}$ALryN/A$Gq)sb7ItJc!|LW0&JcA`wwTFl,a[ABbJ=P_c4_JprJ2y0CRg?' );

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数についてはドキュメンテーションをご覧ください。
 *
 * @link https://ja.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* 編集が必要なのはここまでです ! WordPress でのパブリッシングをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
