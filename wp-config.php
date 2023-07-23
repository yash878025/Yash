<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'E,LD-VeUXq}ap#p,!X~ZHy65SxZP+#eeHt(n~a$1R@;6ZC:Krf/]zOAz3]{>mc %' );
define( 'SECURE_AUTH_KEY',  't~)N_P_P6o6WA%/C~RRjttrklC$oSbJM)-|ZO|Gd[2^B! %1er8rZK^[37)F*_a8' );
define( 'LOGGED_IN_KEY',    '2|y|m=;~nPUqR|u{:84H?^*+aw:*-K+Z6yD?66k?V75-KZ3,jt~1Zk[Z4` =G4iq' );
define( 'NONCE_KEY',        '}Ti8}=xie?pp<eZerlNSk`p*ZD+;+]amMN5.DP/+Z^G40:R}m=1Lf}vYu.?I8V1r' );
define( 'AUTH_SALT',        'iFsovj4xV1Hs?_H;GFuaFloQLMZTr5^Q;MRL9EW0P5I#[,M5G=P4zohqMg)}!<@P' );
define( 'SECURE_AUTH_SALT', 'qt=|ONQ@*!Z{KSjBcgO+_s_ ohimfT,ZkC]X9,EY-Qi?KR5=1,vTl&{vfITAX]`1' );
define( 'LOGGED_IN_SALT',   '0P+;waPK?XoH~bOo+pODt`L/=nuL/TNU3:#|FG&{ka0Z}=nzhRX0_Vg;$AEE9:,=' );
define( 'NONCE_SALT',       '?o.rCbAgAg+$cua@/_MN+ZI6kMNI%BsW5%34ggt7]k?PYCKC5THzgGYkyQV6*fZ+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
