<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];
    $book_quantify = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE title = '$book_title'");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'Book already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(title, author, price, image, quantify) VALUES('$book_title', '$book_author', '$book_price', '$book_image', '$book_quantify')");
       $message[] = 'Book added to cart succesfully';
    };
 
 };
 
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>High school</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <link rel="stylesheet" href="css/styleuser.css">
</head>
<body>

<?php

if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
};

?>

<?php include 'userheader.php'; ?>

<div class="container">
    <section class="products">
        <h1 class="heading">High School books</h1>
        <div class="box-container">
        
        <?php
      
            $select_products = mysqli_query($conn, "SELECT * FROM `highschool`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>

        <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['title']; ?></h3>
            <h4><?php echo $fetch_product['author']; ?></h4>
            <h5>Editura <?php echo $fetch_product['publishing']; ?></h5>
            <h6>Clasa a <?php echo $fetch_product['class']; ?> -a</h6>
            <div class="price" style = "font-size: 20px"><?php echo $fetch_product['price']; ?>RON</div>
            <input type="hidden" name="book_title" value="<?php echo $fetch_product['title']; ?>">
            <input type="hidden" name="book_author" value="<?php echo $fetch_product['author']; ?>">
            <input type="hidden" name="book_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="no" value="<?php echo $fetch_product['no']; ?>">
            <input type="hidden" name="book_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>
        </div>
    </section>
</div>

<script src="js/scripthigh.js"></script>

</body>
</html>