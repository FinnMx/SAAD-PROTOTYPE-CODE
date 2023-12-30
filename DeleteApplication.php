<?php
require_once("php/Manager.php");
session_start();

if (!($_SESSION["Manager"]->isLoggedIn())) {
    header("Location: ./index.php");
}

if(isset($_GET["appid"])){
    $_SESSION["Manager"]->deleteApplication($_GET["appid"]);
    header("Location: ./ViewApplications.php");
}

?>