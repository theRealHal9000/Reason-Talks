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
define('DB_NAME', 'reason_talks');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '4UP ^mN_S@ tQ?el+RShO@>C%-OQEX ~TKl|5H5UbF|G5?<Y_:4T^oqczcU@/5+t');
define('SECURE_AUTH_KEY',  'gV-*X4.1JxwxasaB1&]Frk09X8CX|nqZcW1FkQplIGL-Y))xT|<C6G^Dd`|T|{]|');
define('LOGGED_IN_KEY',    'Mq1rmrC^/QHVk@-Mj&om:_e@Ex-`o&:k^=9y*v2>|F^bKNTh/nKeKd_.<`dAO9<a');
define('NONCE_KEY',        ':|ow6E-vdgL2Rx2dJ!px+i].yNG#}:4`t=h2-UQA<rex+/b9l0UTuwR]O<`VW<PD');
define('AUTH_SALT',        '%E<+FwH;~7RM2L??4u)jD&9F`JGS0-tfJL?iEs3Mc_mN+b4*;&tT5H.lnXOleW<*');
define('SECURE_AUTH_SALT', 'J,[S+EPQ<:d!+&+(^v>B0mj8!)4p+/_qxqNP_Yyo#dinE8ijddk{+@;7R?r5S)u?');
define('LOGGED_IN_SALT',   'cx}Y_*! %VddX*XR5Qd9ceS&GQSo=Id$EZ3AI|!27a)eCR+8@}Colpf>0=dz-3T?');
define('NONCE_SALT',       '$*:^~X.X+D|UQ!TI=h-$1)P[am9)K>s>sXdwNtGE >%|kl|+tW4{sb;|9b480NPH');

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
