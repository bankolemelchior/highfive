
        <aside>
                <section class="recentArticle shadow">
                    <h3>Articles récents</h3>
                    <?php foreach($theThreeArticle as $article): ?>
                    <div>
                        <img src="/assets/<?php echo $article['article_image']?? '' ?>" alt="image relative à l'article">
                        <a href="/articles/show-article?id=<?php echo $article['id'] ?? '' ?>"> <?php echo $article['title']?? '' ?></a>
                    </div>
                    <?php endforeach; ?>

                </section>
                
                <section class="rubriques shadow">
                    <h3>Nos rubriques</h3>
                <?php foreach($categoriesValue as $value): ?>
                <a href="/pages/actualites"> <?php echo $value['categorie_title'] ?? '' ?> </a>
                <?php endforeach; ?>

                </section>

                <section class="aboutAuthor shadow">
                    <h3> <?php echo $theAuthor[0]['title'] ?? '' ?></h3>
                   <div>
                    <img src="/assets/<?php echo $theAuthor[0]["article_image"]?? '' ?>" alt="Image de Melchior BANKOLE">
                </div> 
                <p> <?php echo $theAuthor[0]["body"]?? '' ?> </p>
                
            </section>

        </aside>
