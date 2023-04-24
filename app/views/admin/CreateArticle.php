<?php include 'layout/Header.php'; ?>
<main id='createarticleform'>
<form  method="POST" enctype="multipart/form-data" action="?action=createarticle">
    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" maxlength="80" palceholder="Saisir le titre de l'article" required
>
    <br>
    <label for="paragraph">Paragraphe :</label>
    <textarea id="paragraph" name="paragraph" rows="30" cols="100" maxlength="4000" placeholder="Saisir le contenu de l'article (4000 caractères)" required
 ></textarea>
    <br>
    <label for="photo">Photo :</label>
    <input type="file" id="photo" name="photo" accept=".jpg, .jpeg">
    <br>
    <label for="altphoto">Description photo</label>
    <input type="text" id="alt" name="alt" placeholder="Saisir La description de la photo">
    <br>
    <label for="category">Catégorie :</label>
    <select id="category" name="id_category">
    <option value="">Toutes les catégories</option>
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['id_category']; ?>">
            <?php echo $category['category_name']; ?>
        </option>
    <?php endforeach; ?>
</select><br>





    <button type="submit" class="button"> Soumettre l'article</button>
</form>


</main>
<?php include 'layout/Footer.php'; ?>