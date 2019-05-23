<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'VisitoIran');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'FFJ8Um`K<)|x6P5I;E_g-tk*wC9es*;qs7LJVEJq[z~A)mX+OvB&tM=Q=a;CC4w|');
define('SECURE_AUTH_KEY',  'z*,`V,f Br=}hg)+fpe}dOCk0PkneQc*b!} dak6]A~_O^2%}.w6L,T EY$(TEd ');
define('LOGGED_IN_KEY',    '-p}1G/^93X!plY*sL:-^eRfvYgJp2<4AT|%SD`e$vp~]3aDGJTUHq$YG:/)P+2 x');
define('NONCE_KEY',        '?DquTPFBf2=+Kj60R>6[Ur[Y#KWcHti=Ql.KW#=%v8q;GMHu-E^X|+QsX6}buI^j');
define('AUTH_SALT',        ')h{4$2H}lMeVf!=5&JiNr}AE^A^la8Of-t!-&zl`V22*/mYYt=yGh|_pAR 0dGa7');
define('SECURE_AUTH_SALT', 'NeOv<I^!K&|%~$l*cdGbBz+yiI4Zk*8PJ_h@DBndw9sMCphC;Go`x~,EgZXD0gN7');
define('LOGGED_IN_SALT',   '9q>:MoX2RQ4jzzjFWsyIt_2G>)wT+v)lC$JL+uk1;.^g5FzY,}Y)ysmEEoK-vo^d');
define('NONCE_SALT',       '.s==SiDw_YevkWG!p7he0c@:99Lz%7-@}mBs`fiWQe3vCT{}ms5G ?}k?Bk1a[*S');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
