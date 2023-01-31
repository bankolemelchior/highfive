<?php

require_once('connexion.php');

class ArticlesCategoriesModel extends connexion {


    public function insertCategorie($artId, $catId)
    {
        $conn = $this->connect();
        $req = $conn->prepare("INSERT INTO `blog_highFive`.articles_categories VALUES (:artId, :catId)");
        $req->execute([
            ":artId" => $artId,
            ":catId" => $catId
        ]);
    }

    public function deleteArticleCategorie(array $artId)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request delete an article from the articles_categorie table in the database
        $req = $conn->prepare("DELETE  FROM `blog_highFive`.articles_categories WHERE article_id = ?");
        foreach($artId as $id) {
            $req->execute([$id]);
        }
    }
}
