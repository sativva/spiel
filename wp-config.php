<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
// define('DB_NAME', 'spielstation-dev');
define('DB_NAME', '180430_spiel');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'Brice');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'SchmidtGruppe?2017@');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

define('DISALLOW_FILE_EDIT', TRUE); // Sucuri Security: Mon, 27 Mar 2017 18:02:56 +0000




/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E&<Gw%ppJqfY>Vj>xeDI#TBn8#g#(!>x@lD*14b2)T{`P%vJaD+|(23Cf4X?yFk:');
define('SECURE_AUTH_KEY',  '^NYA/5F6#!3;EP0>>$K/CYM}[r6JS]LZHFaoRtvwrk)b8zv8](v_$Q=[WZI1_:Y|');
define('LOGGED_IN_KEY',    'A)d9z,^E*L!IpT?MKN1V(5j62HT-jO/q~qR*0P1m:VZDPF&xk%~t,A|f~pZ?QP..');
define('NONCE_KEY',        '|OgOw2/2eU[laMia~Gfd0(_`knpgoQg_ UiVugX<)2(`qghrz+-s=R-.<8a_}[)7');
define('AUTH_SALT',        ']/,I~U`tIDe_pzajL>Bj,ORJxt%pJ*%8Qul3m@kT!N(Z!Ri|!,FNrKYoG O |ZVf');
define('SECURE_AUTH_SALT', 'eu#lah bD 5XCGxxIMii{NFL:ONN,~ud9cd[AmU^lqI|vk>10?WU75.%yWW8,~Y3');
define('LOGGED_IN_SALT',   ',!3V&EuDN=uG[r 3)06&H30=9WXdg24zU-n)??rdxqUK9DekFXN2:%Y k9ixC>*X');
define('NONCE_SALT',       '+V5@cZJ/+kO9) Tu_h}0Y1R<R//xZ-DrU(nMQ& sB yXX;vv+K:w,rlf`^keuj!/');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d'information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
