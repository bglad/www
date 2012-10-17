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
define('DB_NAME', 'Innovate');

/** MySQL database username */
define('DB_USER', 'bglad');

/** MySQL database password */
define('DB_PASSWORD', 'sr22GTS07');

/** MySQL hostname */
define('DB_HOST', 'e653f31bed88c9544fccfbb08d79d22aff380c69.rackspaceclouddb.com');

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
define('AUTH_KEY',         'qP!>|lwPU/m+o^FR{_i|0~:xCV+6y-[jM.g>r@}%mW^#_pQ}HN-@vAHrVg=;iXF`');
define('SECURE_AUTH_KEY',  '=??p}zOK#C?M/(*;IsCF_>5l(^Q!]U[me|-n`jA`d#x*>]z7h~|*XDfKy]R3/NjN');
define('LOGGED_IN_KEY',    '$.]O:k-6d9B#tG_8CqXTDo5wh?C;+r*0$NbIZpE`[$>w5${,FWvv_:h<obgSd-3A');
define('NONCE_KEY',        'k=%KmN:_If)2vKQr359;E@ms[A#&h@)v(jvHB5#*f<Q;G.}5+L1F@xSme.|vrts4');
define('AUTH_SALT',        '5XcWx(VsR(/i/k/Z2XG|r778h,NQ-eYC{M.dE+A-jT0T<X{GQy-}43 +@G-O_(?-');
define('SECURE_AUTH_SALT', '1;@)AY=Nl8.1E_lPxoRq(^4^u->0)(J)ww4s(AHy; z2B5@eHToD,i)*ng,v?&2e');
define('LOGGED_IN_SALT',   '!fb7U`*#8iIl+6CLFR|tH*WmBR<a!;+Hn2x&g)[r+nXdH7)/a&y#Sk?Y3wBA&2@%');
define('NONCE_SALT',       '=m~ikGr on>z8w1s^3?Gl}yYU%0fBA= +Uv!n1XAp{&|/.0j8<LyY/qbTX5wXZBi');

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
