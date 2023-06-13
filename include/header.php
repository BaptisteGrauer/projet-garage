<header>
    <div class="logo">
        <a href="/index.php"><img src="/include/icons/home.png" class="icone"><img id="logo-R" src="/include/icons/garageR2.png"></a>
    </div>
    <nav class="menu-principal">
        <img id="icone-menu-principal" src="/include/icons/menu.png">
        <div class="menu-deroulant">
            <ul>
                <li>Menu principal</li>
                <li><a href="/index.php"><img src="/include/icons/home.png">Accueil</a></li>
                <li><a href="/voitures.php"><img src="/include/icons/car.png">Parcourir les voitures</a></li>
                <?php
                    if (isset($_COOKIE['nom'])){
                        echo "<li><a href='/compte/compte.php'><img src='/include/icons/account.png'>Bienvenue, "
                        . $_COOKIE['nom'] .
                        "<form method='POST' action='/logout.php' class='logout'><input type='submit' value='Se déconnecter'></form></li></a>";
                        echo "<li><a href='/compte/reservation.php'><img src='/include/icons/cart.png'>Mes réservations</a></li>";
                        if ($_COOKIE['admin'] == 1) {
                            echo "<li><a href='/admin/admin.php'><img src='/include/icons/settings.png'>Panneau d'administration</a></li>";
                        }
                    }
                    else {
                        echo "<li><a href='/connexion.php'><img src='/include/icons/account.png'>Se connecter</a></li>";
                    }
                ?>
                <li>
                    <form method="post" action="recherche.php" class ="recherche">
                        <img src="/include/icons/search.png"><input type="search" name="recherche" placeholder="Rechercher...">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>