<?php 
    require_once "../App/Views/partials/head.php";


?>


        <title>Admin dashboard</title>
    </head>

<body>
   
<header>
    <?php require_once "../App/Views/partials/nav.php" ?>

</header>


   <main>
   <div class="container">
   <?php require_once "../App/Views/partials/dashaside.php" ?>


            <div class="forSection forDash">

                <section>
                    <p>
                        <!-- <i class="fa-solid fa-house"></i> -->
                    </p>

                    <div class="forNews shadow">
                        <table class="articleTab">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Statut</th>
                                    <th>Date de publication</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($articles as $article): ?>
                                <tr>
                                    <td> <a href="/articles/show-article?id=<?php echo $article['id'] ?? ''?>"><?php echo $article['title'] ?? ''?></a> </td>
                                    <td> <?php echo $article['username'] ?? ''?> </td>
                                    <td> <?php echo $article['status'] ?? ''?> </td>
                                    <td> <?php echo (explode(" ", $article['create_at']))[0]   ?? ''?> </td>
                                    <td> 
                                        <form action="/dashboard-controller/publishArticle" method="post"> 
                                            <button class="<?php echo $article['status']==='Pending'? 'publier': ($article['status'] ==='Published' ? 'retirer' : '') ;?>" id="changeStatus" name="change" value="itStatus"><?php echo $article['status']==='Pending'? 'Publier': 'Retirer' ?></button>
                                            <input type="hidden" name="forStatus" value="<?php echo $article['status'] ?>">
                                            <input type="hidden" name="forId" value="<?php echo $article['id'] ?>">
                                            <input type="hidden" name="articleImage" value="<?php echo $article['article_image'] ?>">
                                            <td> <button name="change" value="delete">Supprimer</button> </td>
                                            <td> <a href="/articles/modifyArticle?id=<?php echo $article['id'] ?? ''?>">Modifier</a> </td>
                                        </form> 
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>

    </div>
    </main>
    
    <?php require_once "../App/Views/partials/dashFooter.php" ?>

    </body>
</html>