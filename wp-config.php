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
define( 'DB_NAME', 'vu-le-web' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'WuI8kakl2hxeullamDjOyLbhJMlewtATiegrAvCY3e3lNiunNXai20vmUzN7Bq1v' );
define( 'SECURE_AUTH_KEY',  'KYT97SigUIcsZQyBITFdEp6DB3LloZ54H3XVKhkjukp2TMzxg70aHeTUjyphAauK' );
define( 'LOGGED_IN_KEY',    'JTcjvKmJp5FbsDGOnzD1XlGJ9KTptdblmelYCD1wT0eR0oTAl0gIFSnfkjUVJ8WD' );
define( 'NONCE_KEY',        'v18177vIwPmKxUcFRoJddaaQvuxqn3Dz92iqIqlSgsoGuE5ORgQUf147D35351F9' );
define( 'AUTH_SALT',        'ehGCjOOuBWFHRXsTUOh3l847H7qRPEp5uk4lqgv7Dp4Wq9nUrwLEVK2BHkCmIa21' );
define( 'SECURE_AUTH_SALT', 'axjFUobxZYlfNj9REF97lituTxYL1tcVkx3mvJN51vPDQdVIESAe5G9eedTpuGGE' );
define( 'LOGGED_IN_SALT',   '0sCQjgeZtlNYg8g5il7TDe5Aqf7P6IjdZJrqn6ugojDs7PfLJWHL4kCzfXo4DD8x' );
define( 'NONCE_SALT',       'sFkJHCJyvgaEr7Kws6BnoUxfDk2GIY7LMLRDcQ8GOHF1w6j2bui49CZrI37BDOqJ' );

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
