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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '> ;1Hf2Vt~JsJwv2f/LZr20 W39a=|KW1?Z!St`K3mF }<=_!p8+>+qH1^%gtz_N' );
define( 'SECURE_AUTH_KEY',   ')(iZWFBc~B]^&XQk;ljx#$J)*j=fuuc2s,o}aE[)]PH;YlW__^=H!q[Op9~[}sk@' );
define( 'LOGGED_IN_KEY',     '4O32S}Pb-PEA,xlmkY.sE$dqmM<UYo5TC /GA08S0[qL!+C?A#22}VLm<CA1`*pq' );
define( 'NONCE_KEY',         '8Epe?RN{ F`gL<xnL)_#[*^!YQ+<xHk0i%jjXmD`J#D9FFb?|XFpB_8jZ{im t_r' );
define( 'AUTH_SALT',         'Hn+%X(h{D1X;FGzks<jvvH`5uC<-:tG !Tm?h8`uQ>Fq 1fH!`Zptu6.=>;_PVGR' );
define( 'SECURE_AUTH_SALT',  'EK((b6?w-q$B,97[^eCZd?}^0n&.wz0tcY[t}#q@U9F.$|7ze7AK40p4-R=vc{j+' );
define( 'LOGGED_IN_SALT',    'F5|R+<1Mod)AE)7=^_0O&]sl=y>=P*_#omC.+O!AaI3QD[?U]<O0kV|] p)ulNn7' );
define( 'NONCE_SALT',        ':&*H0qf8(LK%7E.lvl4ST)X-7/]C~eizF?7w[?99)YktTr!,mVQXOF kgv9>cu-`' );
define( 'WP_CACHE_KEY_SALT', 'aLzC9R4:ap[4q^93ar5U2/4[{C9`$icvw69iU(Jnzs|mypM^q+)Js!~IM-lbs*a`' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';