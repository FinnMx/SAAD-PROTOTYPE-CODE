<?php
require_once("php/Manager.php");
session_start();

if(!isset($_SESSION["Manager"]) || !($_SESSION["Manager"]->isLoggedIn())){
  header("Location: ./index.php");
}

?>
<!DOCTYPE html>
<html>
  
    <head>
        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
        <title>Dashboard</title>
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

        <!-- PAGE CONTENT -->
        <main role="main">
            <!-- Main jumbotron for a primary message -->
            <div class="jumbotron">
              <div class="container mt-3">
                <h1>Frequently Used</h1>
                <hr>
                <div class="row">
                  <div class="col-md-4 mt-2 text-primary">
                    <a class="h4"href="/CreateAnApplication.php">Create an application</a>
                  </div>
                  <div class="col-md-4 mt-2 text-primary">
                    <a class="h4"href="/ViewApplications.php">View an application</a>
                  </div>
                  <div class="col-md-4 mt-2 text-primary">
                    <a class="h4"href="/cock">Settings</a>
                  </div>
                </div>
              </div>
            </div>
      
            <div class="container">
              <!-- Example row of columns -->
              <div class="row">
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
                <div class="col-md-4">
                  <h2>Heading</h2>
                  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                  <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
                </div>
              </div>
      
              <hr>
      
            </div>

      
          </main>
      
        <!-- FOOTER -->
        <footer class="container">
          <p>&copy; AFS 2023</p>
        </footer>

        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/popper.min.js"></script>
        <script src="lib/bootstrap/bootstrap.min.js"></script>
    </body>

</html>