<?php
require_once("php/AgentManager.php");
session_start();

$_SESSION["AgentManager"] = new AgentManager;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
        <title>AFS Login</title>
    </head>

    <body>
        <header>
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
      <div class="container-fluid ">
        <a class="navbar-brand " href="#">AFS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link active" href="/index.php">User Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        </header>

        <main role="main">
            
            <div class="jumbotron bg-transparent">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="jumbotron mt-3">
                            <h1>Login</h1>
                            <hr>
                            <form action="/CheckAgentLogin.php" method="post">
                                <div class="form-group">
                                  <label for="StaffID">Staff ID</label>
                                  <input class="form-control" name="StaffID" placeholder="StaffID">
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" name="Password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-success">Login</button>
                              </form>
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