<?php 
    require_once "../App/Views/partials/head.php";
?>
        <title>Student Blog</title>
    </head>

<body>
   
<header>
    <?php require_once "../App/Views/partials/nav.php" ?>

        <div class="heroImage">
            <img src="images/Couverture-Hero.png" alt="Couverture-Hero">
            <div class="elite">
                <p>L'elite du code à un nom
                    <span></span>
                </p>
                <p id="highfive"></p>
                <p class="univ" id="university">UNIVERSITY</p>
            </div>
        </div>

        <div class="quote">
            <q>
                Seul l'effort permanent, la détermination résolue, la volonté de bien faire, la maîtrise du cap fixé et l'obsession d'y arriver sont les conditions de la réussite.
            </q>
            <!-- <cite>Pr. Patrice TALON</cite> -->
        </div>

</header>


   <main>
   <div class="container">
            <div class="forSection">

                <div class="section-head">
                    <p>
                        <i class='fas fa-book-open'></i>
                    </p>
                    <h2>Actualités</h2>
                </div>
                <section class="forNews">

                    <article class="forNews shadow">

                        <img src="/assets/<?= $specifieArticle[0]['article_image'] ?>" alt="<?php echo $specifieArticle[0]["title"] ?? ''?>"  >

                        <div>
                            <h3><?php echo $specifieArticle[0]["title"] ?? ''?></h3>
                                <span>Publié le <?php echo (explode(' ', $specifieArticle[0]['create_at']))[0] ?? ''?></span>
                                <span>Par <?php echo $specifieArticle[0]['username'] ?? ''?>, <?php echo $specifieArticle[0]["role"] ?? ''?></span>
                            <p class="articleBody"><?php echo $specifieArticle[0]['body'] ?? ''?></p> 

                                <a href="/articles/show-article?id=<?php echo $specifieArticle[0]["id"] ?? ''?>">Lire l'article
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </a>
                        </div>
                    </article>
                </section>

                <div class="section-head">
                    <p>
                        <i class='fas fa-dice-five'></i>
                        <i class='fas fa-dice-one'></i>
                        <i class='fas fa-dice-six'></i>
                    </p>
                    <h2>Espace decouverte</h2>
                </div>
                <section class="discover">

                    <div class="discover-wrapper">
                        <?php foreach($Portrait as $thePortrait): ?>
                        <article class="discover-card shadow">
                            <img src="/assets/<?= $thePortrait['article_image'] ?>" alt="Brunice au vélo">
                            <div class="discover-card-txt">
                                <h3>
                                <a href="/articles/show-article?id=<?= $thePortrait['id'] ?>">
                                    <?= $thePortrait['title'] ?>
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </a>
                                </h3>
                            </div>
                        </article>
                        <?php endforeach; ?>

                    </div>
                </section>

            </div>
            
            <?php require_once "../App/Views/partials/aside.php" ?>
    </div>
    </main>
    <?php require_once "../App/Views/partials/footer.php" ?>

    <script src="/js/homejs.js"></script>
    </body>
</html>
    