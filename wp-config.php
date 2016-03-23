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
define('DISABLE_WP_CRON', true);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ticketsbroadway');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'x$eg#5Ds9Gv!');

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
define('AUTH_KEY',         ',W~0Eh=0Ph}f%|[Xr|UaUwnLQ>OTq9dQ Br,~B(cmD+7}DeLd|z3<koj6n#L+ye0');
define('SECURE_AUTH_KEY',  'lB.D;gQ;uaj<p;-@pI=e;s}dnBi&whAo2LS~`V+i$)Wty[^ DKxnQ&8zY1m--yEA');
define('LOGGED_IN_KEY',    '-#/Uw>@TGxiuKj_>40n`b)c?LX#q<|;r>}u7ci3|7;AiEb%;O}^G!aKE?u,Ke]!4');
define('NONCE_KEY',        '=}<862<GkG+gnYxR7.Q[YWCNf3%*R[ ]8Ft+rE:[X]DMO <Yk/#52A|ve-Bb+(.{');
define('AUTH_SALT',        'rGdK)uF/gJQjJ1bkE+[%L-hr>pc7YR+=@f4eYB(oOY#x@~t_MP32qdw{$uL/F,Lo');
define('SECURE_AUTH_SALT', '+WK1 q2oIOk0-oAm+bX`FW9H/sI*UuM@Hp#!*^>OU!4@QCN*) Qn:g4ic-7X)zzf');
define('LOGGED_IN_SALT',   'bl0]tIx(FAB|2o0&2I9W1xawL|*vZN&/PJ0)s%J<=/bD+$e.8Pt:z7kB(&VHmtMI');
define('NONCE_SALT',       'CiH8O9AlH%$nd51mfi>wSvn6>+,0Dl}-*+)Qr| !jEZM<7/]`O=zy_mX?6M$4OpZ');

define('BROKERID', '8388');
define('SITENUMBER', '0');

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

define('WP_HOME','https://ticketsbroadway.com/');
define('WP_SITEURL','https://ticketsbroadway.com/');
