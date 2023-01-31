
<?php 
    require_once "../App/Views/partials/head.php";
    // echo "<pre>";
    // var_dump($theArticle);
    // echo "</pre>";
    ?>
    <title>Student Blog|Articles</title>
    </head>

<body>

<header>

    <?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="title_container">
    <div class="block_title">
        <h2>| Actualités </h2>
        <p>Découvrez les dernières actualités concernant la Highfive university. Nous vous offrons un aperçu regulièrement mis à jour des évenements internes et externes à l'université.
        </p>
    </div>
</div>

    
<main>
    <div class="container">
            <div class="forSection">

            <div class="forButton">
                <h3>Tous les articles par catégorie</h3>
                <button class="btnCategorie">All</button>
                <?php foreach($categoriesValue as $value): ?>
                <button class="btnCategorie"> <?=$value['categorie_title']?> </button>
                <?php endforeach; ?>

                <?php if(isset($_SESSION["userRole"]) && ($_SESSION["userRole"] === "Author" || $_SESSION["userRole"] === "Admin")) : ?>
                <a href="/articles/create">Créer un article</a>
                <?php endif; ?>
            </div>
                <section class="cards">
                    <?php foreach($theArticle as $article): ?>
                        <?php if($article['status'] === "Published"): ?>
                    <article class="card shadow">
                        <div>
                            <img src="/assets/<?php echo $article["article_image"] ?? '' ?>" alt="Image illustrant l'article">
                            <p class="<?php echo $article["categorie_title"] ?? '' ?>"><?php echo $article["categorie_title"] ?? '' ?></p>
                            <a href="/articles/show-article?id=<?php echo $article["id"]?>"><?php echo $article["title"] ?? '' ?></a>
                            <span> Publié le <?php echo (explode(' ', $article["create_at"]))[0]  ?> </span>
                            <span> | <?php echo $article["username"] ?? '' ?> | <?php echo $article["role"] ?? '' ?> </span>
                        </div>
                    </article>
                    <?php endif; ?>

                    <?php endforeach; ?>

                </section>

            </div>
        <?php require_once "../App/Views/partials/aside.php" ?>
        </div>
        </main>

        <?php require_once "../App/Views/partials/footer.php" ?>
        
        <script src="/js/actualitesjs.js"></script>
    </body>
</html>
