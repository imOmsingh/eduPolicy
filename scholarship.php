<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "scholarships";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $parameter=false;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset_($_POST['country'])){
            $parameter=$_POST['country'];
            echo $parameter;
            exit();
        }
    }

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="scholarship.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="navbar d-flex flex-row">
        <div class="navLogoInfo d-flex flex-row justify-content-around">
            <div class="logoBut">MainLogo</div>
            <div class="logoBut">EduPolicy</div>
        </div>
        <div class="navButtonInfo d-flex flex-row justify-content-around">
            <a href="index.php" class="navButton">Home</a>
            <div class="navButton">About Us</div>
            <a class="navButton" href="scholarship.php">Scholarships</a>
        </div>
    </div>
    <div class="filterData">
    <form class="dropdown" action='/EduPolicy/scholarship.php'>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Country
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><button class="dropdown-item" type="submit" name="country" value="India" method="POST">India</button></li>
            <li><a class="dropdown-item" href="#">Usa</a></li>
        </ul>
    </form>
    </div>
    <?php

    $query='SELECT * FROM `scholarship`';
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        echo'
            <div class="container p-3">
                <div class="scholarFrame d-flex flex-row">
                    <div class="scholarLogo"><img src="'.$row['imgLink'].'" style="height: 100%;width:100% "></div>
                    <div class="scholarInfo d-flex flex-column">
                        <div class="scholarName">'.$row['scholarName'].'</div>
                        <div class="shortInfo d-flex flex-row justify-content-evenly">
                            <div class="infoButton rounded-pill">'.$row['eligibility'].'</div>
                            <div class="infoButton rounded-pill">'.$row['country'].'</div>
                            <div class="infoButton rounded-pill">'.$row['amount'].'/year</div>
                        </div>
                        <div class="scholarDesc">'.$row['descr'].'</div>
                        <div class="scholarLink btn btn-primary" >Learn More</div>
                    </div>
                </div>
            </div>
            ';
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

