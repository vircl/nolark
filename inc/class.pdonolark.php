<?php

/**
 * Class PDONolark
 * Classe d'accès aux données
 */
class PDONolark {
    private static $_host     = 'mysql:host=' . DB_HOST;
    private static $_bdd      = 'dbname=' . DB_BDD;
    private static $_user     = DB_USER;
    private static $_pwd      = DB_PASSWORD;
    private static $_pdo;
    private static $_pdoNolark = null;

    /**
     * Constructeur privé, crée une instance de PDO qui sera sollicitée pour
     * toutes les méthodes de la classe
     * @param string|null $bdd Nom de la base de données à interroger
     */
    private function __construct( $bdd = null ) {
        $bdd = $bdd ? 'dbname=' . $bdd : PDONolark::$_bdd;
        PDONolark::$_pdo = new PDO(
            PDONolark::$_host . ';' . $bdd,
            PDONolark::$_user,
            PDONolark::$_pwd
        );
        PDONolark::$_pdo->query( 'SET CHARACTER SET utf8' );
        PDONolark::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence
     * sur un objet donné, ou dans n'importe quel ordre pendant
     * la séquence d'arrêt
     */
    public function __destruct() {
        PDONolark::$_pdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoNolark = PDONolark::getPdoNolark();
     *
     * @param  string|null $bdd Nom de la base de données à interroger
     * @return PDONolark 'unique objet de la classe PDONolark
     */
    public static function getPdoNolark( $bdd = null ) {
        if ( PDONolark::$_pdoNolark == null ) {
            PDONolark::$_pdoNolark = new PDONolark( $bdd );
        }
        return PDONolark::$_pdoNolark;
    }

    /**
     * Récupère la liste des casques sur la base de données
     * @param int|null $type Le type de casque à récupérer (1: cross, 2: enfants, 3: piste, 4: route)
     * @return mixed tableau d'objets
     */
    public function getCasques( $type = null ) {
        $prepare = PDONolark::$_pdo->prepare(
            'SELECT c.id AS id, '
            . ' c.modele AS modele, '
            . ' c.prix AS prix, '
            . ' c.stock AS stock, '
            . ' c.marque AS idMarque, '
            . ' m.nom AS marque, '
            . ' c.type AS idType, '
            . ' t.libelle AS type, '
            . ' c.image AS image, '
            . ' c.classement AS classement '
            . ' FROM nolark_casque as c '
            . ' JOIN nolark_marque as m ON m.id = c.marque '
            . ' JOIN nolark_type as t ON t.id = c.type '
            . ( $type ? ' WHERE c.type =:unType ' : '' )
        );
        if ( $type ) {
            $prepare->bindParam( ':unType', $type, PDO::PARAM_STR );
        }
        $prepare->execute();
        return $prepare->fetchAll();
    }

    /**
     * Retourne le libellé correspondant au type dont l'ID est passé en paramètres
     * @param int $type Identifiant du type à tester
     * @return string libellé correspondant
     */
    public function getTypeLibelle( $type ) {
        $prepare = PDONolark::$_pdo->prepare(
            'SELECT `libelle` FROM `nolark_type` '
            . 'WHERE `id` = :unType'
        );
        $prepare->bindParam( ':unType', $type, PDO::PARAM_STR );
        $prepare->execute();
        return $prepare->fetch();
    }

}