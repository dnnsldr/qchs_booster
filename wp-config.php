<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'qchsFootball');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//define the Home URLs
define('WP_SITEURL', 'http://localhost:8888/qchs_booster');
define('WP_HOME', 'http://localhost:8888/qchs_booster');

//remove the revisions from post editor
define('WP_POST_REVISIONS', false );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|mVi6Sn/y`Xy4?p:x@Z8~pM6]R/P=S+y4`sXdnm}g<5;[a(|zVU+O-1}7B0Hf=tp');
define('SECURE_AUTH_KEY',  '0LW7iq+m(aVJlm*YEU=`Gs?_/qs3>_}yJ<_&*WeU@|4k~T%Nh9a++<DT-;/hCmHP');
define('LOGGED_IN_KEY',    '/d9z9zA++l)-7,ubjoA;YxX2bq<.[tx-Wb+*Wp|[Nb|61^!>^8.086tOt=W]?Evv');
define('NONCE_KEY',        'Fxt.T_]NC}rt|tKVL#;?_yp KVNy/:.!_O<=`rH)airC;GUFnG2]AV[Fies3+/VB');
define('AUTH_SALT',        '<;1211:KxNTn>M{fjFGSv#fB$GT0S4e79|7uDNd4d2*%S*~hBZh^<2.$^hky6#F;');
define('SECURE_AUTH_SALT', '}qoy;ToMmfmcmm|~nbt:K9+iY1|dmY) <`X7]R,O9A-Z$<O-}5{vL2Y:k;AHPZ^p');
define('LOGGED_IN_SALT',   'KI-z&OL3sPR:~0JB,98^22o>4#65s&_vZ5=8}d;R_x)/tPnTcPK1kX>?oK-VPN=0');
define('NONCE_SALT',       'AV|yz|r~+D@Ka^^@D,W{p,G<wmu(TG.=6Q9#fkV|fBa^WB*Ine7XMrc-#`si(4EW');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ballers_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
//define('WP_DEBUG', true);
define( 'WP_CACHE', false );
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('SAVEQUERIES', true);


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
