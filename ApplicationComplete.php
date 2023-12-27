<?php
require_once("php/Manager.php");
session_start();

if (!($_SESSION["Manager"]->isLoggedIn())) {
    header("Location: ./index.php");
}

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
        "visatype" => $_GET["type"],
        "visacountry" => $_GET["country"],
        "visalength" => $_GET["length"])
);

foreach($applicationData as $x){
    if(gettype($x) == "array"){
        foreach($x as $i){
            if(empty($i)){
                echo "here";
                header("Location: ./Application.php?type=".$_GET["type"]."&country=".$_GET["country"]."&length=".$_GET["length"]."&error=true");
            }
        }
    }else{
        if(empty($x)){
            header("Location: ./Application.php?type=".$_GET["type"]."&country=".$_GET["country"]."&length=".$_GET["length"]."&error=true");
        }
    }
}

$_SESSION["Manager"]->finaliseApplication($applicationData);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Application Complete</title>
</head>

<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
            <div class="container-fluid ">
                <a class="navbar-brand " href="#">AFS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/index.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="jumbotron-custom bg-transparent">
            <div class="container pt-6" style="padding-top: rem;">
                <h1><?= $_GET["type"]; ?> application</h1>
                <hr>
                <a class="h6" href="./CreateAnApplication.php">
                    < Back</a>
            </div>
        </div>

        <div class="jumbotron-custom bg-transparent">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="jumbotron-scrollable">
                        <h1>Step 5/5</h1>
                        <hr>
                        <div class="text-center">
                            <img src="img/approved.png" style="width:15rem; height:15rem;"></img>
                            <br>
                            <br>
                            <a>Your application is now being processed. You will recieve a</a>
                            <br>
                            <a>confirmation of this at your email <?=$_POST["Email"]?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="container">
        <p>&copy; AFS 2023</p>
    </footer>
</body>

</html>