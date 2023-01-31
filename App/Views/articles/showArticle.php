<?php 
    require_once "../App/Views/partials/head.php";
    // print_r($comment);
    // <?php echo (explode(' ', $comment[0]['create_at']))[0]
?>
    </head>

<body>
   
<header>
    <?php require_once "../App/Views/partials/nav.php" ?>
</header>

<div class="title_container">
    <div class="block_title">
        <h2>| <?php echo $oneArticle[0]['title'] ?? 'Titre de l\'article' ?> </h2>
        <span> Par <?php echo $oneArticle[0]['username'] ?? '' ?>, <?php echo $oneArticle[0]['role'] ?? '' ?> </span>
    </div>
</div>


<main>
    <div class="container">
        
        <div class="forSection forArticle">
            
            <img src="/assets/<?php echo $oneArticle[0]['article_image'] ?? '' ?>" alt="Image">
            <p> <?php echo $oneArticle[0]['body'] ?? 'Le corps de l\'article' ?> </p>

            <div class="displayComment">
                <fieldset>
                    <legend id="commentLegend">Commentaires (<?php echo count($comment) ?? '' ?>)</legend>
                        <?php foreach($comment as $val) : ?>
                        <div class="showComment">
    
                        <div>
                            <div class="imgAndName">
                                <p>
                                    <img src="/assets/<?php echo $val['user_picture'] ?>" alt="avatar">
                                </p>
                                <h4><?php echo $val['username'] ?></h4>
                                <p> <?php echo (explode(' ', $val['create_at']))[0] ?> </p>
                            </div>
                        <p> <?php echo $val['comment'] ?> </p>
                        </div>
                        <?php if(isset($_SESSION['username']) && ($_SESSION['username'] === $val['username'] || $_SESSION['userRole'] === 'Admin')) : ?>
                            <form id="deleteForm">
                                <input type="hidden" name="commentId" value="<?= $val['id'] ?>">
                                <input id="articleId" type="hidden" name="artID" value="<?=$_GET['id'] ?>">
                                <button id="deleteCom" type="submit" name="deleteBtn">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <?php endforeach;?>
                    </fieldset>
            </div>

            <div class="comments">
                <form class="commentsForm" >
                    <div class="commentsContent">
                        <input type="hidden" id="artId" name="artId" value="<?php echo $_GET['id'] ?? '' ?>">
                        <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['userId'] ?? '' ?>">
                        <textarea id="forComment" name="theComment" cols="30" rows="10" placeholder="Votre commentaire"></textarea>
                        <div>
                            <button type="submit" name="comment" class="commentBtn" <?php if(!isset($_SESSION['username'])){echo 'disabled';}?> title = " <?php if(!isset($_SESSION['username'])){echo 'Vous n\'êtes pas connecté !';} ?>">Envoyer</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>



    <?php require_once "../App/Views/partials/aside.php" ?>
    </div>
</main>

    <?php require_once "../App/Views/partials/footer.php" ?>

    <script src="/js/showArticlejs.js"></script>
    </body>
</html>

