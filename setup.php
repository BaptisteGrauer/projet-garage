<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/head.php'?>
    </head>
    <body>
        <?php include 'include/header.php'?>
        <section class="contenu">
            <h1>Installation du garage</h1>
            <p>
                Bienvenue sur la documentation sur l'installation de la base de données.<br />
                Pour mettre en place le site vous aurez besoin : 
            </p>
            <ul>
                <li>D'un serveur de base de données avec MySQL 8.0 ou supérieur d'installé,</li>
                <li>De modifier les variables se trouvant dans le fichier <strong>configuration.php</strong>, qui se trouve dans le dossier code.</li>
            </ul>
            <p>
                Ensuite, accédez à l'interface des requêtes SQL sur votre serveur, collez ces 4 requêtes SQL et exécutez les requêtes :
            </p>
            <div class="message-php">
                CREATE TABLE IF NOT EXISTS `reservations` (
                    `id_reservation` int NOT NULL AUTO_INCREMENT,
                    `id_voiture` int NOT NULL,
                    `id_utilisateur` int NOT NULL,
                    `date_reservation` date DEFAULT NULL,
                    PRIMARY KEY (`id_reservation`)
                ); <br />

                CREATE TABLE IF NOT EXISTS `utilisateurs` (
                    `id_utilisateur` int NOT NULL AUTO_INCREMENT,
                    `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `mdp` varchar(255) NOT NULL,
                    `admin` int DEFAULT '0',
                    PRIMARY KEY (`id_utilisateur`) USING BTREE,
                    UNIQUE KEY `nom_utilisateur` (`nom`) USING BTREE
                ); <br />

                INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `mdp`, `admin`) VALUES
                    (1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1); <br />

                CREATE TABLE IF NOT EXISTS `voitures` (
                    `id_voiture` int NOT NULL AUTO_INCREMENT,
                    `immatriculation` varchar(255) NOT NULL,
                    `marque` varchar(255) NOT NULL,
                    `modele` varchar(255) NOT NULL,
                    `categorie` varchar(255) NOT NULL DEFAULT 'voiture',
                    `date_mise_en_circulation` date NOT NULL,
                    `prix` int NOT NULL,
                    `date_entree_garage` date NOT NULL,
                    `puissance` int NOT NULL,
                    `type_carburant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'essence',
                    `description` text,
                    `photo` varchar(255) DEFAULT NULL,
                    `etat_reservation` int DEFAULT '0',
                    PRIMARY KEY (`id_voiture`) USING BTREE,
                    UNIQUE KEY `immatriculation` (`immatriculation`)
                ); <br />
            </div>
            <p>
                S'il n'y a pas eu d'erreur, vous pouvez normalement vous connecter avec le compte 'admin' (avec comme mot de passe 'admin') sur le site. <br />
                Je vous recommande vivement de changer le mot de passe du compte 'admin' dès votre première connexion dessus. <br />
            </p>
            <strong>Et voilà ! le site est prêt à être utilisé.</strong>
        </section>
        <?php include 'include/footer.php'?>
    </body>
</html>