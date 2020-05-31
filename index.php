<?php
/**
 * Fichier index.php
 * Ce fichier sert de point d'entrée du site
 *
 * @project Nolark
 * @author  vircl
 */
require( 'vendor/autoload.php');

// Routing
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
if ( ! isset( $page ) ) {
    $page = 'accueil';
}

$options = [
    'header_height' => '50vh',
];

$casques = [];

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

    try {
        echo $twig->render($template . '.twig', ['options' => $options, 'casques' => $casques ]);
    } catch (\Twig\Error\LoaderError $e) {
    } catch (\Twig\Error\RuntimeError $e) {
    } catch (\Twig\Error\SyntaxError $e) {
    }
}
?>