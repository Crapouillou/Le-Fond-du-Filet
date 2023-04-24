<?php include 'layout/Header.php'; ?>
<main id="allarticle">


    <div class="filter-area">
        <label for="category">Catégorie :</label>
        <select id="category" name="id_category">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id_category']; ?>">
                    <?php echo $category['category_name']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
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