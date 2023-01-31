<?php 
    require_once "../App/Views/partials/head.php";
    // var_dump($users);
    // die();
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
                    
                    <span class="total">Total users <?php echo $totalUser ?? '0' ?> </span>
                    <div class="forNews dashElement shadow">
                        <table class="articleTab">
                            <thead>
                                <tr>
                                    <th>Nom d'utilisateur</th>
                                    <th>Adresse email</th>
                                    <th>Rôle</th>
                                    <th>Date d'inscription</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                <tr>
                                    <td> <?php echo $user['username'] ?? ''?> </td>
                                    <td> <?php echo $user['email'] ?? ''?> </td>
                                    <td> <?php echo $user['role'] ?? ''?> </td>
                                    <td> <?php echo (explode(" ", $user['created_at']))[0]   ?? ''?> </td>
                                    <td> 
                                        <form action="/dashboard-controller/manageRole" method="post"> 
                                            <input type="hidden" name="forStatus" value="<?php echo $user['role'] ?>">
                                            <input type="hidden" name="userId" value="<?php echo $user['id'] ?>">
                                        </form> 
                                    </td>
                                    <td> <a href="/pages/usersProfil?uid=<?php echo $user['id'] ?>">Gestion des rôles</a> </td>
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

    <script src="/js/dashUserjs.js"></script>
    </body>
</html>