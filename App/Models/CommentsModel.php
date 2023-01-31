<?php

require_once('connexion.php');

class CommentsModel extends connexion {


    public function insertToComment($com, $uid, $artId, $createDate)
    {
        $conn = $this->connect();
        $req = "INSERT INTO `blog_highFive`.comments VALUES (NULL, :comment, :user_id, :article_id, :create_at)";
        $stm = $conn->prepare($req);
        $stm->execute([
            ":comment" => $com,
            ":user_id" => $uid,
            "article_id" => $artId,
            ":create_at" => $createDate
        ]);

    }

    public function articleComments($artID) {

        $conn = $this->connect();
        $req = $conn->prepare("SELECT `comments`.id, `comments`.comment, `comments`.article_id, `comments`.create_at, `users`.username, `users`.user_picture
                FROM `blog_highFive`.comments
                INNER JOIN `blog_highFive`.articles ON `articles`.id = `comments`.article_id
                INNER JOIN `blog_highFive`.users ON `users`.id = `comments`.user_id
                WHERE `articles`.id = ?");

        $req->execute(array($artID));
        $result = $req->fetchAll();

        return $result;

    }

    public function userComments($uID) {

        $conn = $this->connect();
        $req = $conn->prepare("SELECT id FROM `blog_highFive`.comments WHERE user_id = ?");

        $req->execute(array($uID));
        $result = $req->fetchAll();

        return $result;

    }



    //For a user to delete it comment
    public function deleteComments($comId) {

        $conn = $this->connect();
        $req = $conn->prepare("DELETE FROM `blog_highFive`.comments WHERE id = ?");

        $req->execute(array($comId));
                
    }

    public function deleteUserComments(array $userId) {

        $conn = $this->connect();
        $req = $conn->prepare("DELETE FROM `blog_highFive`.comments WHERE user_id = ?");
        
        foreach($userId as $id) {
            $req->execute([$id]);
        }
        
        // $req->execute(array($userId));
    }


}
