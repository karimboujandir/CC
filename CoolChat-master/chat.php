<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat en ligne</title>
    <?php include_once('startsession.php'); ?>
    <?php include_once('verif-email.php'); ?>
    <link rel="stylesheet" href="./css/websocket.css">
    <link rel="stylesheet" href="./css/globale.css">


</head>

<body>

    <?php include_once('navbar.php'); ?>

    <!-- debut websocket -->
    <div id="chat">
        <div id="messages">
            <div class="message received">
                <!-- Message reçu -->
            </div>
            <div class="message sent">
                <!-- Message envoyé -->
            </div>
            <div class="message received">
                <!-- Message reçu -->
            </div>
            <!-- ... autres messages ... -->
        </div>
        <form id="formulaire">
            <input type="hidden" id="user" value="<?= $_SESSION['user']['email'] ?>">
            <input type="text" id="message" placeholder="Entrez votre message ici">
            <button type="submit">Envoyer</button>
        </form>
    </div>


    <!-- fin websocket -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./javascript/navbar.js"></script>
    <script src="./javascript/script.js"></script>
</body>

</html>