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
define('DB_NAME', 'blog_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'xck43GZdB<|TS2uM4R)R`D<$S0H0,]rxH~QLr;*sxD2}q.|<iiC6tVP`CGn{j8AB');
define('SECURE_AUTH_KEY',  'Kw|r2V+NVTI!euxE`$-L0p4S#*=QemQ(xn~|PoAOr0g&jOSqb~Gls>wm[jN:8:1g');
define('LOGGED_IN_KEY',    'H1vUvZg93Qw(Eh+bD{&+I9hHs4VAfJSu|YU~E]p^Pw#q?dR+P^r(j-]6{lwNsg*[');
define('NONCE_KEY',        '%|DND(PhG-?TI@9AK`.U&P+W-&--6r,cmaY~pS.OA> ATUYkaue|Z?fmQ#oFOL%(');
define('AUTH_SALT',        'V/+<7IExlWY$:8: +mN52V8i/jx(dLx|QT[Gxoi(q45u=P6ni<RqR>Er|>&~|Hq/');
define('SECURE_AUTH_SALT', '#IG=|$TR?^-!vBE-w&WGb?y*}OUIn,&;zQ1WiW9t/sibB8&_e:F?iVu`QP?XSO*6');
define('LOGGED_IN_SALT',   '~mAOP.+}0y5|e=2Wc:>)S@XyWdbq0bzW/zOxKNq0Yq5}y-fLa2AMV^e`RGE@NpV/');
define('NONCE_SALT',       'u|{$*(aitC|.TKghaEzL}IDN@zue)?g}ZTsjQX}sJ#3!f![x_T GJ4lK_?sf^<y`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
