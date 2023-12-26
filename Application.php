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
    <title>Application</title>
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
                        <h1>Step 1/5</h1>
                        <hr>

                        <form action="ApplicationComplete.php?type=<?= $_GET["type"]; ?>&country=<?= $_GET["country"]; ?>&length=<?= $_GET["length"];?>" method="post">
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Enter your <span class="font-weight-bold">first name</span></label>
                                        <input type="firstName" class="form-control" name="Firstname" placeholder="Firstname">
                                        <br>
                                        <label for="lastname">Enter your <span class="font-weight-bold">last name</span></label>
                                        <input type="lastName" class="form-control" name="Lastname" placeholder="Lastname">
                                        <br>
                                        <label for="phoneNumber">Enter your <span class="font-weight-bold">phone number</span></label>
                                        <input type="phoneNumber" class="form-control" name="PhoneNumber" placeholder="PhoneNumber">
                                        <br>
                                        <label for="email">Enter your <span class="font-weight-bold">email</span></label>
                                        <input type="email" class="form-control" name="Email" placeholder="Email">
                                        <br>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postcode">Start typing your <span class="font-weight-bold">post code</span></label>
                                        <input type="postcode" class="form-control" name="Postcode" id="Postcode" placeholder="postcode">
                                        <br>
                                        <label for="streetnumber">Enter your <span class="font-weight-bold">street number</span></label>
                                        <input type="streetnumber" class="form-control" name="StreetNumber" id="StreetNumber" placeholder="street number">
                                        <br>
                                        <label for="address1">Enter your <span class="font-weight-bold">1st line of address</span></label>
                                        <input type="address1" class="form-control" name="Address1" id="Address1" placeholder="address1">
                                        <br>
                                        <label for="address2">Enter your <span class="font-weight-bold">2nd line of address</span></label>
                                        <input type="address2" class="form-control" name="Address2" id="Address2" placeholder="address2">
                                        <br>
                                        <label for="city">Enter your <span class="font-weight-bold">city/town</span></label>
                                        <input type="city" class="form-control" name="City" id="City" placeholder="city">
                                        <br>
                                        <label for="country">Enter your <span class="font-weight-bold">country</span></label>
                                        <select class="custom-select" name="Country" id="Country">
                                            <option value="<?php NULL; ?>">None</option>
                                            <?php foreach ($_SESSION["Manager"]->getCountryList() as $x) { ?>
                                                <option value="<?= $x ?>"> <?= $x; ?> </option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYyqpadA2yJHGWdnZniAOnka3iR4QbSmo&v-3.exp&sensor=false&libraries=places"></script>

<script>
    let places, input, address, city;
    google.maps.event.addDomListener(window, "load", function() {

        var places = new google.maps.places.Autocomplete(
            document.getElementById("Postcode")
        );

        let result;

        google.maps.event.addListener(places, "place_changed", function() {
            result = places.getPlace().address_components

            result.forEach(item => {
                switch (item.types[0]) {
                    case "postal_code":
                        document.getElementById("Postcode").value = item.long_name;
                        break;
                    case "street_number":
                        document.getElementById("Streetnumber").value = item.long_name;
                        break;
                    case "route":
                        document.getElementById("Address1").value = item.long_name;
                        break;
                    case "subpremise":
                    case "route":
                        document.getElementById("Address2").value = item.long_name;
                        break;
                    case "postal_town":
                        document.getElementById("City").value = item.long_name;
                        break;
                    case "country":
                        document.getElementById("Country").value = item.long_name;
                        break;
                    default:
                        break;
                }
            });

        });

    });
</script>

</html>