<?php
@session_start();

require_once "../App/Models/CategoriesModel.php";
require_once "../App/Models/ArticlesModel.php";
require_once "../App/Models/UsersModel.php";
require_once "../App/Models/GalerieModel.php";

/**
 * 
 * This class gather all methods about the views pages
 * 
 */


class Pages
{
/**
 * This method is to get the articles categorie
 */
    public function forCategories() {
        //To get the all categories
        $categories = new CategoriesModel();
        $categoriesValue = $categories->getCategories();
        return $categoriesValue;
    }

    /**
     * This method is to get the last three articles and display it in the aside section
     */
    public function forThreeArticles() {
        //To get the last three articles
        $articles = new ArticlesModel();
        $theThreeArticle = $articles->lastThreeArticles();
        return $theThreeArticle;
    }

    /**
     * This method is to get the article about the bog author
     */
    public function blogAuth() {
        //To get the article about the bog author
        $articles = new ArticlesModel();
        $blogAuthor = $articles->blogAuthor();
        return $blogAuthor;
    }

    /**
     * The view about the home page
     */

    public function home() {
        $activePage = 'home';

        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();

        //To get the article about the bog author
        $theAuthor = $this->blogAuth();

        $articles = new ArticlesModel();
        $specifieArticle = $articles->oneSpecificArticle('Pagnifik day à Highfive');
        $Portrait = $articles->articlePortrait();

        require_once("../App/Views/layouts/home.php");
    }
        
    /**
     * The view about the galerie
     */

    public function galerie() {
        $activePage = 'galerie';

        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();
        //To get the images from the database
        $forPictures = new GalerieModel();
        $pictures = $forPictures->selectAllImage();                
        

        require_once("../App/Views/layouts/galerie.php");
    }

    public function actualites() {
        //This variable is to set the actif page
        $activePage = 'actualite';
        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();
        //To get the all articles
        $articles = new ArticlesModel();
        $theArticle = $articles->allArticle();
    
    
        require_once("../App/Views/layouts/articles.php");
    }

    public function contact() {
        $activePage = 'contact';
        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();


        require_once("../App/Views/layouts/contact.php");
    }
    
    public function connexion() {

        require_once("../App/Views/layouts/homeConnexion.php");
    }

    public function login() {
        require_once("../App/Views/auth/login.php");
    }

    public function register() {
        require_once("../App/Views/auth/register.php");
    }

    public function logout() {
        require_once("../App/Views/auth/logout.php");
    }

    public function profil() {
        $articles = new ArticlesModel();
        
        $authorArticle = $articles->allAuthorArticle($_GET['u']);
        require_once("../App/Views/layouts/profil.php");
    }

    public function dashboard() {
        $activePage = "dashHome";

        if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') {
            
            require_once("../App/Views/admin/dashboard.php");
        } else {
            $this->page404();
            // header("Location /pages/page404");

        }
    }

    public function dashArticle() {
        $activePage = "dashArticle";

        $forAllarticles = new ArticlesModel();
        $articles = $forAllarticles->allArticle();

        if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') {
            
            require_once("../App/Views/admin/dash.article.php");
        } else {
            $this->page404();
            // header("Location /pages/page404");
        }
 
    }

    public function dashUsers() {
        $activePage = "dashUser";

        $forAllUsers = new UsersModel();
        $users = $forAllUsers->AllUsers();
        $totalUser = count($users);

        if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') {
            
            require_once("../App/Views/admin/dash.users.php");
        } else {
            $this->page404();
            // header("Location /pages/page404");

        }
    }

    public function dashImage() {
        $activePage = "dashImages";


        require_once("../App/Views/admin/dash.galerie.php");
    }

    public function dashCat() {
        $activePage = "dashCat";

        require_once("../App/Views/admin/dash.cat.php");
    }
    
    public function usersProfil() {
        $activePage = "uProfil";

        $forUser = new UsersModel();
        $users = $forUser->oneUser($_GET['uid']);

        $userArticles = new ArticlesModel();
        $articles = $userArticles->allAuthorArticle($_GET['uid']);

        if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') {
            
            require_once("../App/Views/auth/changeRole.php");
        } else {
            $this->page404();
            // header("Location /pages/page404");

        }
    }

    public function page404() {

        require_once("../App/Views/layouts/page404.php");
    }


}
