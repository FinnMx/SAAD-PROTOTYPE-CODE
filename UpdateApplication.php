<?php
require_once("php/AgentManager.php");
session_start();

if (!($_SESSION["AgentManager"]->isLoggedIn())) {
    header("Location: ./index.php");
}
if(isset($_GET["appid"])){
    $applicationData = array(
        "firstname" => $_POST["Firstname"],
        "lastname" => $_POST["Lastname"],
        "phonenumber" => $_POST["PhoneNumber"],
        "email" => $_POST["Email"],
        "address" => array(
            "postcode" => $_POST["Postcode"],
            "streetnumber" => $_POST["StreetNumber"],
            "address1" => $_POST["Address1"],
            "address2" => $_POST["Address2"],
            "city" => $_POST["City"],
            "country" => $_POST["Country"]),
        "visainfo" => array(
            "visatype" => $_POST["Visatype"],
            "visacountry" => $_POST["Visacountry"],
            "visalength" => $_POST["Visalength"])
    );

    $_SESSION["AgentManager"]->updateApplication(json_encode($applicationData),$_GET["appid"]);
    header("Location: ./SearchApplication.php?updatecomplete=true");
}

?>