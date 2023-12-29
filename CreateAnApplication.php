<?php
require_once("php/Manager.php");
session_start();
$filters = NULL;

if (!($_SESSION["Manager"]->isLoggedIn())) {
    header("Location: ./index.php");
}

if (isset($_POST["countryFilter"]) || isset($_POST["visaTypeFilter"])) {
    if (empty($_POST["visaTypeFilter"])) {
        $_POST["visaTypeFilter"] = NULL;
    }
    if (empty($_POST["countryFilter"])) {
        $_POST["countryFilter"] = NULL;
    }
    $filters = array($_POST["countryFilter"], $_POST["visaTypeFilter"]);
    $visalist = $_SESSION["Manager"]->getVisaList($filters);
} else {
    $visalist = $_SESSION["Manager"]->getVisaList($filters);
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Create An Application</title>
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
                <h1>Begin a new application</h1>
                <hr>
                <a class="h6" href="./dashboard.php">
                    < Back</a>
            </div>
        </div>

        <div class="jumbotron-custom bg-transparent">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="jumbotron">
                        <h1>Filters</h1>
                        <hr>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select a <span class="font-weight-bold">Country</span></label>
                                <br>
                                <select class="custom-select" name="countryFilter">
                                    <option value="<?php NULL; ?>">None</option>
                                    <?php foreach ($_SESSION["Manager"]->getCountryList() as $x) { ?>
                                        <option value="<?= $x ?>"> <?= $x; ?> </option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select a <span class="font-weight-bold">VISA Type</span></label>
                                <br>
                                <select class="custom-select" name="visaTypeFilter">
                                    <option value="<?php NULL; ?>">None</option>
                                    <option value="Skilled Worker Visa">Skilled Worker Visa</option>
                                    <option value="Study Visa">Study Visa</option>
                                    <option value="Extended Stay Visa">Extended Stay Visa</option>
                                    <option value="Permenant Stay">Permenant Stay</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Apply</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="jumbotron-scrollable">
                        <ul class="list-group">
                            <?php foreach ($visalist as $x) { ?>
                                <a href="./Application.php?type=<?= $x[1]; ?>&country=<?= $x[0]; ?>&length=<?= $x[2]; ?>" class="list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 name="submittedType" class="mb-1"><?= $x[1] ?></h5>
                                        <small href="#"><img style="width:2rem; height:2rem;" src="img/info.png"></img></small>
                                    </div>
                                    <p class="mb-1">Country: <?= $x[0] ?></p>
                                    <p class="mb-1">Length: <?= $x[2] ?></p>
                                </a>
                                <hr>
                            <?php } ?>
                        </ul>
                    </div>
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