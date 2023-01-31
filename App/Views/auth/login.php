<?php require_once "../App/Views/partials/head.php";
        $activePage = 'connexion';

?>
    <title>Accueil | connexion</title>
</head>

<body>
<header>
<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<main>
<div class="login_container">

<div class="login_circle">
</div>

<div class="welcomeback">
    <h2>Welcome Back</h2>
    <p>Entrez votre adresse email et votre mot de passe pour vous connecter</p>
</div>

    <form action="/traitement-controller/logintraitement" method="POST" class="login_form">
        <p class="inputMsg"><?php echo $_GET['msg'] ?? '' ?></p>
        <div>
            <input type="email" name="useremail" placeholder="Votre adresse email" value="<?php echo $_GET['email'] ?? '' ?>">
        </div>
        <div>
            <input type="password" name="password" id="forPassword" placeholder="Votre mot de passe">
        </div>
        <div>
            <div>
                <input type="checkbox" name="remember">
                <label for="rememberMe">Rester connecter</label>    
            </div>
            <p><a href="#">Mot de passe oublié?</a></p>
        </div>
        <button type="submit" class="custom-btn btn-11" name="log">Se connecter</button>
        <p>Vous n'avez pas de compte? <a href="register">S'inscrire</a></p>
    </form>
    <span class="login_span"></span>

</div>

</main>


<?php require_once "../App/Views/partials/footer.php" ?>