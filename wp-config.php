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
define( 'DB_NAME', 'wp-base' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define('AUTH_KEY',         '.hEd:T-9xR0VY!C,j:QDA?>Krj:L/D{)^W}iu1egjWOUPM`a-T.Ph_V@Q.T4+1^a');
define('SECURE_AUTH_KEY',  'ck!-0Fi)(5`eI3HwR_#g#)8;M>Mua=9B|trFuK9<PAH{{xgDNTwW(8TxK>=oaV*~');
define('LOGGED_IN_KEY',    '9ABE<LTAXf[Paoo1CEQ8K<prS%bMnzaw1`Nii{vAi{;IWZ.aOj|=+WtCf|Hw|ra]');
define('NONCE_KEY',        '{E#BS~<Kd-!q.twQOAue1]G 8MaC43gw+a6]|SEo$W55b2L;V=MO#k6~$Q!uGbTZ');
define('AUTH_SALT',        'auXNQ|;&z]Q3rcWiR?y&e?9H+!Bh}J)NK_88sho|KCfZ 0,O6o6WqhSN(V*NG$5k');
define('SECURE_AUTH_SALT', 'VOh +*G~;~G+]jl7(K| zcnUq4ppNPGZ]!-g;u=Or;G0;V1<jnSQJPAX|{pseQ1P');
define('LOGGED_IN_SALT',   'K4/loSW9~/$4-.|y{.I+4_YV( }>MI0K@W%9sEA]qOar</!|Z|TBQgBKhqr/^nwQ');
define('NONCE_SALT',       '-P;.Ds~}]<Z+?2|L`.0ic5_dma2MzC{tVA.Hk^l&cI/Cd7g|D]XC97CUsFwC/m+1');

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
