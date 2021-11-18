<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brain Children</title>

    <link rel="icon" href="images/logo.png" type="image/jpeg" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- font awesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/utility.css" />
    <link rel="stylesheet" href="css/dropdown.css" />
    <link rel="stylesheet" href="css/modal.css" />

    <!-- slick css -->
    <link rel="stylesheet" href="slick-1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="slick-1.8.1/slick/slick.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=PT+Serif:ital@1&family=Praise&display=swap" rel="stylesheet">
  </head>
  <body>   
    <!-- header -->
    <header>
      <nav class="navbar">
        <div class="row container">
          <a href="index.php" class="navbar-brand">
            <img src="./images/Logo.png" alt="site logo" /><span>Brain Children</span>
          </a>
          <button type="button" class="navbar-show-btn">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <div class="navbar-collapse">
          <button type="button" class="navbar-hide-btn">
            <i class="fas fa-times"></i>
          </button>
          <ul class="navbar-nav">
            <li><a href="./determineInterest.php">Test</a></li>
            <li><a href="./lessons.php">Darsliklar</a></li>
            <li><a href="./videos.php">Video </a></li>
            <li><a href="./about.php">Sayt haqida</a></li>
            <li><a href="./check.php">Shaxsiy kabinet</a></li>
            <li><a href="./news.php">Yangiliklar</a></li>
            <li>
              <a href="check.php" class="apply">
                <?php
                  include_once "php/interest.php";
                  if(isset($_COOKIE['password_cookie_token']))
                    echo "Shaxsiy kabinet";
                  else 
                    echo "Ro'yhatdan o'tish";
                ?>
              </a>
            </li>
          </ul>
        </div>
      </nav>