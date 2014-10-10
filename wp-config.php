<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gem-office-tech');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Ni+p-BfxG<Wn4!eul[nQHf68][:6RKtEbI|<mPmR0F8(`_5AAh~Di+27N3D:y/|y');
define('SECURE_AUTH_KEY',  '%P-7(%Ief~+Z4y?K>QdPUwB4{l-m6+ wrz|bH#yv2-Rb<bvw]8%GVOYeVXN2+E$|');
define('LOGGED_IN_KEY',    '`}TK.1aa:u#.|K|frAp~7x+x/%@?=b3#0/&Rz1`${/R5W)^vVCtDH[A?@qdpb,Gm');
define('NONCE_KEY',        'aCW^m<myX<{&9Q W0n3:Ll+^TT~cGh)s03YS{|H)+!mD[WB+/ 5w1Fq7+jgFm0N=');
define('AUTH_SALT',        'PoQkxc .[%-PAWzTRB7Iy t]n;]P~O5L:~F>oY+Kdv0Dj_8+qkArSv8,2-&iJ_7n');
define('SECURE_AUTH_SALT', '4mjRV1K6f!`tx`FpjEf@uS+h|Y YDGKG?ea ^!l#~7B=7Qy1-I0{?3O78aP[<@Xe');
define('LOGGED_IN_SALT',   ' %/9J-eDW;sS39U^H|6GE9}_]]Q@*=}|K*g5R,FijN1,q1ob;%Yn{DC*9o,qPa/8');
define('NONCE_SALT',       '$Or3x=w%U]PD9{G4A|/to|A;?ZfnRt<b*@r3uJ-+G4A=++Cu0ou.lta9NV(.58|f');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
