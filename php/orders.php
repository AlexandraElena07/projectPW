<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Orders</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>

<?php include 'adminheader.php'; ?>

<div class="container-orders">
    <section class="orders">
        <h1 class="heading">Books</h1>
        <div class="box-container">
        
        <?php
      
            $select_order = mysqli_query($conn, "SELECT * FROM `order`");
            if(mysqli_num_rows($select_order) > 0){
                while($fetch_order = mysqli_fetch_assoc($select_order)){
        ?>

        <form action="" method="post">
         <div class="box">
            <h3 style="text-align:left">Name: </h3><p style="text-align: right"><?php echo $fetch_order['name']; ?></p>
            <h3 style="text-align:left">Number:</h3> <p style="text-align: right"> <?php echo $fetch_order['number']; ?></p>
            <h3 style="text-align:left">Payment: </h3><p style="text-align: right"><?php echo $fetch_order['method']; ?></p>
            <h3 style="text-align:left">Adress:</h3> <p style="text-align: right"> <?php echo $fetch_order['flat']; ?> , <?php echo $fetch_order['street']; ?> , <?php echo $fetch_order['city']; ?> ,
            <?php echo $fetch_order['city']; ?> , <?php echo $fetch_order['state']; ?> , <?php echo $fetch_order['country']; ?></p>
            <h3 style="text-align:left">Pin code: </h3><p style="text-align: right"><?php echo $fetch_order['pin_code']; ?></p>
            <h3 style="text-align:left">Total books: </h3> <p style="text-align: right"> <?php echo $fetch_order['total_products']; ?></p>
            <h3 style="text-align:left">Total price: </h3><p style="text-align: right"><?php echo $fetch_order['total_price']; ?>RON</p>

         </div>
      </form>

      <?php
         };
      };
      ?>
        </div>
    </section>
</div>

</body>
</html>