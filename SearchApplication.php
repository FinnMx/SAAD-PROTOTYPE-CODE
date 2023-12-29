<?php
require_once("./php/AgentManager.php");
session_start();

if (!($_SESSION["AgentManager"]->isLoggedIn())) {
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <header>
        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <meta charset="utf-8">
    </header>
    <title>Search for an Application</title>
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
                <h1>Search for an application</h1>
                <hr>
                <a class="h6" href="./AgentDashboard.php">
                    < Back</a>
            </div>
        </div>

        <div class="jumbotron-custom bg-transparent">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <ul class="list-group">
                        <?php foreach ($_SESSION["AgentManager"]->getApplications() as $x) { ?>
                            <li class="list-group-item">
                                <div class="row justify-content-center text-center align-middle">
                                    <a class="col-sm-2">Application: <?= $x["ApplicationID"]; ?></a>
                                    <a class="col-sm-2">Date Created: <?= $x["DateCreated"]; ?></a>
                                    <a class="col-sm-2">Status: </a>
                                    <?php ?>
                                    <div class="card col-sm-2 <?php switch ($x["Status"]) {
                                                                    case "Processing": ?>bg-warning<?php break;
                                                                                                case "Approved": ?>bg-success<?php break;
                                                                                                                                                case "Declined": ?>bg-danger<?php break;
                                                                                                                                                                                } ?>" style="width:6rem;">
                                        <div class="card-body"><?= $x["Status"]; ?></div>
                                    </div>
                                    <div class="col-sm-2"><img src="img/info.png" style="height: 3rem; width: 3rem;" data-toggle="modal" data-target="#myModal"></img></div>
                                </div>
                            </li>
                            <!-- MODAL -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

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

</html>