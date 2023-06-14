<?php
include_once('startsession.php');
include_once('verif-email.php');
// Vérifie si un l'id  a été passé en paramètre
if (!isset($_GET['id'])) {
    // sinon
    header('Location: accueil.php');
    exit;
}

// Récupére l'id
$id = $_GET['id'];

// Récupére les anciennes valeurs dans la bd
$sql = "SELECT * FROM Inscrit WHERE email = ?";
$stmt = $dbh->prepare($sql);
$stmt->execute([$id]);
$oldUser = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // On récupère les valeurs
    $nom = isset($_POST['nom']) ? $_POST['nom'] : $oldUser['nom'];
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $oldUser['prenom'];
    $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : $oldUser['pseudo'];
    $password = isset($_POST['password']) ? $_POST['password'] : $oldUser['password'];
    $commentaire = isset($_POST['commentaire']) ? $_POST['commentaire'] : $oldUser['commentaire'];
    $statut = isset($_POST['statut']) ? $_POST['statut'] : $oldUser['statut'];

    $sql = "UPDATE Inscrit SET nom = ?, prenom = ?, pseudo = ?, password = ?, commentaire = ?, statut = ? WHERE email = ?";

    // Prépare la requête
    $stmt = $dbh->prepare($sql);

    // Lier les valeurs des paramètres
    $stmt->execute([$nom, $prenom, $pseudo, $password, $commentaire, $statut, $id]);

    // Mise a jours des infos avec les nouvelles valeurs
    // Récupérer les nouvelles valeurs de l'utilisateur depuis la bd
    $sql = "SELECT * FROM Inscrit WHERE email = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $updatedUser = $stmt->fetch(PDO::FETCH_ASSOC);

    // Mets a jours avec les nouvelles valeurs
    $_SESSION['user'] = $updatedUser;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="./css/globale.css">
    <link rel="stylesheet" href="./css/compte.css">

</head>

<body>
    <?php include_once('navbar.php'); ?>

    <div class="conteneur">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="compte.php?id=<?php echo $id; ?>" method="post">
                    <h2>Modifier</h2>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : (isset($oldUser['nom']) ? $oldUser['nom'] : ''); ?>">

                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : (isset($oldUser['prenom']) ? $oldUser['prenom'] : ''); ?>">

                    <label for="pseudo">Pseudo :</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php echo isset($_POST['pseudo']) ? $_POST['pseudo'] : (isset($oldUser['pseudo']) ? $oldUser['pseudo'] : ''); ?>" required>

                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : (isset($oldUser['password']) ? $oldUser['password'] : ''); ?>" required>

                    <label for="commentaire">À propos de moi :</label>
                    <textarea name="commentaire" id="commentaire"><?php echo isset($_POST['commentaire']) ? $_POST['commentaire'] : (isset($oldUser['commentaire']) ? $oldUser['commentaire'] : ''); ?></textarea>

                    <label for="statut">Statut :</label>
                    <select name="statut" id="statut">
                        <option value="1" <?php if (isset($_POST['statut']) && $_POST['statut'] == '1') echo 'selected'; ?>>Connecté</option>
                        <option value="0" <?php if (isset($_POST['statut']) && $_POST['statut'] == '0') echo 'selected'; ?>>Déconnecté</option>
                    </select>

                    <button class="modifier" type="submit" name="modification">Modifier</button>
                </form>
            </div>

            <div class="form-container sign-in-container">
                <form>
                    <h2>Profil</h2>
                    <h3>Pseudo:</h3>
                    <p class="info"><?php echo $_SESSION['user']['pseudo']; ?></p>
                    <h3>Nom:</h3>
                    <p class="info"><?php echo $_SESSION['user']['nom']; ?></p>
                    <h3>Prénom:</h3>
                    <p class="info"><?php echo $_SESSION['user']['prenom']; ?></p>
                    <h3>A propos de moi:</h3>
                    <p class="info"><?php echo $_SESSION['user']['commentaire']; ?></p>
                    <h3><?php echo $_SESSION['user']['statut']; ?></h3>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h2 class="blanc">Mes informations</h2>

                        <button class="ghost" id="signIn">voir profil</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h2 class="blanc"><?php echo $_SESSION['user']['pseudo']; ?></h2>
                        <p>Un peu de fraicheur ? modifier votre profil !</p>
                        <button class="ghost" id="signUp">Modifier</button>
                        <button><a class="blanc" href="supprimer.php?id=<?php echo $_SESSION['user']['email']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?')">Supprimer
                                mon compte</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./javascript/navbar.js"></script>
    <script src="./javascript/connexion.js"></script>
</body>

</html>