<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en ligne</title>
    <?php include_once('startsession.php'); ?>
    <?php include_once('verif-email.php'); ?>
    <link rel="stylesheet" href="./css/globale.css">
    <link rel="stylesheet" href="./css/accueil.css">
</head>

<body>
    <?php include_once('navbar.php'); ?>
    <section>
        <div class="container">
            <div class="texte">
                <h2>Heureux de vous voir <?php echo $_SESSION['user']['pseudo']; ?></h2>
                <p>Bienvenue sur CoolChat,
                    le site de tchat en ligne où les conversations
                    deviennent extraordinaires.
                    Connectez-vous!
                    et découvrez un monde de rencontres passionnantes et de nouvelles amitiés qui n'attendent que vous.</p>
                <a class="liens" href="boujandir-karim@hotmail.fr" title="Contacter CoolChat">Nous contacter</a>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./javascript/navbar.js"></script>
</body>

</html>