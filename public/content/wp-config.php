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

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'W)I!J[)]bYx3cqbYFUtN3/d{<XsU>aDW;BX^z->]u#}5SDOY!@DME7P_}%5CTh&W' );
define( 'SECURE_AUTH_KEY',  '?s73Em&Y;^E~mq5U6F~cU|WTt-4EJly 6poo0F^VnEnaUi/~p@}V%s~]LcG4?O=O' );
define( 'LOGGED_IN_KEY',    'EIP)5t=ktkYF)nHO;O>n+$LJIG.#O#4w^+)N:Pn4dBD[n~2FGcio]Ym~e~^gL)`s' );
define( 'NONCE_KEY',        'goG~KMY !#I95t.0{U9ilIE@*`^v3LkTd>_x@xh5uSD%;[@Mf3^3]P*q$/ rN80b' );
define( 'AUTH_SALT',        'fYOo=:Q?:yB6m5~;i|KQ_j1Zb8o(lNeLt5XnNCG`-W>S ygP D+-:LnEW^C_u<ts' );
define( 'SECURE_AUTH_SALT', '?bR2Q_@3dJvqn%b<;dss7?v#l_d3Yrgba 4~@cXe=o$9b~4qOpH<r%.a d%wSxlX' );
define( 'LOGGED_IN_SALT',   'whbs2Q<<-,~G<wUk}/717Y6(|0PW^=3sm)|4qq#r)y2Njyr9a^CA[D9OI6a-[_T*' );
define( 'NONCE_SALT',       '1wos0J_R8*}oeVo#nH@[q(n?gvuQI|U?`LL?&18d:S+vHQGveq[<*BwaWL^1*3z^' );

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
