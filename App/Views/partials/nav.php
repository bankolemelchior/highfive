    <div class = "nav_logo">

        <div class="logo">
            <a href="/">
                <img src="/images/Logo-HighfiveBlog - Copie.png" alt="Logo highfive student blog">
            </a>
            <p>
                <i class='fas fa-bars'></i>                
            </p>
        </div>
        <nav>
            <ul>
                <li class="<?php if($activePage === 'home'){echo 'active';}?>" >
                    <a href="/">Accueil
                    <!-- <i class="fa-solid fa-house"></i> -->
                    </a>
                </li>
                <li class="<?php if($activePage === 'actualite'){echo 'active';}?>" >
                    <a href="/pages/actualites">Actualités
                    <!-- <i class="fa-solid fa-newspaper"></i> -->
                    </a>
                </li>
                <li class="<?php if($activePage === 'galerie'){echo 'active';}?>" >
                    <a href="/pages/galerie">Galerie
                    <!-- <i class="fa-solid fa-message"></i>                     -->
                    </a>
                </li>
                <?php if(isset($_SESSION["username"])) : ?>
                    <li>
                            <button class="btnCompte">
                                <div class="userpicture">
                                    <img src="/assets/<?php echo $_SESSION['userpic'] ?? '' ; ?> "  alt="Photo de profil de <?php echo $_SESSION["username"]; ?>">
                                </div>
                                <p>
                                    <?php echo $_SESSION["username"]; ?> 
                                </p>
                                    <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul> 
                            <li>
                                <a href="/pages/profil?u=<?php echo $_SESSION['userId'] ?? '' ; ?>">
                                    <i class="fa-solid fa-user"></i>
                                    Mon profil
                                </a>
                            </li>
                            <?php if(isset($_SESSION["userRole"]) && $_SESSION["userRole"] === 'Admin') : ?>
                            <li>
                                <a href="/pages/dashboard">
                                <i class="fa-solid fa-newspaper"></i>
                                    Dashboard
                                </a>
                            </li>
                            <?php endif;?>
                            <li>
                                <a href="/pages/logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                    Déconnexion
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php else : ?>
                <li class="<?php if($activePage === 'connexion'){echo 'active';}?>" >
                    <a href="/pages/connexion" title="Connexion">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>

    </div>
