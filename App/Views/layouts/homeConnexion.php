<?php 
    require_once "../App/Views/partials/head.php";
    $activePage = 'connexion';

?>
    <title>Page de connexion</title>
</head>

<body>
<header>
<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="portail">

    <div class="login_container">
    
        <div class="login custom-btn btn-11">
            <a href="/pages/login">Se connecter</a>
        </div>
    
        <div class="signup custom-btn btn-11">
            <a href="/pages/register">S'inscrire</a>
        </div>
    
    </div>

</div>


    
    <?php require_once "../App/Views/partials/footer.php" ?>