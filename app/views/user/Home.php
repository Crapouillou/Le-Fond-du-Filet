<?php include 'layout/Header.php'; ?>
<main id="home">

    
    
<div class="slider">
    <?php foreach ($sliderArticles as $sliderArticle): ?>
        <div class="slide">
            <a href="?action=articledetails&id=<?php echo $sliderArticle['id_article']; ?>">
                <img src="<?php echo $sliderArticle['photo_link']; ?>" alt="<?php echo $sliderArticle['alt']; ?>">
            </a>
        </div>
    <?php endforeach; ?>

    <button class="btn btn-prev"><img src="public\images\precedent.png"></button>
    <button class="btn btn-next"><img src="public\images\suivant.png"></button>
</div>
        <section class="home-container">
        <?php foreach ($articles as $article): ?>
            <div class="card">
                <a href="?action=articledetails&id=<?php echo $article['id_article']; ?>"
                data-category-id="<?php echo $article['id_category']; ?>">
                    <div class="card-image">
                        <img src="<?php echo $article['photo_link']; ?>" alt="<?php echo $article['alt']; ?>">
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">
                            <?php echo $article['title']; ?>
                        </h2>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

        </section>
    
</main>
<?php include 'layout/Footer.php'; ?>