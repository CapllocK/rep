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
define( 'DB_NAME', 'abelohost_test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'dvy1ni|]*Q/$0K@plu,,j+)-4D)(d$^!gQ*mYb3*tmeP}:r%Y:2Gd|Nb6-C^+&Na' );
define( 'SECURE_AUTH_KEY',  'v5?k6MDbdl+c)wcK_dPPG+/])sB}[(DPy ;5rpib%P/F#zj&Mr6HgYWW-5EYW@-g' );
define( 'LOGGED_IN_KEY',    'Q_BZgUf*E}OxklAY|BT,k0RTKq:=*4Y[7{@~dGLc<$mdzK,94X0.kqGX!?SAO3*y' );
define( 'NONCE_KEY',        'GnZNN0V1=rj<l[^{FIe3^}`aIx$<cPmK)%>B:8`l)(e-NNb% 3R3:OoZGp>4|+u|' );
define( 'AUTH_SALT',        '2]Fh65 ^pqM/%^6*(6Nm>#P`cAbu2sZ8.^1|]=Y:-<&~EZ sTXx/UDsDsc^ym]GX' );
define( 'SECURE_AUTH_SALT', 'U4}3/HJns+ZR,c{Nwrw bv&q&qU:+UV:Af|CCjF/(3kOzs>F2jl,DQpGn*ml$o>*' );
define( 'LOGGED_IN_SALT',   'Oz3<T.3#]B)MYt5wB xKH6*jd}%l`T^T0Wel{O,e|[,(lNp/QL-]{Q%HA xGaLX)' );
define( 'NONCE_SALT',       '8m6R&YPi>s-THo>fUe.8?rb22gB<Ge3|%YerX-+8%<Q(JP)JEol #&G)F-rd0241' );

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
