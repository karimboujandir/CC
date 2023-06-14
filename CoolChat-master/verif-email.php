<?php
// Vérifie si la clé 'email' est dans la session de l'utilisateur
if (!isset($_SESSION['user']['email'])) {
    //Sinon
    header('Location: index.php');
    exit;
}
?>