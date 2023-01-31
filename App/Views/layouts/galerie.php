<?php require_once "../App/Views/partials/head.php";
    // var_dump($totallikes);

?>

        <title>Student Blog|Galerie</title>
    </head>

<body>

<header>

<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="title_container">
    <div class="block_title">
        <h2>| Galerie </h2>
        <p>Explorez les moments marquants à Highfive university à travers notre section galerie. Vous y trouverez une selection de photos et de vidéos capturant des sujets variés allant du codage à la culture en passant par les évenements locaux.
        </p>
    </div>
</div>

    
<main>
   <div class="container">
            <div class="forSection galerieContainer">

                <section class="forGalerie">
                    <?php foreach($pictures as $picture): ?>
                        <div title="<?= $picture['alt'] ?>" class="forNews galerieCard shadow">
                            <img id="theImage" src="/assets/<?= $picture['image_name'] ?>" alt="<?= $picture['alt'] ?>">
                            <?php if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'Admin') : ?>
                            <form action="/traitement-controller/deleteImage" method="post">
                                <input type="hidden" name="imageId" value="<?= $picture['id'] ?>">
                                <input type="hidden" name="imageName" value="<?= $picture['image_name'] ?>">
                                <button class="deleteImages" type="submit" name="delete">
                                <i class="fas fa-plus-circle"></i>
                                </button>
                            </form>
                            <?php endif ;?>
                        </div>
                        <?php endforeach; ?>

                        <div class="galerieModal">
                            <span class="closeImage">&times;</span>
                            <img class="modal-content" id="forImg">
                            <div id="caption"></div>
        
                        </div>
                </section>



            </div>

    <?php require_once "../App/Views/partials/aside.php" ?>
    </div>
    </main>

<?php require_once "../App/Views/partials/footer.php" ?>

<script src="/js/galeriejs.js"></script>
    </body>
</html>

