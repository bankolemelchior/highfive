<?php

require_once('connexion.php');

class GalerieModel extends connexion {


    public function insertToGalerie($imgName, $imgDesc)
    {
        $conn = $this->connect();
        $req = $conn->prepare("INSERT INTO `blog_highFive`.galerie VALUES (NULL, :image_name, :alt)");
        $req->execute([
            ":image_name" => $imgName,
            ":alt" => $imgDesc
        ]);
    }

    public function selectAllImage()
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select last three articles from the database
        $req = "SELECT * FROM `blog_highFive`.galerie ORDER BY id DESC";
        $forQuery = $conn->query($req);
        $result = $forQuery->fetchAll();

        return $result;

    }

    public function deleteImage($imgId)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select last three articles from the database
        $req = $conn->prepare("DELETE FROM `blog_highFive`.galerie WHERE id =?");
        $req->execute([$imgId]); 

    }

}
