<header class="header">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
         <li class="dropdownnav"><a class="navbar-brand dropdown-toggle" data-toggle="dropdown" href="#">Bookstore<span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li><a href="adminaboutus.php">About Us</a></li>
                  <li><a href="admincontact.php">Contact</a></li>
               </ul>
         </li>  
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="admin_page.php"><span class ="glyphicon glyphicon-home"> Home</span></a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="adminbooks.php">Books</a></li>
                <li class="dropdown-submenu"><a class="test" tabindex="-1" href="#">School Books <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="adminprimaryschool.php">Primary school</a></li>
                        <li><a tabindex="-1" href="adminsecondaryschool.php">Secondary school</a></li>
                        <li><a tabindex="-1" href="adminhighschool.php">High school</a></li>
                        <li><a tabindex="-1" href="adminsuppliesschool.php">Supplies, Accessories</a></li>
                    </ul>
                </li>    
                <li><a href="adminboardgames.php">Board Games</a></li>
            </ul>
        </li>
        <li><a href="orders.php">Orders</a></li>
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

</header>