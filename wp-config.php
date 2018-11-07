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
define('DB_NAME', 'blog-gia');

/** MySQL database username */
define('DB_USER', 'patrickmartin');

/** MySQL database password */
define('DB_PASSWORD', 'highFidelity');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'r=Bxht 2o#ELp.|/ekRp=/eqp=)@$es3|T9EH[6zLhFvywH`(c+E)oKRhFkJqRU^');
define('SECURE_AUTH_KEY',  'q$Yrmy--E{TX5-cJ[-(CU<TzH#peuPNlcld>EO`EW32}nk}uz0I.W?3V!mZEV6cT');
define('LOGGED_IN_KEY',    'O cSNO9IY#W#zrjwmq;,*k0*q%ay8;mv;b{M&qGnF%QL{pIeCqX6<H39mDXbPI`M');
define('NONCE_KEY',        'fbM(eXT!>c~`Qy0_mekZoWWV(41pvks{7$#u[vv.5FaSOa(6jf[>=:-~q65OPrfF');
define('AUTH_SALT',        '#M [eS33]EaffGxfgn8>fq(ac[UY4&{BAT$Th4<Ep/~^;#2z5%W8KFgcC(Q2/)0E');
define('SECURE_AUTH_SALT', 'X^rJ[t~6^_Hbt}$=Xm7?2i%Q&=kYcpZL,MF?Upc0MB-Z%S-h7xhQO4wZ.UpJH)5[');
define('LOGGED_IN_SALT',   '-fEg0Zs.4*HRV]]}HU]+WP>(g*K>N>w+GUcDZ)U^jybjTetmc5Bu&(j0{w5vJ7Uy');
define('NONCE_SALT',       '3GI|Sy3xi|/2hX[|/[j6I`H6<JbxP=AlN(@%wQP$nYJl!TLVD/_G7#l=TvRFX1]A');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
