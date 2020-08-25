<?php

//start session to database
//session_start();
//$_SESSION = array();
require_once('./conexao_backend/database.php');
require_once('./componentes/comp.php');

// create instance of database class
$series_database = new CreateDb("prime_video", "series","localhost","root",'');
//$movies_database = new CreateDb("prime_video", "filmes","localhost","root",'');
 ?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Prime Video</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom px-5 py-3">
        <!--<a class="navbar-brand font-weight-bold" href="#">prime video</a>-->
        <img style="width: 115px; margin-right:15px; cursor: pointer;" src="p_logo_white.png" alt="prime logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100 d-flex">
                <li class="nav-item active">
                    <a class="nav-link font-weight-bold" href="#"><span class="nav-underline">Início</span><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Séries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Filmes</a>
                </li>
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="#">Infantil</a>
                </li>
                <li class="nav-item d-flex">
                    <form class="form-inline">
                        <!--<img style="height: 25px; margin-top:2px; cursor: pointer;" src="magn_logo.png" alt="search icon">-->
                        <input class="form-control w-100 mr-sm-2 prime-search-box" type="search" placeholder="Busca" aria-label="Search">
                        <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
                    </form>
                    <img style="height: 35px; margin-top:2px; cursor: pointer;" src="user_logo.png" alt="user logo">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuário
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- hero section -> filmes e/ou series que estão em alta -->
    <?php
        /* filmes e series em alta vão para o carousel */

        // pegando as series do banco de dados
        $result = $series_database->getData();
        $seriesArray = [];
        while ($row = mysqli_fetch_assoc($result)){
            array_push($seriesArray,$row);
        }

        $carouselIndicators = '';
        $carouselItems = '';
        for ($i = 0; $i < count($seriesArray); $i++) {
            $carouselIndicators = $carouselIndicators . carouselIndicators($i);
            $carouselItems = $carouselItems . carouselItemss($i, $seriesArray[$i]['banner_url']);
        }

        $carousel = "
            <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
                <ol class='carousel-indicators'>
                    $carouselIndicators
                </ol>
                <div class='carousel-inner'>
                    $carouselItems
                </div>
                <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Previous</span>
                </a>
                <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Next</span>
                </a>
            </div> ";
        echo $carousel;

    ?>
<!--
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
-->

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>Arthur Lima Copyright &copy; 2020</p>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- changed bootstrap jquery to full version from cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
