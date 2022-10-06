<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'challenge');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'f-M}E;h|d*3v|&(M~]TVpa_^F5@PacT r.NQAP0Mk6uqoC$7eFt8#iBJD4P0Lt{R');
define('SECURE_AUTH_KEY', 'UPas;p.)I/y*swx2W$5+~mtxVbP0>~(xPz-&TUkhk^$a1G1{l<j#KFXMnFgTuY7R');
define('LOGGED_IN_KEY', 'tW~`j|~l`3m[#dc[P`+J_Y@I):DLq@#;-&P}74~@>OXX W+q1;!/ImT^Q8y+Rv v');
define('NONCE_KEY', 'P9B8ur]^kZc#xd]a3p2CS5enkk={Mr&A&zRNT]~O0F13:<ZwJT3G>LC3N e>+E7c');
define('AUTH_SALT', '5zUfv!>^0w|hs* $owgUgn_J`3?z$MwP}LjB2)+wgBNC67+W;7T5Lz$]pd1V=Au&');
define('SECURE_AUTH_SALT', 'x}DoM8j}<i6|Xgkx=W<oJ~ `T>wW}PpRc>e_4^-tV#SLQ^6]SY~[]<lwvu[9>|6/');
define('LOGGED_IN_SALT', ';OI-aI1a;ouWz2V11fC2&6KT.L44-<h|h(R-[E~qv:5uF?0W[#6t7npkYo#$22,b');
define('NONCE_SALT', 'F1ptyN$NHJLfOb5j{M6vngtg<CS-Buu&xbgvvd9-QF,ktAB/_gzPP+uw86K4@H!t');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);


 /** Affichage des erreurs à l'écran */
define('WP_DEBUG_DISPLAY', true);


 /** Ecriture des erreurs dans un fichier log */
define('WP_DEBUG_LOG', true);


 /** Limite à 5 les révisions d'articles */
define('WP_POST_REVISIONS', 5);

 /** Désactivation de l'éditeur de thème et d'extension */
define('DISALLOW_FILE_EDIT', true);

 /** Intervalle des sauvegardes automatique */
define('AUTOSAVE_INTERVAL', 7200);

 /** On augmente la mémoire limite */
define('WP_MEMORY_LIMIT', '256M');


 /** On augmente la mémoire limite de l'admin */
define('WP_MAX_MEMORY_LIMIT', '512M');

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
