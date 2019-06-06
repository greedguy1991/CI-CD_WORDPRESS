<?php^M
/**^M
 * The base configuration for WordPress^M
 *^M
 * The wp-config.php creation script uses this file during the^M
 * installation. You don't have to use the web site, you can^M
 * copy this file to "wp-config.php" and fill in the values.^M
 *^M
 * This file contains the following configurations:^M
 *^M
 * * MySQL settings^M
 * * Secret keys^M
 * * Database table prefix^M
 * * ABSPATH^M
 *^M
 * @link https://codex.wordpress.org/Editing_wp-config.php^M
 *^M
 * @package WordPress^M
 */^M
^M
// ** MySQL settings - You can get this info from your web host ** //^M
/** The name of the database for WordPress */^M
define( 'DB_NAME', 'wordpress' );^M
^M
/** MySQL database username */^M
define( 'DB_USER', 'wordpress' );^M
^M
/** MySQL database password */^M
define( 'DB_PASSWORD', 'randompassword' );^M
^M
/** MySQL hostname */^M
define( 'DB_HOST', 'localhost' );^M
^M
/** Database Charset to use in creating database tables. */^M
define( 'DB_CHARSET', 'utf8' );^M
^M
/** The Database Collate type. Don't change this if in doubt. */^M
define( 'DB_COLLATE', '' );^M
^M
/**#@+^M
 * Authentication Unique Keys and Salts.^M
 *^M
 * Change these to different unique phrases!^M
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}^M
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.^M
 *^M
 * @since 2.6.0^M
 */^M
define( 'AUTH_KEY',         'put your unique phrase here' );^M
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );^M
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );^M
define( 'NONCE_KEY',        'put your unique phrase here' );^M
define( 'AUTH_SALT',        'put your unique phrase here' );^M
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );^M
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );^M
define( 'NONCE_SALT',       'put your unique phrase here' );^M
^M
/**#@-*/^M
^M
/**^M
 * WordPress Database Table prefix.^M
 *^M
 * You can have multiple installations in one database if you give each^M
 * a unique prefix. Only numbers, letters, and underscores please!^M
 */^M
$table_prefix = 'wp_';^M
^M
/**^M
 * For developers: WordPress debugging mode.^M
 *^M
 * Change this to true to enable the display of notices during development.^M
 * It is strongly recommended that plugin and theme developers use WP_DEBUG^M
 * in their development environments.^M
 *^M
 * For information on other constants that can be used for debugging,^M
 * visit the Codex.^M
 *^M
 * @link https://codex.wordpress.org/Debugging_in_WordPress^M
 */^M
define( 'WP_DEBUG', false );^M
^M
/* That's all, stop editing! Happy publishing. */^M
^M
/** Absolute path to the WordPress directory. */^M
if ( ! defined( 'ABSPATH' ) ) {^M
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );^M
}^M
^M
/** Sets up WordPress vars and included files. */^M
require_once( ABSPATH . 'wp-settings.php' );^M
define('DB_NAME', 'wordpress');
define('DB_USER', 'wordpress');
define('DB_PASSWORD', 'randompassword');




