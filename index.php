<?php
require_once("php/Manager.php");
session_start();
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
                  <a class="navbar-brand" href="#">AFS</a> 
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
                            <form action="/dashboard.php" method="post">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Enter email">
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" name="Password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-success">Login</button>
                              </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="jumbotron mt-3">
                            <h1>Sign Up</h1>
                            <hr>
                            <p>If you're not already registered, you can create a new account. You'll need an account if</p>
                            <section class="d-flex justify-content-center mb-1">
                                <div class="m-1">
                                    <ul>
                                        <li>You're planning on applying for a VISA for <span style="font-weight: bold;">yourself</span></li>
                                        <br>
                                        <li>You're managing <span style="font-weight: bold;">someone elses</span> VISA application</li>
                                    </ul>
                                </div>
                            </section>
                            <button type="submit" class="btn btn-success">Create an account</button>
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