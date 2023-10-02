<?php

@include 'config.php';

?>

<header class="header">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
         <li class="dropdownnav"><a class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#">Bookstore<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="useraboutus.php">About Us</a></li>
                  <li><a href="usercontact.php">Contact</a></li>
               </ul>
         </li>  
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="user_page.php"> <span class ="glyphicon glyphicon-home"> Home</span></a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="userbooks.php">Books</a></li>
                <li class="dropdown-submenu"><a class="test" tabindex="-1" href="#">School Books <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="userprimaryschool.php">Primary school</a></li>
                        <li><a tabindex="-1" href="usersecondaryschool.php">Secondary school</a></li>
                        <li><a tabindex="-1" href="userhighschool.php">High school</a></li>
                        <li><a tabindex="-1" href="usersuppliesschool.php">Supplies, Accessories</a></li>
                    </ul>
                </li>    
                <li><a href="userboardgames.php">Board Games</a></li>
            </ul>
        </li>
        <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);
      ?>
        <li><a href="cart.php" class="cart"><span class="glyphicon glyphicon-shopping-cart"></span> <span2><?php echo $row_count; ?></span2> </a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

</header?
