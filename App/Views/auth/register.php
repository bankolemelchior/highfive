<?php require_once "../App/Views/partials/head.php";
        $activePage = 'connexion';

?>
    <title>Page d'inscription</title>
</head>

<body>
<header>
<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<main>

    <div class="login_container register_form">
    
    <div class="login_circle">
        </div>
    
        <div class="welcomeback">
            <h1>Inscription</h1>
            <p>Remplissez le formulaire d'inscription</p>
        </div>
    
            <form action="/traitement-controller/registertraitement" method="post" class="login_form" enctype = "multipart/form-data">
                <p class="inputMsg"><?php echo $_GET['msg'] ?? '' ?></p>
                <div>
                    <input type="text" name="username" placeholder="Entrez un nom d'utilisateur" value="<?php echo $_GET["username"] ?? '' ?>" >
                </div>
                <div>
                    <input type="email" name="useremail" placeholder="Entrez un email valide" value="<?php echo $_GET["email"] ?? '' ?>" >
                </div>
                <div>
                    <input type="password" name="userpassword" placeholder="Entrez un mot de passe">
                </div>
                <div>
                    <input type="password" name="comfirmpassword" placeholder="Confirme votre mot de passe">
                </div>
                <div>
                    <p>
                        <label for="userPic">Choisissez une photo pour votre profil (Taille maximale 3Mo. Extensions acceptées:jpeg, jpg, gif, png) </label>
                    </p>
                    <input type="file" name="userPic" id="userPic">
                </div>
                <div>
                    <input type="checkbox" name="policy">
                    <label for="rememberMe">J'accepte les <a href="#">Termes & Conditions d'utilisation</a> ainsi que la <a href="#">Politique de Confidentialité</a></label>    
                </div>
                <button type="submit" class="custom-btn btn-11" name="submit">Login</button>
                <p>Vous avez déja un compte? <a href="login">Se connecter</a></p>
            </form>
            <span class="login_span"></span>
    </div>
</main>



        <?php require_once "../App/Views/partials/footer.php" ?>