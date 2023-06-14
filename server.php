<?php
// Vérifie si le message a etait soumis et n'est pas vide
if(isset($_POST['message']) && !empty($_POST['message'])) {
    // Récupère le contenu du message
    $message = $_POST['message'];

    // Indique le nom du fichier
    $file = 'messages.txt';

    // Ouvre le fichier en mode écriture pour ajouter du contenu
    $handle = fopen($file, 'a');

    // Enregistre le message dans le fichier, avec une nouvelle ligne
    fwrite($handle, $message . PHP_EOL);

    // Ferme le fichier
    fclose($handle);
}
?>
