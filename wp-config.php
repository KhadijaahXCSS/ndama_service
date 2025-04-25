<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ndama' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>3|isCz,=sc3:|VGE92|>U<IN8s`wWR0hB} %7hUuv>@n}q50G1zEf~lC/X+g9sb' );
define( 'SECURE_AUTH_KEY',  '-XD.dz8K68T%/DO.n|%!O{PgU%/Q+k~G|f#[YSuqd+c+Jv)d@M},7]eOx)H>N6V6' );
define( 'LOGGED_IN_KEY',    'FQUYT vX u_29`;SW]osJJB~<aUc36tdS<>yEk|~l`i2pZ0zp7f>}7xuJMjiijdv' );
define( 'NONCE_KEY',        'yy~&3a>7.9)UM)TTo*2WcvNfUW#.24EdneWk2wb0Q(ZC!GbU>_G2WxB~9@hJ&j-A' );
define( 'AUTH_SALT',        '*r]SKMOnrGgWW>gviy3RMM#wm6bkTktiQq^RM`N/,BV)<fU3(B5K,QlHfeoV+hP=' );
define( 'SECURE_AUTH_SALT', '+;7jDSg%It#3f&!X,XtRw*lo_-h$K&s2 [i9+$W!ll _!yIy*5 tvZc[mQGw0X3<' );
define( 'LOGGED_IN_SALT',   'J0,W8L^PVfJ_^@:6Co>J(5#gV)(G_he!V-iKz~y:({6pS:qY8q8~RGNxV.FZz&_E' );
define( 'NONCE_SALT',       'z?s!zdKb]5?n^-tH~KPz=1%hxC!ReBZ;Tue7CNITEz+wl1,5[_P*f_tn*WiFZ; s' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
