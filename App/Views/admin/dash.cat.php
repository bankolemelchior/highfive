<?php 
    require_once "../App/Views/partials/head.php";
    // echo "<pre>";
    // var_dump($forDate);
    // echo "</pre>";

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

                    <div class="forNews dashGalerie shadow">
                        <form action="/dashboard-controller/addCategorie" method="post">
                            <fieldset>
                                <legend>Ajouter une catégorie</legend>
                                <input type="text" name="categorieName" placeholder="Le titre de la catégorie" required>
                                <div>
                                    <textarea name="description" id="" cols="30" rows="10" placeholder="texte descriptif" required></textarea>
                                </div>
                            </fieldset>
                            <button class="custom-btn btn-11" type="submit" name="create">Créer</button>
                        </form>
                        <p><?php echo $_GET['msg'] ?? '' ?></p>
                    </div>
                </section>

            </div>
    </div>
    </main>
    
    <?php require_once "../App/Views/partials/dashFooter.php" ?>

    </body>
</html>