<?php include 'layout/Header.php'; ?>
<main id="articledetails">

 


    <div class="filter-area">
      <label for="category">Catégories </label>
      <select name="category" id="category">
        <option value="free">Free</option>
        <option value="lolo">Lolo</option>
        <option value="Karl">Karl</option>
        <option value="all" selected>Toutes</option>
      </select>
      <input type="checkbox" id="scales" name="scales">
      <label for="scales">Scales</label>

      <input type="checkbox" id="scales" name="scales">
      <label for="scales">Scales</label>

      <input type="checkbox" id="scales" name="scales">
      <label for="scales">Scales</label>

      <input type="checkbox" id="scales" name="scales">
      <label for="scales">Scales</label>

    </div>






    <section>
      <div class="article">
        
      <h3><?= $article['title'] ?></h3>
        <div class="article-image">
        <img src="<?= $article['photo_link'] ?>" alt="<?= $article['photo_alt'] ?>">
        </div>
        <div class="article-content">
        <p><?= $article['paragraph'] ?></p>

        </div>
      </div>

    </section>










  
</main>
<?php include 'layout/Footer.php'; ?>