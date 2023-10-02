<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantify = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart</title>
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

<div class="section">

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Shopping cart</h1>

   <table>

      <thead>
         <th>Image</th>
         <th>Title/Name</th>
         <th>Author/Provider</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total price</th>
         <th>Action</th>
      </thead>

      <tbody>

        <?php 
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        ?>

        <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['title']; ?></td>
            <td><?php echo $fetch_cart['author']; ?></td>
            <td><?php echo number_format($fetch_cart['price']); ?>RON</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                    <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantify']; ?>" >
                    <input type="submit" value="update" name="update_update_btn">
                </form>   
            </td>
            <td><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantify']); ?>RON</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" style="margin-top: 0; color: #fe1221;"onclick="return confirm('Remove item from cart?')" class="delete-btn"> <span class="glyphicon glyphicon-trash"></span> Remove</a></td>
        </tr>
        <?php
            $grand_total += $sub_total;  
            };
        };
        ?>
            <tr class="table-bottom">
                <td><a href="userbooks.php" class="option-btn" style="margin-top: 0; color: #1abc9c;">Continue shopping</a></td>
                <td colspan="4">grand total</td>
                <td><?php echo $grand_total; ?>RON</td>
                <td><a href="cart.php?delete_all" style="margin-top: 0; color: #fe1221;" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <span class="glyphicon glyphicon-trash"></span> Delete all </a></td>
            </tr>
            

</tbody>

      
   </table>

   <div class="checkout-btn">
      <a href="checkout.php" style="margin-top: 0; color: #000000;" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>"><span class = "glyphicon glyphicon-check">Procced to checkout</span></a>
   </div>

</section>

</div>
</div>
</body>
</html>