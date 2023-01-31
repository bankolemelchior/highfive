<?php 
require_once "../App/Views/partials/head.php";
// var_dump($_SESSION);

?>
        <title>Students Blog|Formulaire de contact</title>
    </head>

<body>

<header>

<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="title_container">
    <div class="block_title">
        <h2>| Mon profil </h2>
        <p>
            Dans cette section vous avez toutes les informations concernant votre profil d'utilisateur et les options de changement possible  
        </p>
    </div>
</div>


<main>

    <div class="container">
            <div class="forSection profil">

                    <div class="forNews shadow">

                        <img src="/assets/<?php echo $_SESSION["userpic"] ?? '' ?>" alt="Photo de profil de <?php echo $_SESSION["username"]; ?>">

                        <div>
                            <h3>Nom d'utilisateur : <?php echo $_SESSION["username"] ?? '' ?></h3>
                            <p>Adresse mail : <?php echo $_SESSION["useremail"] ?? '' ?> </p>
                            <p>Inscrit depuis le <?php echo explode(' ', $_SESSION['userCreation'])[0] ?? '' ?> </p>
                            <p><?php echo $_SESSION["userRole"] ?? '' ?> </p>

                            <div>
                                <a href="#">Changer mon mot de passe
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </a>

                                <a href="#">Changer la photo de profil
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </a>
                            </div>
                            
                        </div>
                    </div>
            </div>  
            <aside>
                <section class="recentArticle shadow">
                    <h3>Mes articles</h3>
                    <table class="authorAticles">
                            <thead>
                                <tr>
                                    <th>Titre des articles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php foreach($authorArticle as $val) : ?>
                            <tbody>
                                <tr>
                                    <td><a href="/articles/show-article?id=<?php echo $val["id"]?>"><?php echo $val['title']?></a></td>
                                    <td> <a href="/articles/modifyArticle?id=<?php echo $val['id'] ?? ''?>">Modifier</a> </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        
                </section>
                
        </aside>

    </div>
    </main>
    
    <?php require_once "../App/Views/partials/footer.php" ?>