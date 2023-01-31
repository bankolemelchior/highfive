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
                        <h2> Dashboard </h2>
                    </p>

                    <div class="forNews shadow">

                        <div>
                            <h1>ICI S'AFFICHE LES STATS</h1>
                        </div>
                    </div>
                </section>

            </div>

    </div>
    </main>
    
    <?php require_once "../App/Views/partials/dashFooter.php" ?>

    </body>
</html>