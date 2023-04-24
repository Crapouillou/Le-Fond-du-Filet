<?php include 'layout/Header.php'; ?>
<main id='categoryform'>

<h1>Créer une nouvelle catégorie</h1>
    <form action="?action=createcategory" method="POST">
        <label for="category_name">Nom de la catégorie :</label>
        <input type="text" id="category_name" name="category_name" maxlength="80" placeholder="Saisir le nom de la catégorie" required>
        <br>
        <input type="submit" value="Soumettre">
    </form>
</main>
    <?php include 'layout/Footer.php'; ?>