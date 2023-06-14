<?php
include_once('startsession.php');


// Vérifie si les variables existent.
if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    // Échappe les caractères spéciaux dans les variables.
    $pseudo = $_POST['pseudo'];
    // Tente de sélectionner une entrée dans la base de données correspondante.
    $sql = "SELECT * FROM Inscrit WHERE pseudo = :pseudo";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        error();
    } else {
        if(password_verify($_POST['password'], $result['password'])) {
            // Si la connexion est réussie, on enregistre le pseudo de l'utilisateur dans une variable de session
            $_SESSION['user'] = $result;
            unset($_SESSION['user']['password']);
            // Redirection
            header('Location: accueil.php');
            exit;
        }
        error();
    }
}

function error()
{
?>
    <font color="red">Erreur : identifiant ou mot de passe incorrect.</font>
<?php
}
?>
