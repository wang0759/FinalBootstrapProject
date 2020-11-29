<?php

function getPDO()
{
    $dbConnection = parse_ini_file("db_connection.ini");
    extract($dbConnection);
    $myPdo = new PDO($dsn, $user, $password);
    $myPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $myPdo;
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

$myPdo = getPDO();
$sql = "INSERT Into contact (firstName, lastName, email, telephone) values
( '$firstName','$lastName','$email','$telephone' )";
$conn = $myPdo->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quanyi Wang's Portfolio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- your CSS file link goes HERE -->
    <link rel='stylesheet' href='./css/main.css'>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light ">
        <!-- <a class="navbar-brand" href="#"> -->
        <!-- <img src="./imgs/html.png" width="40" height="40" class="d-inline-block align-top" alt=""> -->
        <!-- </a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./portfolio.html">Portfolio</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="./contact.html">Contact <span class="sr-only">(current)</span></a>
                </li>
            </ul>
    </nav>
    </br>


    <!-- <div class="jumbotron jumbotron-fluid text-center">
            <h1 class="display-3">Contact Me</h1>
            </br>
            <!-- <img src="./imgs/portaitMe.png" alt="avantar"> -->
    </div> -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/c3.jpg" class="d-block w-100" alt="image1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Quanyi Wang's Portfolio</h5>
                    <p>"The future belongs to those who believe in the beauty of their dreams." <br />-Eleanor Roosevelt</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/imgs/c1.jpg" class="d-block w-100" alt="image2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Quanyi Wang's Portfolio</h5>
                    <p>"Do not go where the path may lead, go instead where there is no path and leave a trail." <br />-Ralph Waldo Emerson</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/imgs/c2.jpg" class="d-block w-100" alt="image3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Quanyi Wang's Portfolio</h5>
                    <p>"Life is either a daring adventure or nothing at all." <br />-Helen Keller</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <script>
            $("#carouselExampleCaptions").carousel({
                interval: 100
            });
        </script>

    </div>

    <br>

    <div class='container'>

        <form action="contact.php" method="POST">
            <div class="form-group">
                <label>Name</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="firstName" placeholder="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="lastName" placeholder="Last name">
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" id="Email1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                </br>
                <div class="form-group">
                    <label>Telephone</label>
                    <input type="tel" class='form-control' name="telephone" id="tel" placeholder='Enter your phone number'>
                </div>
                </br>
                <div class="form-group">
                    <label for="details">Job details</label>
                    <textarea class='form-control' id='details' name="jobDetails" rows='5' placeholder='please provide a time frame for the work and details about the job.'></textarea>
                </div>
                <button type=" submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- your JavaScript file(s) go here -->
</body>

</html>