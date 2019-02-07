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
define('DB_NAME', 'wp-prueba');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '$)p]OzVKN[9UIQbJ2ZscX7#?`+r5i_gPDnIZRY1m6S!PV,[BOwJJoY z:YilM?r1');
define('SECURE_AUTH_KEY',  'x7xsda7cyY~O8P*CD`UX1u8y9(l:96*cg#s1f^0T4-5K5Q8W*c k~%8GtSkk{z`g');
define('LOGGED_IN_KEY',    '=WJJk,)m)8CD$YwNf2Yp2F4W>iNb;76VwanFIW!#1AD^&;ls0~1GP!.Tc9,lb;>0');
define('NONCE_KEY',        '3-ij>;43xnFpDxx7=hUs&+<I$T6v=z|0&[S@*E[xMx)w*p~nIhsn6)C7YaS6.[V,');
define('AUTH_SALT',        'TcT8%$A?rE7WB+}pM;@7E,w_41T6c[C2jQT5,_t]er(xW-9P&;| #1Xysl,:,{I%');
define('SECURE_AUTH_SALT', '~~ye*L=lZ=z(C;G+O;DcKqrC[f-EuBsy0BrYjEK-6k({wzPMlgUy4%v3Q5h3[Kd1');
define('LOGGED_IN_SALT',   'O2YiGCc5K|JRAEwG)ghtZ`_8$e%-m1ba6@]1cuKKT}YY`vZUm$ NBk[$bBmo>Y5:');
define('NONCE_SALT',       '*yq3~wHt<qVM6S|7945G{?vQXA&hNgX>(RzOd[*7`vXg?#OS(^f;B{^ExQaz&M}Z');

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
