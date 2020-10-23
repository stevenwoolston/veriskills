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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'LJ4mdOepyHRR+PekNGh4vCCNZumE7UPVHr08CZxOGtUDxq+lGylCPGXezhpBph8q7cpnSDJi2HBsX6+FPiKn2w==');
define('SECURE_AUTH_KEY',  'CD601j+iucb0QooSt+yOvQRJtz9FQD/HzUj6OWVpttfbifh1vfXIngxLtKCmniXC/uP1Mnnixm1IuhwtSF244A==');
define('LOGGED_IN_KEY',    'sQ52wZ4Jqv0D4q6ebJ1rlwxxNf+ONhGj96EcHZBXb5bvwQdWJQoFUEgidxNLnQtzMNBk8QIn+0sUwM79qO3VbA==');
define('NONCE_KEY',        'lQJE1b95zXxVnkYvFcXcBBHCtHNnW5C/ZdOQxD/Yg304bjmSgA74AO8tGkOVDpaPleZmce5B52aExaypwZBFig==');
define('AUTH_SALT',        '/+rW+te2VAauP9oy8UTOCMsN4DEWSf4ufwU3KZcsVJfpzFEI7CjDBlfC/TiM1PMsrG2j47nf1hJkKfGI8rN7nA==');
define('SECURE_AUTH_SALT', 'X4H06cpP4th6Nr8bjBgBKm0SJ0nb5Y9V7gU4gVSr++KJhEbzTYQFNfmdNGCWBtsnbcXaOu2qYWPyjPwo+GFH1w==');
define('LOGGED_IN_SALT',   '06W5ogXYSnEoH4izDzmpUE4Myrk1+8HB3U+ryKJorWNp1olZmSOU2MRv71LboVLjWhUGw3gmWEZnpY3eYpUZFg==');
define('NONCE_SALT',       'MmYa6JviZPyRJs6DlvdE5ZOSHftJNIGZYOXcfs3dTWzteB+IrtbGt8cSyEjWyty4dXi5ZX9luWXrnnedFavofA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define('WP_DEBUG', true);



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
