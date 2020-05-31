<?php
/**
 * Class TwigNolark
 *
 * Ajout de filtres et de fonctions au moteur de template twig
 */

class TwigNolark extends Twig\Extension\AbstractExtension {
    public function getFunctions() {
        return [
            new \Twig\TwigFunction( 'activeClass', [$this, 'activeClass'], ['needs_context' => true] ),
            new \Twig\TwigFunction( 'casqueClass', [$this, 'casqueClass'] ),
            new \Twig\TwigFunction( 'casqueStock', [$this, 'casqueStock'] ),
            new \Twig\TwigFunction( 'casqueClassement', [$this, 'casqueClassement'] ),
        ];
    }

    /**
     * Ajoute la classe active à la page courante
     * @param array $context
     * @param $page
     * @return string
     */
    public function activeClass( array $context, $page ) {
        if ( isset( $context[ 'current_page' ] ) && $context[ 'current_page' ] === $page ) {
            return 'menu-item-active';
        }
    }

    /**
     * Retourne la classe à appliquer sur la fiche d'un casque
     * En fonction du nombre d'éléments en stock
     * @param int $stock Nombre de casques restant
     * @return string la classe à appliquer (en-stock | epuise)
     */
    public function casqueClass( int $stock ) {
        return $stock ? 'en-stock' : 'epuise';
    }

    /**
     * Retourne le libellé à appliquer sur la puce indiquant si le casque
     * est en stock ou non
     * @param int $stock Nombre de casques restant
     * @return string Chaîne indiquant si le casque est en stock ou épuisé (En stock | Epuisé)
     */
    public function casqueStock( int $stock ) {
        return $stock ? 'En stock' : 'Epuisé';
    }

    /**
     * Retourne la classe à appliquer sur le classement
     * @param int $classement Note attribuée au casque
     * @return string Classe à appliquer sous la forme classement00
     */
    public function casqueClassement( int $classement ) {
        return 'classement' . sprintf('%02d', $classement );
    }
}