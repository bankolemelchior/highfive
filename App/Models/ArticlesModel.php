<?php 

require_once('Connexion.php');

class ArticlesModel extends Connexion {



    public function checkExistArticle($title)
    {
        // connection to the database
        $conn = $this->connect();
        //To check if a title exists in the article table before insertion
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.articles WHERE title = ? LIMIT 1");
        $req->execute(array($title));
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To insert an article
     */
    public function insertArticle($title, $body, $pictureName, $status, $userId, $date)
    {
        // connection to the database
        $conn = $this->connect();

        $reqInsert = "INSERT INTO `blog_highFive`.articles
                        VALUES (NULL, :title, :body, :picture, :a_status, :userId, :createDate)";
            
        //Prepare statement
        $stmt = $conn->prepare($reqInsert);
        //Statement template
        $stmt->execute([
            ":title" => $title,
            ":body" => $body,
            ":picture" => $pictureName,
            ":a_status" => $status,
            ":userId" => $userId,
            ":createDate" => $date
        ]);

    }

    /**
     * To update an article
     */

    public function updateArticle($title, $body, $pictureName, $status, $userId, $date, $artId)
    {
        // connection to the database
        $conn = $this->connect();

        $reqInsert = "UPDATE `blog_highFive`.articles
                        set `articles`.title=:title, `articles`.body=:body, `articles`.article_image=:picture, `articles`.status=:a_status, `articles`.user_id=:userId, `articles`.create_at=:createDate
                        WHERE `articles`.id = :artId";
            
        //Prepare statement
        $stmt = $conn->prepare($reqInsert);
        //Statement template
        $stmt->execute([
            ":title" => $title,
            ":body" => $body,
            ":picture" => $pictureName,
            ":a_status" => $status,
            ":userId" => $userId,
            ":createDate" => $date,
            ":artId" => $artId
        ]);

    }

    /**
     * This method retrieve all articles with the linked user from the database
     * The result is get on Article controller
     */

    public function allArticle()
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select all articles from the database
        $req = $conn->prepare("SELECT `articles`.id , `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                            FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                            WHERE `articles_categories`.article_id = `articles`.id
                            AND `articles_categories`.categorie_id = `categories`.id
                            AND `articles`.user_id = `users`.id
                            ORDER BY create_at DESC");
        $req->execute();
        $result = $req->fetchAll();

        return $result;

    }


    /**
     * This method allows us to retrieve one article 
     * It takes an argument which is the id of the article we want to show
     */
    public function oneArticle($articleID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select all articles from the database
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.articles WHERE id = ?");
        $req->execute(array($articleID));
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * This method delete an article from the database
     */
    public function deleteArticle($articleID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request delete an article from the database
        $req = $conn->prepare("DELETE  FROM `blog_highFive`.articles WHERE id = ?");
        $req->execute(array($articleID));

    }


    /**
     * This method delete an article from the database according to the user
     */

    public function deleteUserArticle($userID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request delete an article from the database
        $req = $conn->prepare("DELETE  FROM `blog_highFive`.articles WHERE user_id = ?");
        $req->execute(array($userID));

    }

    /**
     * This method delete an article from the articles_categories table because of the constraint
     * 
     */

    public function deleteArticleCategorie($articleID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request delete an article from articles_categories in the database
        $req = $conn->prepare("DELETE  FROM `blog_highFive`.articles_categories WHERE article_id = ?");
        $req->execute(array($articleID));

    }


    /**
     * To change the status of an article to published
     */

    public function changeStatus($artStatus, $articleID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request change the status of an article to published
        $req = $conn->prepare("UPDATE `blog_highFive`.articles SET `articles`.status = ? WHERE id = ?");
        $req->execute(array($artStatus, $articleID));
    }



    public function allAuthorArticle($authorID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select all articles from the database
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.articles WHERE user_id = ?");
        $req->execute(array($authorID));
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To get the last article
     */
    public function lastArticle()
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select the last article from the database
        $req = $conn->prepare("SELECT id FROM `blog_highFive`.articles ORDER BY id DESC LIMIT 1");
        $req->execute();
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To get the last article
     */
    public function lastThreeArticles()
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select last three articles from the database
        $req = $conn->prepare("SELECT `articles`.id , `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                            FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                            WHERE `articles_categories`.article_id = `articles`.id
                            AND `articles_categories`.categorie_id = `categories`.id
                            AND `articles`.user_id = `users`.id
                            AND NOT `categories`.categorie_title = 'Portrait'
                            ORDER BY create_at DESC
                            LIMIT 3");
        $req->execute();
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To get a specific article according to it id
     */

    public function oneSpecificArticle($articleTitle)
    {
        // connection to the database
        $conn = $this->connect();

        $req = $conn->prepare("SELECT `articles`.id, `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                                FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                                WHERE `articles_categories`.article_id = `articles`.id
                                AND `articles_categories`.categorie_id = `categories`.id
                                AND `articles`.user_id = `users`.id
                                AND `articles`.title = ?");

        $req->execute(array($articleTitle));
        $result = $req->fetchAll();

        return $result;

    }



    /**
     * This method is for getting an article with the user information and also the categorie of the article 
     */

    public function articleInfo($articleID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select all articles from the database
        $req = $conn->prepare("SELECT `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                            FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                            WHERE `articles_categories`.article_id = `articles`.id
                            AND `articles_categories`.categorie_id = `categories`.id
                            AND `articles`.user_id = `users`.id
                            AND `articles`.id = ?");
        $req->execute(array($articleID));
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To select some articles based on the user
     */

    public function userArticle($userID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select some articles based on the user
        $req = $conn->prepare("SELECT * FROM `blog_highFive`.articles WHERE user_id = ?");
        $req->execute(array($userID));
        $result = $req->fetchAll();

        return $result;

    }

    public function userArticleId($userID)
    {
        // connection to the database
        $conn = $this->connect();
        // This SQL request select some articles based on the user
        $req = $conn->prepare("SELECT id FROM `blog_highFive`.articles WHERE user_id = ?");
        $req->execute(array($userID));
        $result = $req->fetchAll();

        return $result;

    }

    /**
     * To select articles where categorie is portrait and the title of the article is different to "A propos de l'auteur du blog"
     */

    public function articlePortrait()
    {
        // connection to the database
        $conn = $this->connect();

        $req = "SELECT `articles`.id, `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                WHERE `categories`.categorie_title = 'Portrait'
                AND `articles_categories`.article_id = `articles`.id
                AND `articles_categories`.categorie_id = `categories`.id
                AND `articles`.user_id = `users`.id
                AND NOT `articles`.title = 'A propos de l&#039;auteur du blog'
                ORDER BY  `articles`.create_at DESC
                LIMIT 2";
        $forQuery = $conn->query($req);
        $result = $forQuery->fetchAll();

        return $result;

    }

    /**
     * To select the article about the author
     */

    public function blogAuthor()
    {
        // connection to the database
        $conn = $this->connect();

        $req = "SELECT `articles`.title, `articles`.body, `articles`.article_image, `articles`.status, `articles`.user_id, `articles`.create_at, `users`.username, `users`.role,`categories`.`categorie_title`
                FROM `blog_highFive`.articles, `blog_highFive`.categories, `blog_highFive`.users, `blog_highFive`.articles_categories
                WHERE `categories`.categorie_title = 'Portrait'
                AND `articles_categories`.article_id = `articles`.id
                AND `articles_categories`.categorie_id = `categories`.id
                AND `articles`.user_id = `users`.id
                AND `articles`.title = 'A propos de l&#039;auteur du blog'";
        $forQuery = $conn->query($req);
        $result = $forQuery->fetchAll();

        return $result;

    }





}