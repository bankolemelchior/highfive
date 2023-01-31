<?php 
require_once "../App/Models/ArticlesModel.php";
require_once "../App/Models/UsersModel.php";
require_once "../App/Models/CategoriesModel.php";
require_once "../App/Models/CommentsModel.php";
require_once "../App/Models/ArticlesCategoriesModel.php";


class DashboardController {

   
    /**
     * 
     * This method change the status of an article to 'Published' or 'Pending' so as the article to be visible or not
     * It also for deleting and modifiying an article
     * 
     */

     public function publishArticle() {
         $status = new ArticlesModel();

        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change'])) {
            $articleID = $_POST['forId'];
            $artStatus;
            $articleStatus = $_POST['forStatus'];
            $articleImage = $_POST['articleImage'];
            

            if($_POST['change'] === "itStatus") {

                if($articleStatus === 'Pending') {
                    $artStatus = 'Published';
                    $status->changeStatus($artStatus, $articleID);

                    header("Location: /pages/dashArticle");
                }elseif($articleStatus === 'Published') {
                    $artStatus = 'Pending';

                    $status->changeStatus($artStatus, $articleID);

                    header("Location: /pages/dashArticle");

                }

            }elseif($_POST['change'] === "delete") {

                $status->deleteArticleCategorie($articleID);
                $status->deleteArticle($articleID);
                
                //To delete from the asset folder an image associate to an article
                unlink('../public/assets/'.$articleImage);

                header("Location: /pages/dashArticle");

            }elseif($_POST['change'] === "modify") {

                header("Location: /articles/create");
                
            }

        }

    }

    public function changeRole()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['change'])) {
            $userId = $_POST['userId'];
            $userRole = $_POST['userRole'];


            $theUser = new UsersModel();
            $theUser->updateRole($userRole, $userId);

            header("Location: /pages/usersProfil?uid=$userId");
        }
    }

    public function addCategorie()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['create'])) {
            $cat_name = $_POST['categorieName'];
            $cat_desc = $_POST['description'];

            $theCategorie = new CategoriesModel();
            $theCategorie->insertCategories($cat_name, $cat_desc);
            header("Location: /pages/dashCat?msg=vous avez ajouté une catégorie !");
        }
    }

    /**
     * To delete a user
     * Notice that a user is link to many table
     * So we have to delete everything about the user
     */

    public function deleteUser()
    {
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delUser'])) {
            $uId = $_POST['delUser'];


            $userArticle = new ArticlesModel();
            //To get all articles about a user
            $userArticleID = $userArticle->userArticleId($uId);
            
            //The iteration is to delete all articles about a user
            $categorieDeleted = new ArticlesCategoriesModel();            
            foreach($userArticleID as $id) {
                $categorieDeleted->deleteArticleCategorie($id);
            };

            $userCom = new CommentsModel();
            //To get all comment about a user
            $allUserComm = $userCom->userComments($uId);
            // var_dump($allUserComm);
            // die();

            //This iteration is to delete all comments about a user
            foreach($allUserComm as $id) {
                // echo'($allUserComm)';
                // die();
    
                $userCom->deleteComments($id);
            };
            
            //This is to delete articles about a user
            $userArticle->deleteUserArticle($uId);

            //To finaly delete a user
            $userDeleted = new UsersModel();
            $userDeleted->deleteUser($uId);
            
            header("Location: /pages/dash-users?msg=vous avez supprimer un utilisateur !");
        }else {
            header("Location: /pages/dash-users");
        }
    }
   


}
