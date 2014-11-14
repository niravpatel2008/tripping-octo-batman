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
define('DB_NAME', 'cart');
define('DB_USER', 'cart');
define('DB_PASSWORD', '6Nh3w~TnZmw%');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}^!?BUrSD;:ys5mOd}PtmiSrp7nFzYakt4a:PC4`a];4 [9shF 5gtjeS>oZd@P$');
define('SECURE_AUTH_KEY',  'NIprk*Z%m<%rSN_p&#H#rp4@r-*#6.ZUoU[na|4I`:e+dFR/XM)|5X=S^=[atE;w');
define('LOGGED_IN_KEY',    'MCZ,fj{ryYTStamH=1gDG)~HN^(*YkSN`_[VzAyABh.`$~vx)Vd(jGQw;mhpv[hJ');
define('NONCE_KEY',        'k>V`VkDBBXCi<SOE4WKq$fqbXp#!&m)rW<U0!i/K[<;=7[q|dtV];5&X1EP1,h-p');
define('AUTH_SALT',        'TFdd{A:TJU[e0zH/)kj4F|MsNZgznFL=JnG}o! _W]h:BVWXVv.a#htd<o.KB|iq');
define('SECURE_AUTH_SALT', '2,8c?0Z*3&+3FR>UTnj$AlS#QP1S`a.-ATT1<]}GtO,{Qgki<7fgwc8|$pv6jBrW');
define('LOGGED_IN_SALT',   'R9p-DEQmVkKeY/:9NBA./3&aD}:*Iq0pHPKn)Gv z&}Buu*3]z=g.F>HCWfsJ@LX');
define('NONCE_SALT',       'ob-TGQr,V7$W6O iO8i|g [503:}?r105JF;T]butZ$2|Dh<?_#- <Y7G^rk@t21');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
