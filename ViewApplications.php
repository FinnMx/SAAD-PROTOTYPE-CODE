<?php
require_once("php/Manager.php");
session_start();

if (!($_SESSION["Manager"]->isLoggedIn())) {
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>View Application</title>
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

    <div class="mb-3 mr-3" style="bottom: 0;
    right: 0; position:fixed; z-index: 9999;">
        <iframe class="mb-5" id="livechat" style="height:300px; border: none;" scrolling="no" onload="this.style.display = 'none';" src="/Livechat.php"></iframe>
        <button class="h3" id="livechatToggle" style="position:absolute; bottom:0; right:0; outline:none;" onclick="toggleChat()"><span class="font-weight-bold"> ^ </span></button>
    </div>

    <main role="main">
        <div class="jumbotron-custom bg-transparent">
            <div class="container pt-6" style="padding-top: rem;">
                <h1>View applications</h1>
                <hr>
                <a class="h6" href="./dashboard.php">
                    < Back</a>
            </div>
        </div>

        <div class="jumbotron-custom bg-transparent">
            <div class="row justify-content-center">

                <div class="col-md-10">
                    <ul class="list-group">
                        <?php foreach ($_SESSION["Manager"]->getApplications() as $x) { ?>
                            <li class="list-group-item">
                                <div class="row justify-content-center text-center align-middle">
                                    <a class="col-sm-2 ">Application: <?= $x["ApplicationID"]; ?></a>
                                    <a class="col-sm-2 ">Date Created: <?= $x["DateCreated"]; ?></a>
                                    <a class="col-sm-2">Status: </a>
                                    <?php ?>
                                    <div class="card col-sm-2  <?php switch ($x["Status"]) {
                                                                    case "Processing": ?>bg-warning<?php break;
                                                                                                                    case "Approved": ?>bg-success<?php break;
                                                                                                                                                            case "Declined": ?>bg-danger<?php break;
                                                                                                                                                                                                } ?>" style="width:6rem;">
                                        <div class="card-body"><?= $x["Status"]; ?></div>
                                    </div>
                                    <div class="col-sm-2 d-flex align-items-center"><img src="img/cross.png" style="height: 3rem; width: 3rem;" onclick="location.href='./DeleteApplication.php?appid=<?=$x['ApplicationID'];?>'"></img></div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <footer class="container">
        <p>&copy; AFS 2023</p>
    </footer>
</body>

<script>
    var button = document.getElementById('livechatToggle'); // Assumes element with id='button'


    button.onclick = function() {
        var div = document.getElementById('livechat');
        if (div.style.display !== 'none') {
            div.style.display = 'none';
        } else {
            div.style.display = 'block';
        }
    };
</script>

</html>