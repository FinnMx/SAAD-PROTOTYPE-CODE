<?php
require_once("php/AgentManager.php");
session_start();
$_SESSION["AgentManager"]->isValidLogin($_POST["StaffID"],$_POST["Password"]);


if (!($_SESSION["AgentManager"]->isLoggedIn())) {
    header("Location: ./AgentLogin.php");
}
if($_SESSION["AgentManager"]->isLoggedIn()) {
    header("Location: ./AgentDashboard.php");
}
?>