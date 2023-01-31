<?php 
require_once "../App/Views/partials/head.php";
// var_dump($users);

?>
        <title>Students Blog|Formulaire de contact</title>
    </head>

<body>

<header>

<?php require_once "../App/Views/partials/nav.php" ?>

</header>

<div class="title_container">
    <div class="block_title">
        <h2>| Profil de l'utilisateur </h2>
        <p>
           Vous êtes ici en tant qu'un administrateur. Dans cette section vous avez toutes les informations concernant le profil d'un utilisateur et les options de changement possible  
        </p>
    </div>
</div>


<main>

    <div class="container">
            <div class="forSection profil">

                    <div class="forNews shadow">

                        <img src="/assets/<?php echo $users[0]["user_picture"] ?? '' ?>" alt="Adjokè au vélo">

                        <div>
                            <h3>Nom d'utilisateur : <?php echo $users[0]["username"] ?? '' ?></h3>
                            <p>Adresse mail : <?php echo $users[0]["email"] ?? '' ?> </p>
                            <p>Inscrit depuis le <?php echo explode(' ', $users[0]["created_at"])[0] ?? '' ?> </p>
                            <p><?php echo $users[0]["role"] ?? '' ?> </p>

                            <div>
                                <form action="/dashboard-controller/changeRole" method="post">
                                    <input type="hidden" name="userId" value="<?php echo $users[0]["id"] ?? '' ?>">
                                    <select name="userRole" id="">
                                        <option value="...">...</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Author">Author</option>
                                        <option value="Suscriber">Suscriber</option>
                                    </select>
                                    <button type="submit" name="change">Changer le rôle</button>
                                </form>

                            </div>
                            
                        </div>
                    </div>
            </div>  
            <aside>
                <section class="recentArticle shadow">
                    <h3>Ses articles</h3>
                    <table class="authorAticles">
                            <thead>
                                <tr>
                                    <th>Titre des articles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php foreach($articles as $val) : ?>
                            <tbody>
                                <tr>
                                    <td><a href="/articles/show-article?id=<?php echo $val["id"]?? ''?>"><?php echo $val['title']?></a></td>
                                    <td> <a href="/articles/modifyArticle?id=<?php echo $val['id'] ?? ''?>">Modifier</a> </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        
                </section>
                
        </aside>

    </div>
    </main>
    
    <?php require_once "../App/Views/partials/footer.php" ?>