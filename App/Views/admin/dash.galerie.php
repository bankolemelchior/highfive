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
                        <form action="/traitement-controller/sendImage" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Ajouter une photo</legend>
                                <input type="file" name="galerieimage">
                                <div>
                                    <input type="text" name="description" placeholder="texte descriptif">
                                </div>
                            </fieldset>
                            <button class="custom-btn btn-11" type="submit" name="send">Upload</button>
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