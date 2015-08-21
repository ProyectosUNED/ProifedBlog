<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'proifed');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Lz/FXd+EF-yb]{J Cw#qsoavgmZo:!Y8J{($c?WJ~iG5GI@pYkP+BrKY!.z[%J1;');
define('SECURE_AUTH_KEY',  'DIDXl5cYJ i~R,31A~&?6n8]&zeyOrky!@:FR5>X-+z?n-nK5MKo${.w]0M$)a~+');
define('LOGGED_IN_KEY',    'a( o`-*w?GcBd8j!2--78(w4TvXR$.0r1}`v]}| YP;Y`8#=<d3|`,N:,utF%:S-');
define('NONCE_KEY',        'Gy1HB4m|s6x#8$ ~YF=|h7,K*X%u#^d<oc}Fx=R9|ICXLIYN~E5r-().`Az?{#n(');
define('AUTH_SALT',        'vvN+j(Gny-jU@/repAEO.i+GvGkCVsQ8qv@5]/H|3X$FgxJLJ5=6561fuFqNp 4_');
define('SECURE_AUTH_SALT', 'Gg3,Y^y>kEfsh:UFQhh^Wf,-H+q)*LS<Q7S0!j&vWV!-Y|pGE`na!@I9#jb~f4u?');
define('LOGGED_IN_SALT',   'lFe[UR:MUb|SK2?mhkZ_M%1Uz@P7X4(pQ.m8+I[MNYD`kk<dSM?xF)!Et:zqb<(5');
define('NONCE_SALT',       'wrk0luNmF=GAYEn4hC;;gnfu3V4IBW(Gex*h@~|#Q2o[]Z8/X+DI-CIC@bS)o~&F');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
