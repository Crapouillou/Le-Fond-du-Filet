<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body class="container">

<header id="bandeau">
    <div class="logo">
        <img src="public\images\logo1.svg" alt="Logo">
    </div>
    <div class="center-header">
        <nav id="menuprincipal">

            <!--menu principal >600px -->
            <ul class="menunormal">
                <li><a href="?action=homeadmin">Accueil</a></li>
                
                <li><a href="?action=createarticleform">Création d'article</a></li>
                
                <li><a href="?action=categoryform">Catégorie</a></li>
            </ul>


            <!--menu burger-->
            <div id="menu_burger" class="menu_burger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <!-- menu ouvert / fermé smartphones -->
            <section id="nav-smartphone" class=" nav-smartphone ">
                <a class="bouton-fermer" id="bouton-fermer" clas="bouton-ferme">&times;</a>
                <div class="nav-smartphone-liens">
                    <li class="menu"><a href="?action=homeadmin">Accueil</a></li>
                    
                    <li class="menu"><a href="?action=createarticleform">Création d'article</a></li>
                    <li class="menu"><a href="?action=categoryform">Catégorie</a></li>
                </div>
            </section>
        </nav>


        <div class="search-container">
            <form action="/search" method="get">
                <input type="text" placeholder="Rechercher..." name="search">
            </form>
        </div>
    </div>
    <div class="auth">
    <?php
if(isset($_SESSION['handle'])){
    // Si l'utilisateur est connecté, afficher son nom d'utilisateur et un lien vers user.php
    echo '<div class="auth">
            <p>Bienvenue, '.$_SESSION['handle'].' !</p>
            <a href="index.php?action=registration"><img src="public/images/connexion.png" alt=""></a>
          </div>';
} else {
    // Si l'utilisateur n'est pas connecté, afficher un lien vers login.php
    echo '<div class="auth">
            <a href="index.php?action=login"><img src="public/images/connexion.png" alt=""></a>
          </div>';
}
?>
</div>

    


</header>