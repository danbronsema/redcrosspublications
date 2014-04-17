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
define('DB_NAME', 'wordpress');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8<9UcjaHW-T^4ZQe`Lv|$7Lf-|T<|d/i(hNfX=SP:g/AVB|b+P|#120|DwNyvR2{');
define('SECURE_AUTH_KEY',  'If27av]Z.}K:Yppn%$qg):S}%{U9j?4P Y:J+DHlk4|BEiBRFmQa}U P$IraW;2C');
define('LOGGED_IN_KEY',    'r]].Lem|Y|<Wj%djwYI+7gDP5a]fpd@b>pp}2!1<u,>>)`m%B-h&|p>1;D599*z-');
define('NONCE_KEY',        'UqsM=r&X~Djb-5y&E=HqkN~{w[li]}Z2FJQ<tZ4i*NX(mGvD,BtB6V5A7_`+~oy%');
define('AUTH_SALT',        '/rJD@7v?P^B|ZK}W_vMuKH83B&|0H]isx#yy8*FnSUj/%n;dalZs@,D=c],S?o.Q');
define('SECURE_AUTH_SALT', '+;%X-3*Sp*8O;cS,x_FpQw%[Lj%.h2RF9wof%%cV+1ez+[@;[}|.L-|FQlusuJu-');
define('LOGGED_IN_SALT',   'GQ|q#2MI1}::Kg-<_X2mo[o^mx;fAlA7x?h[|ig|gpcBB-%s_L<_:{^dgq`Hi-KB');
define('NONCE_SALT',       'o|bE!7gk[+d3<mqMyj{-*.0;)LtA{GK-kIU7a5!P,r!=]7B5v}p&[nQV,%kKA0IU');

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
