<header>
    <div class="logo">
        <a href="/index.php"><img id="logo-R" src="/include/icons/garageR2.png"></a>
    </div>
    <form method="post" action="recherche.php" class ="recherche">
        <img src="/include/icons/search.png"><input type="search" name="recherche" placeholder="Rechercher...">
    </form>
    <nav class="menu-principal">
        <img id="icone-menu-principal" src="/include/icons/menu.png">
        <p>Menu principal</p>
        <ul>
            <li><a href="/index.php"><img src="/include/icons/home.png">Accueil</a></li>
            <li><a href="/categories/voitures.php"><img src="/include/icons/car.png">Parcourir les voitures</a></li>
            <?php
                if (isset($_COOKIE['nom'])){
                    echo "<li><a href='/compte/compte.php'><img src='/include/icons/account.png'>Bienvenue, " . $_COOKIE['nom'] . "</a></li>";
                    echo '<form method="POST" action="/logout.php" class="logout"><input type="submit" value="Se déconnecter"></form>';
                    echo "<li><a href='/compte/reservation.php'><img src='/include/icons/cart.png'>Réservation</a></li>";
                    if ($_COOKIE['admin'] == 1) {
                        echo "<li><a href='/compte/admin/admin.php'><img src='/include/icons/settings.png'>Panneau d'administration</a></li>";
                    }
                }
                else {
                    echo "<li><a href='/connexion.php'><img src='/include/icons/account.png'>Se connecter</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>