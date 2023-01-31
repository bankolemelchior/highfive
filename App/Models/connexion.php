<?php 

class Connexion {
        /**
         * LA FONCTION POUR SE CONNECTER A LA BD
         * @return PDO
         * 
         */

    Protected function connect() {
        /**
         * LE NOM DU SERBEUR
         * @var string
         * 
         */

        $DBS_HOST = "localhost";
        
        /**
         * LE NOM DE LA BASE DE DONNEE
         * @var string
         * 
         */

        $DBS_NAME = "blog_highFive";

        /**
         * LE NOM D'UTILISATION
         * @var string
         * 
         */

        $USERNAME = "root";

        /**
         * LE MOT DE PASSE
         * @var string
         * 
         */

        $PASSWORD = "";

        $dsn = "mysql:host:$DBS_HOST; dbname=$DBS_NAME; charset=utf8";

        try {
            $conn = new PDO($dsn, $USERNAME, $PASSWORD);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;

        } catch (PDOException $e) {
            echo "Error !!! " . $e->getMessage();

        }

    }
}


?>