<?php
function login(){
    require "code/crud_users.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $mdp = $_POST["mdp"];
        if ($nom == ""OR $mdp == "") {
            return "Un des champs est vide, veuillez réessayer";
        }
        else{
            $mdp_hash = hash('sha256',$mdp);
            if (connexion($nom,$mdp_hash,$conn) == true) {
                // récupération de l'ID
                $sql = "SELECT id_utilisateur FROM utilisateurs WHERE nom='$nom'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $id = $row["id_utilisateur"];
                // récupération de l'adresse e-mail
                $sql = "SELECT email FROM utilisateurs WHERE nom='$nom'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $email = $row["email"];
                // récupération des droit de l'utilisateur
                $sql = "SELECT admin FROM utilisateurs WHERE nom='$nom'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $admin = $row["admin"];
                setcookie('id',$id,time() + 365*24*3600);
                setcookie('nom',$nom,time() + 365*24*3600);
                setcookie('admin',$admin,time() + 365*24*3600);
                header('Location: /compte/compte.php');
            }
            else {
                return "Identifiants de connexion invalides, veuillez réessayer";
            }
        }
    }
    return;
}
?>