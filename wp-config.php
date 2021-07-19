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
define('AUTH_KEY',         'P+qQlVoAErLVq0VHyHwvKVmu0cEWs4N93qiErBeNnZWw8xFSFTHOM6oj2cEvqbFVVoS09YrVlNOTQ/VGroOgrw==');
define('SECURE_AUTH_KEY',  'KZlUnbEpPRqw+xse31eaZHq2vCNR11RwhjwW10qenRLwyzgNuAh4ycp0Ze9SEace/cy39ee3QrzRoqRaC2aqYg==');
define('LOGGED_IN_KEY',    '6i6boKM4zfD4GS1p1wU6xdr+RL4uVdOADlwqqrCVZDRZEkr1bKeRHiXuJDdjqZm3zo4Z/ARfkzWl2k5DplZrEQ==');
define('NONCE_KEY',        'gXqgvj8ZylZlE1q5HKuHiKpDVdKzvo4qdYEC5MGoShkEq6zSNyK7shfWsOoGTkQgwe5qzhKY9ToCk5DkVEUTCw==');
define('AUTH_SALT',        'MQdld2KWZP8lMJTczVyjn/K4IvmrcsDA2rOkgVWrqrOSyIdGGkHTnVukkUH/4wrDp6B3JgB6c4Ukn9clp1AJjA==');
define('SECURE_AUTH_SALT', 'RKHhFxSzymVj5wfHQWVIMV92x4JcT+sBCQ29R8xeWpxh+Ue9Yvjj8RV7wmZcfUifVLCHUZhq4dvpA0UnUOTNyg==');
define('LOGGED_IN_SALT',   'MrGBsD9UNuPNWA0oPoApoBx60Z5Vhw3LqGmCxKaiY9taQzFoPtkE2rwTr9yGTOA/5x0gLYmc7cHbVys3pPI4UQ==');
define('NONCE_SALT',       'VngPkN33YSM86329kY8LTNN4utB6rCZwItFQ3wkS1pFFdZ+yV4u8p/VeNd7oqSmdg8O8oMb0ozausyASx5xXbQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
