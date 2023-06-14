<?php

include_once('./CoolChat-master/startsession.php');

if(isset($_GET['recupererUserEmail']) && !empty($_GET['recupererUserEmail'])) {
    $sql = "INSERT INTO messages(username, message, created_at, user_id) VALUES(:username, :message, NOW(), :user_id)";
    $req = $dbh->prepare($sql);
    $req->bindParam(":username", $_SESSION['user']['pseudo']);
    $req->bindParam(":message", $_GET['message']);
    $req->bindParam(":user_id", $_SESSION['user']['email']);
    $req->execute();
}
?>