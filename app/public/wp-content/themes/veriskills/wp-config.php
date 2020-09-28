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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'woolsto1_veriskills' );



/** MySQL database username */

define( 'DB_USER', 'woolsto1_root' );



/** MySQL database password */

define( 'DB_PASSWORD', '7mHNURiJKgnz' );



/** MySQL hostname */

define( 'DB_HOST', 'localhost' );



/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );



/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );



/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'tzZAXHE2YH7VyulDSvBpWkTswyMgldlguIJ5O5bDYY0Y00C6h5Juti4zBShxQzHl');

define('SECURE_AUTH_KEY',  'Xp9SbRglQLGasQGcng6S3NulZA2NTXVdx36EX4BkLYKZGdVFEzezmtez7ebGqCNc');

define('LOGGED_IN_KEY',    'upidz7hHOLTdTMvBGp5ISfvHT7IwNR3NHNawq8uyHoOevRxoqOn1WgbAqfPSeBfE');

define('NONCE_KEY',        '5JcmYS58bHhxUPaPGqpHHkp9P0AzeiWlCizzdfwsQxVevEqNYVoyTMYvWPdHwn7e');

define('AUTH_SALT',        'c9EybLNGOCA3AF4RpOukg4PSodmVLBnRYnNYOF5URFCUQSjGPXXoSFYJ6P3lmo3B');

define('SECURE_AUTH_SALT', 'Ztc9jTRmy4IEdqHU0i2NPvQHpxZvGhQk280tijp86ellxqwdnC0nqKs3SxPVzQIq');

define('LOGGED_IN_SALT',   'ibjStwoFeIUwkedTNg6TLU9oqZEmCml5ejG1gHifoVpfaqs3tTCSZ7IkvzmZ254W');

define('NONCE_SALT',       'ObySiwC5hFbKT5NftaA9heUGvK5wY9zMfHXT7U1qH4B7rOS8kjtKSHaDnMilLy45');



/**

 * Other customizations.

 */

define('FS_METHOD','direct');

define('FS_CHMOD_DIR',0755);

define('FS_CHMOD_FILE',0644);

define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



/**

 * Turn off automatic updates since these are managed externally by Installatron.

 * If you remove this define() to re-enable WordPress's automatic background updating

 * then it's advised to disable auto-updating in Installatron.

 */

define('AUTOMATIC_UPDATER_DISABLED', false);





/**#@-*/



/**

 * WordPress Database Table prefix.

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

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );



/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

