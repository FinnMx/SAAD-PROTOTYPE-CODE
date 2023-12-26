<?php
require_once("php/Manager.php");
session_start();
$_SESSION["Manager"]->isValidLogin($_POST["Email"],$_POST["Password"]);

if (!($_SESSION["Manager"]->isLoggedIn())) {
    header("Location: ./index.php");
}
if($_SESSION["Manager"]->isLoggedIn()) {
    header("Location: ./dashboard.php");
}
?>
