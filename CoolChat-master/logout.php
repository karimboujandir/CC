<?php

// Déconnexion de l'utilisateur
session_start();

// Détruire complètement la session
session_destroy();

// Rediriger vers la page de connexion ou autre
header('Location: index.php');
exit;
?>

