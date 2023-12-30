<?php
require_once("./php/AgentManager.php");
session_start();

$applicationList;

if (!($_SESSION["AgentManager"]->isLoggedIn())) {
    header("Location: ./index.php");
}

if (isset($_POST["Filter"]) && !empty($_POST["Filter"])) {
    if (empty($_POST["Filter"])) {
    }
    $applicationList = $_SESSION["AgentManager"]->getApplicationsFil(($_POST["Filter"]));
} else {
    $applicationList = $_SESSION["AgentManager"]->getApplications();
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
                <h1>Search for an application</h1>
                <hr>
                <a class="h6" href="./AgentDashboard.php">
                    < Back</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <form class=" col-md-5" action="#" method="post">
                <div class="input-group mb-2">
                    <input id="Filter" name="Filter" class="form-control" placeholder="Enter an application reference number or customerID">
                    <button class="btn btn-success" type="submit">Filter</button>
                </div>
            </form>
            <div class="col-md-10">
                <ul class="list-group-scrollable">
                    <?php foreach ($applicationList as $x) { ?>
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
                                <div class="col-sm-2"><img src="img/info.png" style="height: 3rem; width: 3rem;" data-toggle="modal" data-target="#Modal<?= $x["ApplicationID"]; ?>" onmouseover="this.style.filter = 'invert';"></img></div>
                            </div>
                        </li>
                        <!-- MODAL -->
                        <div class="modal fade" id="Modal<?= $x["ApplicationID"]; ?>" role="dialog">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title col-12 modal-title text-center">Application: <span class="font-weight-bold"><?= $x["ApplicationID"]; ?></span><br>ApplicantID: <span class="font-weight-bold"><?= $x["ApplicantID"]; ?></span></h4>
                                    </div>
                                    <form action="UpdateApplication.php?appid=<?=$x["ApplicationID"];?>" method="post">
                                    <div class="modal-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstname"> <span class="font-weight-bold">First name</span></label>
                                                        <input type="firstName" class="form-control" name="Firstname" placeholder="Firstname" value="<?= json_decode($x["ApplicationData"])->firstname; ?>">
                                                        <br>
                                                        <label for="lastname"> <span class="font-weight-bold">Last name</span></label>
                                                        <input type="lastName" class="form-control" name="Lastname" placeholder="Lastname" value="<?= json_decode($x["ApplicationData"])->lastname; ?>">
                                                        <br>
                                                        <label for="phoneNumber"> <span class="font-weight-bold">Phone number</span></label>
                                                        <input type="phoneNumber" class="form-control" name="PhoneNumber" placeholder="PhoneNumber" value="<?= json_decode($x["ApplicationData"])->phonenumber; ?>">
                                                        <br>
                                                        <label for="email"> <span class="font-weight-bold">Email</span></label>
                                                        <input type="email" class="form-control" name="Email" placeholder="Email" value="<?= json_decode($x["ApplicationData"])->email; ?>">
                                                        <br>
                                                        <label for="visatype"> <span class="font-weight-bold">Visa type</span></label>
                                                        <input type="visatype" class="form-control" name="Visatype" placeholder="Visatype" value="<?= json_decode($x["ApplicationData"])->visainfo->visatype; ?>">
                                                        <br>
                                                        <label for="visacountry"> <span class="font-weight-bold">Visa Country</span></label>
                                                        <input type="visacountry" class="form-control" name="Visacountry" placeholder="Visacountry" value="<?= json_decode($x["ApplicationData"])->visainfo->visacountry; ?>" readonly>
                                                        <br>
                                                        <label for="visalength"> <span class="font-weight-bold">Visa length</span></label>
                                                        <input type="visalength" class="form-control" name="Visalength" placeholder="Visalength" value="<?= json_decode($x["ApplicationData"])->visainfo->visalength; ?>">
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="postcode"> <span class="font-weight-bold">Post code</span></label>
                                                        <input type="postcode" class="form-control" name="Postcode" id="Postcode" placeholder="postcode" value="<?= json_decode($x["ApplicationData"])->address->postcode; ?>">
                                                        <br>
                                                        <label for="streetnumber"> <span class="font-weight-bold">Street number</span></label>
                                                        <input type="streetnumber" class="form-control" name="StreetNumber" id="StreetNumber" placeholder="street number" value="<?= json_decode($x["ApplicationData"])->address->streetnumber; ?>">
                                                        <br>
                                                        <label for="address1"> <span class="font-weight-bold">1st line of address</span></label>
                                                        <input type="address1" class="form-control" name="Address1" id="Address1" placeholder="address1" value="<?= json_decode($x["ApplicationData"])->address->address1; ?>">
                                                        <br>
                                                        <label for="address2"> <span class="font-weight-bold">2nd line of address</span></label>
                                                        <input type="address2" class="form-control" name="Address2" id="Address2" placeholder="address2" value="<?= json_decode($x["ApplicationData"])->address->address2; ?>">
                                                        <br>
                                                        <label for="city"> <span class="font-weight-bold">City/Town</span></label>
                                                        <input type="city" class="form-control" name="City" id="City" placeholder="city" value="<?= json_decode($x["ApplicationData"])->address->city; ?>">
                                                        <br>
                                                        <label for="country"> <span class="font-weight-bold">Country</span></label>
                                                        <input type="country" class="form-control" name="Country" id="Country" placeholder="country" value="<?= json_decode($x["ApplicationData"])->address->country; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close Without Applying</button>
                                        <button type="submit" class="btn btn-default btn-success" >Close And Apply</button>
                                    </div>
                                    </form>
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