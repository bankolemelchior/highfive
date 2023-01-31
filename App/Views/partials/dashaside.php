<aside>
        <section class="recentArticle shadow dash">
            <h3>Espace gestion</h3>
            <ul>
                <li class="<?php echo $activePage === 'dashHome' ? 'dashActive' : '' ?>">
                    <a href="/pages/dashboard">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <li class="<?php echo $activePage === 'dashArticle' ? 'dashActive' : '' ?>">
                    <a href="/pages/dash-article">
                        <i class="fa-solid fa-newspaper"></i>
                        Gestion des articles
                    </a>
                </li>
                <li class="<?php echo $activePage === 'dashUser' ? 'dashActive' : '' ?>">
                    <a href="/pages/dash-users">
                    <i class="fa-solid fa-users"></i>
                        Gestion des users
                    </a>
                </li>
                <li class="<?php echo $activePage === 'dashCat' ? 'dashActive' : '' ?>">
                    <a href="/pages/dash-cat">
                    <i class='fas fa-book-open'></i>
                        Gestion des catégories
                    </a>
                </li>
                <li class="<?php echo $activePage === 'dashImages' ? 'dashActive' : '' ?>">
                    <a href="/pages/dashImage">
                        <i class="fa-solid fa-images"></i>
                        Gestion des images
                    </a>
                </li>

        </section>
            
</aside>
