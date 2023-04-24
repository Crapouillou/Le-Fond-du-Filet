<?php include 'layout/Header.php'; ?>
<main id="homeadmin">
<section class="section-page">
    <h3 class="title-admin">Bienvenue : <?php echo $_SESSION['handle']; ?></h3> 
    <a href="?action=logout" class="inputbutton">Se&nbsp;déconnecter</a>

    <a href="?action=home" class="inputbutton">Revenir&nbsp;au&nbsp;site</a>
</section>
</main>
<?php include 'layout/Footer.php'; ?>