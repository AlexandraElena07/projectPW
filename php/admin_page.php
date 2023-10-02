<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

  <link rel="stylesheet" href="css/styleuser.css">
</head>
<body>

<?php include 'adminheader.php'; ?>

<div class="carousel">
      <div class="carousel_inner">
         <div class="carousel_item carousel_item__active">
            <img src="image/image1.png" alt="" class="carousel_img">
            <div class="carousel_caption">
              <div class="form-container-home">

                <form action="" method="post">
                  <h1>Your</h1>
                  <h2>ONLINE BOOK STORE</h2>
                  <h3>Read What You Love. Love What You Read!</h3>
                  <div class="read-btn">
                    <a href="adminaboutus.php" style="margin-top: 0; color: #fff;"><span>Read More</span></a>
                  </div>
                </form>
              </div>
            </div>
         </div>
         <div class="carousel_item">
            <img src="image/image2.png" alt="" class="carousel_img">
            <div class="carousel_caption">
                <div class="form-container-home">
                  <form action="" method="post">
                  <h1>Your</h1>
                    <h2>ONLINE BOOK STORE</h2>
                    <h3>Read What You Love. Love What You Read!</h3>
                    <div class="read-btn">
                      <a href="adminaboutus.php" style="margin-top: 0; color: #fff;"><span>Read More</span></a>
                    </div>
                  </form>
                  </div>
            </div>
         </div>
         <div class="carousel_item">
            <img src="image/image3.png" alt="" class="carousel_img">
            <div class="carousel_caption">
            <div class="form-container-home">
                  <form action="" method="post">
                  <h1>Your</h1>
                    <h2>ONLINE BOOK STORE</h2>
                    <h3>Read What You Love. Love What You Read!</h3>
                    <div class="read-btn">
                      <a href="adminaboutus.php" style="margin-top: 0; color: #fff;"><span>Read More</span></a>
                    </div>
                  </form>
                  </div>
            </div>
         </div>
      </div>
   </div>

   <script src="js/script.js"></script>

</body>
</html>