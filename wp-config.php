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
define('DB_NAME', 'gopal-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
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
define('AUTH_KEY',         '(;%-HqJ}hCAmIS k]/:+-b.I]wUCf-,mYuq~mJ9+_wLOIS<yLvs|=zSENJ`2kxVV');
define('SECURE_AUTH_KEY',  'MnmqEWOg1].@sTT~q,:e!,1!*P:6{b!$)!o[ :|p_BweQ/XS!p WlMdDgae]/;.r');
define('LOGGED_IN_KEY',    '6F?@.;FY+TZ]~z=1u@OG`~pJV*9,;cSMy{atqH<d#Y.h%|J!RMdD>iW6}LlZ^e;{');
define('NONCE_KEY',        'YolVdA*2t@Rt7TozcoIIn2<boI>| 8__GqX<{tuKi&nAO yv#c{t=f.k7=BY|!`+');
define('AUTH_SALT',        '7GQ3RuVB&MJ3 w*>b*m61QMqG}9~u>5#KHZf]2TO<`;,KMf2Ak_325-6mmFuFd]a');
define('SECURE_AUTH_SALT', 'qJl9vw;6;8:yaF)dw;6{y@/Yvy.ZIw|q=Dg6OK}gEt3*^`aMD%hJ$N;b0P4kWU}H');
define('LOGGED_IN_SALT',   'f:0p[`4o17%QbBd,X{+U-<RYk;,8_9^<DO 2dF:vZ*B9:}5gV;:|%<3a_V0dPb6v');
define('NONCE_SALT',       '@<QkPv{a.IknI})AHb4: 3tOs{t(s-%T0%~19soXn^TbRz]N$^$i7D pOCb~Ox4z');

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
