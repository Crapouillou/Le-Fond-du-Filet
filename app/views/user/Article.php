<?php include 'layout/Header.php'; ?>
<main id="articledetails">











  <section>
    <div class="article">

      <h3>
        <?= $article['title'] ?>
      </h3>
      <div class="article-image">
        <img src="<?= $article['photo_link'] ?>" alt="<?= $article['photo_alt'] ?>">
      </div>
      <div class="article-content">
        <p>
          <?= $article['paragraph'] ?>
        </p>

      </div>
    </div>

  </section>











</main>
<?php include 'layout/Footer.php'; ?>