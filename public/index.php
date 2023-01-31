<?php 


require_once "../Core/Router.php";

//Instance of the route
$router = new Router();
/**
 * Route list
 */

$router->add("", ["controller" => "Pages", "action" => "home"]);
$router->add("posts", ["controller" => "Posts", "action" => "create"]);
$router->add("posts/show", ["controller" => "Posts", "action" => "show"]);
$router->add("{controller}/{action}");
$router->add("admin/{controller}/{action}");
$router->add("{controller}/{id:\d+}/{action}");


// Request url
$url = $_SERVER["QUERY_STRING"];
// Call to dispatch method
$router->dispatch($url);






































//     $router = new Router();
//     $router->register('/', function () {
//         // return 'home';
//         require_once('../App/Views/layouts/home.php');
//     });
    
//     $router->register('/articles', function () {
//         // return 'pageArticles';
//         require_once('../App/Views/layouts/articles.php');
//     });

//     $router->register('/contact', function () {
//         // return 'pageArticles';
//         require_once('../App/Views/layouts/contact.php');
//     });

//     $router->register('/galerie', function () {
//         require_once('../App/Views/layouts/galerie.php');
//     });

//     $router->register('/connexion', function () {
//         require_once('../App/Views/layouts/homeConnexion.php');
//     });

//     $router->register('/login', function () {
//         require_once('../App/Views/auth/login.php');
//     });

//     $router->register('/logout', function () {
//         require_once('../App/Views/auth/logout.php');
//     });

//     $router->register('/register', function () {
//         require_once('../App/Views/auth/register.php');
//     });

//     $router->register('/profil', function () {
//         require_once('../App/Views/layouts/profil.php');
//     });

//     $router->register('/traitement', function () {
//         require_once('../App/Controllers/register.traitement.php');
//     });

//     $router->register('/log.traitement', function () {
//         // return 'pageArticles';
//         require_once('../App/Controllers/login.traitement.php');
//     });

    
//     // echo '<pre>';
//     // var_dump($router);
//     // var_dump($_SERVER['REQUEST_URI']);
//     // var_dump($_SERVER['QUERY_STRING']);
//     // echo '<pre>';
    
//     try {

//         echo $router->resolve($_SERVER['REQUEST_URI']);
//     } catch (Exception $e) {
//         echo $e->getMessage();
//     }
    
        
        
// ?>
