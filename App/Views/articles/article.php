<?php 
    require_once "../App/Views/partials/head.php";
?>

        <title>Student Blog|Actualités</title>
    </head>

<body>

<header>

<?php require_once "../App/Views/partials/nav.php" ?>

</header>


<div class="title_container">
    <div class="block_title">
        <h2>| Rédacteur </h2>
        <p>
            Vous êtes dans cette section en tant que redacteur. Les articles resteront en attent et seul les admins peuvent les mettre en ligne aprés validation.
        </p>
    </div>
</div>

    
<main>
<div class="container">
    <div class="forSection">

    <div class="block_contact">
        <p>Bienvenue sur le blog des étudiants de la HIGHFIVE University</p>

<p>Utilisez le formulaire ci-dessous pour créer votre article.</p>



            <form action="/traitement-controller/createArticle" method="post" class="article_form" enctype="multipart/form-data">
            <p class="inputMsg"><?php echo $_GET['msg'] ?? '' ?></p>
                <div>
                    <input type="hidden" name="userId" value=" <?php echo $_SESSION['userId'] ?? ''?> " required>
                    <div>
                        <label for="mainTitle">Titre principal</label>
                    </div>
                    <input type="text" id="mainTitle" name="articleTitle" value="<?php echo $_GET['title'] ?? '' ?>" required>
                </div>

                <div>
                    <div>
                        <label for="categorie">La catégorie de l'article</label>
                    </div>
                    <select name="categories" id="categorie">
                        <option value="">...</option>
                        <?php foreach($categoriesValue as $value): ?>
                        <option value="<?=$value['id']?>"> <?=$value['categorie_title']?> </option>
                        <?php endforeach;?>
                    </select>
                </div>
                
                <div>
                    <div>
                        <label for="">Le corps de l'article</label>
                    </div>
                    <textarea name="articleBody" id="body" cols="70" rows="10" required></textarea>
                </div>

                <div>
                    <input type="file" name="articlePicture" id="" required>
                </div>

                <button type="submit" class="custom-btn btn-11" name="send">Envoyer</button>
            </form>
    </div>
    </div>
    <?php require_once "../App/Views/partials/aside.php" ?>
</div>

</main>
    
    <?php require_once "../App/Views/partials/footer.php" ?>