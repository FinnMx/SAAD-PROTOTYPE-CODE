<?php
require_once("./php/AgentManager.php");
session_start();

$applicationList;

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
    <title>Search for a Ticket</title>
</head>

<body>
    <header>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
            <div class="container-fluid ">
                <a class="navbar-brand " href="#">AFS <small>Admin</small></a>
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
                <h1>Search for a closed ticket</h1>
                <hr>
                <a class="h6" href="./AgentDashboard.php">
                    < Back</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <form class=" col-md-5" action="#" method="post">
                <div class="input-group mb-2">
                    <input id="Filter" name="Filter" class="form-control" placeholder="Enter an TicketID or customerID">
                    <button class="btn btn-success" type="submit">Filter</button>
                </div>
            </form>
            <div class="col-md-10">
                <ul class="list-group-scrollable">
                        <li class="list-group-item">
                            <div class="row justify-content-center text-center align-middle">
                                <a class="col-sm-4">Closed tickets will be displayed here </a>
                            </div>
                        </li>
                        </div>
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