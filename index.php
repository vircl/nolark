<?php
/**
 * Fichier index.php
 * Ce fichier sert de point d'entrée du site
 *
 * @project Nolark
 * @author  vircl
 */
require_once( 'vendor/autoload.php');
require_once( 'config.php');
require_once( 'inc/class.pdonolark.php' );
require_once( 'inc/class.twignolark.php' );


$pdo = PDONolark::getPdoNolark();

// Routing
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
if ( ! isset( $page ) ) {
    $page = 'accueil';
}

$options = [
    'header_height' => '50vh',
    'marques'       => $pdo->getMarques(),
    'types'         => $pdo->getTypes(),
    'motifs'        => $pdo->getMotifsContact(),
    'populaires'    => $pdo->getTypesFavoris(3),
];

switch( $page ) {
case 'home' :
case 'accueil' :
    $template = 'home';
    $options['header_height'] = '100vh';
break;
case 'contact' :
    $template = 'contact';
break;
case 'casques' :
    $template = 'casque';
    $type = filter_input(INPUT_GET, 't', FILTER_SANITIZE_STRING);
    $options['casques'] = $pdo->getCasques( $type );
    $options['type'] = $pdo->getTypeLibelle( $type );
break;
default:
    header('HTTP/1.0 404 Not found');
    $template = '404';
break;
}

// Affichage du template
if (isset($template)) {
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/vues');
    $twig = new \Twig\Environment($loader, [
        //'cache' => __DIR__ . '/cache',
    ]);
    $twig->addGlobal( 'current_page', $page );
    $twig->addGlobal( 'mapquest_key', MAPQUEST_KEY);
    $twig->addExtension( new TwigNolark() );
    try {
        echo $twig->render($template . '.twig', ['options' => $options ]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}
?>