<?php 

     session_start();
     
require_once "UsersController.php";
require_once "../App/Models/UsersModel.php";
require_once "../App/Models/ArticlesModel.php";
require_once "../App/Models/CategoriesModel.php";
require_once "../App/Models/ArticlesCategoriesModel.php";
require_once "../App/Models/GalerieModel.php";
require_once "PictureController.php";


class TraitementController {


    /**
     * To sanitize the value from users
     * 
     * pass all variables through PHP's htmlspecialchars() function
     * Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
     * Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
     * 
     */

    public function form_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    

    /**
     * 
     * This method return all categories from the database 
     * 
     */
    public function toGetCategories() {
        $categories = new CategoriesModel();
        $categoriesValue = $categories->getCategories();
        return $categoriesValue;
    
    }


    /**
     * 
     * This method is about the register form 
     * 
     */

    public function registerTraitement() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
            $userName = $this->form_input($_POST["username"]);
            $email = $this->form_input($_POST["useremail"]);
            $password = $this->form_input($_POST["userpassword"]);
            $confPassword = $this->form_input($_POST["comfirmpassword"]);
            $checkbox = $_POST["policy"];
            $date = date("y-m-d H:i:s");

    
            $picture_name = $_FILES["userPic"]["name"];
            $picture_tmpname = $_FILES["userPic"]["tmp_name"];
            $picture_size =  $_FILES["userPic"]["size"];
            $picture_error = $_FILES["userPic"]["error"];


            $registerCtrl = new UsersController($userName, $email, $password, $confPassword, $checkbox);
            $registerCtrl->valideInput();
        
            $pic_Ctrl = new PictureController($picture_name, $picture_tmpname, $picture_size, $picture_error);
            $pictureName = $pic_Ctrl->insertPicture();
        
            $registeUser = new UsersModel();
            $existUserEmail = $registeUser->checkExistEmail($email);
            $existUsername = $registeUser->checkExistUsername($userName);


            if(count($existUserEmail) > 0) {
                header("Location: /pages/register?msg=Ce adresse email existe déja !&username=$userName&email=$email");
                exit();

            }elseif(count($existUsername) > 0) {
                header("Location: /pages/register?msg=Ce nom d'utilisateur n'est pas disponible !&username=$userName&email=$email");
                exit();
            }else {
                $registeUser->newUser($userName, $email, $password, $pictureName, "Suscriber", $date);
                header("Location: /pages/register?msg=Inscription validée");
            }
    
        }else {
            header("Location: /");
        }

    }


    /**
     * 
     * This method is about the login form 
     * 
     */

     public function loginTraitement() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["log"])) {
        
            $u_email = $this->form_input($_POST['useremail']);
            $u_password = $this->form_input($_POST['password']);
            $rememberMe = $_POST['remember'];
        
            
            $getConnected = new UsersModel();
            $user = $getConnected->connectUser($u_email, $u_password);


            //On vérifie la conformité du mot de passe
            $verify = password_verify($u_password, $user[0]['password']);
            if($verify === true) {

                $_SESSION['userId'] = $user[0]['id'];
                $_SESSION['username'] = $user[0]['username'];
                $_SESSION['useremail'] = $user[0]['email'];
                $_SESSION['userpic'] = $user[0]['user_picture'];
                $_SESSION['userRole'] = $user[0]['role'];
                $_SESSION['userCreation'] = $user[0]['created_at'];


                //To keep the session active by setting the cookies for connexion
                //The session is being active for 2 weeks
                if($rememberMe) {

                    setcookie('cookieName', $user[0]['email'], time() + 2592000, "/");
                    setcookie('cookiePass', $user[0]['password'], time() + 2592000, "/");

                }elseif(!$rememberMe) {

                    if(isset($_COOKIE['cookieName']) && isset($_COOKIE['cookiePass'])) {
                        setcookie('cookieName', $_SESSION['useremail'], time() - 2592000, "/");
                        setcookie('cookiePass', $u_password, time() - 2592000, "/");
                    }
                                    
                }


                //To set the session variables
                if(isset($_COOKIE['cookieName']) && isset($_COOKIE['cookiePass'])) {
                    $_SESSION['useremail'] = $_COOKIE['cookieName'];
                    $_SESSION['userPass'] = $_COOKIE['cookiePass'];
                    $_SESSION['userId'] = $user[0]['id'];
                    $_SESSION['username'] = $user[0]['username'];
                    $_SESSION['userpic'] = $user[0]['user_picture'];
                    $_SESSION['userRole'] = $user[0]['role'];
                    $_SESSION['userCreation'] = $user[0]['created_at'];
    
                } else {

                    $_SESSION['userId'] = $user[0]['id'];
                    $_SESSION['username'] = $user[0]['username'];
                    $_SESSION['useremail'] = $user[0]['email'];
                    $_SESSION['userpic'] = $user[0]['user_picture'];
                    $_SESSION['userRole'] = $user[0]['role'];
                    $_SESSION['userCreation'] = $user[0]['created_at'];
    
                }

                
                header("Location: /");
            }else {
                
                header("Location: /pages/login?msg=Email ou mot de passe incorrect&email=$u_email");
            }
            
        }else {
            header("Location: /");

        }

    }


    public function createArticle() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send"])) {
            $title = $this->form_input($_POST["articleTitle"]);
            $categories = $this->form_input($_POST["categories"]);
            $body = nl2br($this->form_input($_POST["articleBody"]));
            $userId = $_POST["userId"];
            $postCategorie = $_POST["categories"];

            
            $picture_name = $_FILES["articlePicture"]["name"];
            $picture_tmpname = $_FILES["articlePicture"]["tmp_name"];
            $picture_size =  $_FILES["articlePicture"]["size"];
            $picture_error = $_FILES["articlePicture"]["error"];
            $date = date("y-m-d H:i:s");

            $pic_Ctrl = new PictureController($picture_name, $picture_tmpname, $picture_size, $picture_error);
            $pictureName = $pic_Ctrl->insertPicture();
            
            $registerArticle = new ArticlesModel();
            $existArticle = $registerArticle->checkExistArticle($title);


            if(count($existArticle) > 0) {
                header("Location: /articles/create?msg=Le titre de ce article existe déja !&title=$title&body=$body");
                exit();

            }else {
                $registerArticle->insertArticle($title, $body, $pictureName, 'Pending', $userId, $date);
                //Id of the last article
                $lastArt = $registerArticle->lastArticle();

                $insertArtCat = new ArticlesCategoriesModel();
                $insertArtCat->insertCategorie($lastArt[0]['id'], $postCategorie);
                header("Location: /articles/create?msg=Article enregistré et en attente de validation");
            }
    
        }else {
            header("Location: /");
        }

    }


    public function modifyArticle() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["modify"])) {
            $title = $this->form_input($_POST["articleTitle"]);
            $categories = $this->form_input($_POST["categories"]);
            $body = nl2br($this->form_input($_POST["articleBody"]));
            $userId = $_POST["userId"];
            $artId = $_POST["artId"];
            $postCategorie = $_POST["categories"];

            $picture_name = $_FILES["articlePicture"]["name"];
            $picture_tmpname = $_FILES["articlePicture"]["tmp_name"];
            $picture_size =  $_FILES["articlePicture"]["size"];
            $picture_error = $_FILES["articlePicture"]["error"];
            $date = date("y-m-d H:i:s");

            $pic_Ctrl = new PictureController($picture_name, $picture_tmpname, $picture_size, $picture_error);
            $pictureName = $pic_Ctrl->insertPicture();

            $registerArticle = new ArticlesModel();
            $existArticle = $registerArticle->checkExistArticle($title);


            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";
            // exit();
                $registerArticle->updateArticle($title, $body, $pictureName, 'Pending', $userId, $date, $artId);
            
                if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') {

                    header("Location: /pages/dash-article?msg=Article enregistré et en attente de validation");
                }elseif(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Author') {

                    header("Location: /pages/profil?u=$userId&msg=Article enregistré et en attente de validation");

                }
                

        }else {
            header("Location: /");
        }

    }

    public function sendImage() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send"])) {
            $desc = $this->form_input($_POST["description"]);

            $picture_name = $_FILES["galerieimage"]["name"];
            $picture_tmpname = $_FILES["galerieimage"]["tmp_name"];
            $picture_size =  $_FILES["galerieimage"]["size"];
            $picture_error = $_FILES["galerieimage"]["error"];
            
            
            $pic_Ctrl = new PictureController($picture_name, $picture_tmpname, $picture_size, $picture_error);
            $img = $pic_Ctrl->insertPicture();
            
            $galerie = new GalerieModel();
            $galerie->insertToGalerie($img, $desc);

            header("Location: /pages/dash-image?msg=téléchargée !");

        }else {
            header("Location: /");
        }

    }

    public function deleteImage() {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
            $imageId =  $_POST['imageId'] ;     
            $imageName =  $_POST['imageName'];
                                    
            $galerie = new GalerieModel();
            $galerie->deleteImage($imageId);
            
            //To delete from the asset folder an image associate to the galerie
            unlink('../public/assets/'.$imageName);

            header("Location: /pages/galerie");

        }else {
            header("Location: /");
        }

    }




}
