<?php

require_once('connexion.php');

class CategoriesModel extends connexion {


    public function getCategories() 
    {
        $conn = $this->connect();
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.categories ORDER BY categorie_title ASC");
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function insertCategories($cat_title, $cat_desc) 
    {
        $conn = $this->connect();
        $req = $conn->prepare("INSERT INTO `blog_highFive`.categories VALUES (NULL, :categorie_title, :description)");
        $req->execute([
            ':categorie_title' => $cat_title,
            ':description' => $cat_desc
        ]);
    }
}
