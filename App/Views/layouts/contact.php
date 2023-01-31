<?php require_once "../App/Views/partials/head.php";
?>
        <title>Student Blog|Formulaire de contact</title>
    </head>

<body>

<header>

<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="title_container">
    <div class="block_title">
        <h2>| Nous contacter </h2>
        <p>
            Si vous avez une question, une recommandation ou une proposition vous pouvez nous contacter sur cette page.
        </p>
    </div>
</div>

    
<main>
<div class="container">
    <div class="forSection">

    <div class="block_contact">
        <p>Bienvenue sur le blog des étudiants de la HIGHFIVE University</p>

<p></p>

<p>Le site est aussi ouvert à toute proposition de partenariat et d’échange avec d’autres sites dans la même thématique. On répond généralement dans les 24H à tous les messages reçus.</p>

<p>Vous pouvez aussi nous contacter directement sur nos pages Facebook ou Instagram pour une réponse plus rapide.</p>


            <form action="#" method="post" class="contact_form">
                <div>
                    <div>
                        <label for="contactName">Votre nom</label>
                    </div>
                    <input type="text" id="contactName" name="contact_name">
                </div>

                <div>
                    <div>
                        <label for="contactEmail">Votre adresse email</label>
                    </div>
                    <input type="email" id="contactEmail" name="contact_email">
                </div>
                
                <div>
                    <div>
                        <label for="contactSujet">Sujet</label>
                    </div>
                    <input type="text" id="contactSujet" name="contact_sujet">
                </div>

                <div>
                    <div>
                        <label for="message">Votre message</label>
                    </div>
                    <textarea name="message" id="message" cols="70" rows="10"></textarea>
                </div>

                <button type="submit" class="custom-btn btn-11" name="send">Envoyer</button>
            </form>
    </div>
    </div>
    <?php require_once "../App/Views/partials/aside.php" ?>
</div>

</main>
    
    <?php require_once "../App/Views/partials/footer.php" ?>