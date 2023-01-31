
<?php
require_once ('../App/Models/CategoriesModel.php');
require_once "../App/Models/ArticlesModel.php";
require_once "../App/Models/CommentsModel.php";



class Articles
{


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
 * To display the view for the page where an author can create article
 */
    public function create() {
        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();

        require_once("../App/Views/articles/article.php");
    }

/**
 * To display the view for the page where an author can create article
 */
    public function modifyArticle() {
        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();

        $articles = new ArticlesModel();
        $anArticle = $articles->oneArticle($_GET['id']);

        
        require_once("../App/Views/articles/modify.php");
    }

/**
 * To display the view for the page where an article is show
 */
    
    public function showArticle() {
        $articles = new ArticlesModel();
        $oneArticle = $articles->articleInfo($_GET['id']);
        //To get the all categories
        $categoriesValue = $this->forCategories();
        //To get the last three articles
        $theThreeArticle = $this->forThreeArticles();
        //To get the article about the bog author
        $theAuthor = $this->blogAuth();
        //To get all comments
        $comments = new CommentsModel();
        $comment = $comments->articleComments($_GET['id']);


        require_once("../App/Views/articles/showArticle.php");

    }
    
}
