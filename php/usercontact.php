<?php

@include 'config.php';

  if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $messages = $_POST['messages'];


    $insert_query = mysqli_query($conn, "INSERT INTO `contact`(name, email, phone, messages) VALUES('$name', ' $email', '$phone', '$messages')") or die ('query failed');

    if($insert_query){
        $message[] = 'Message was succesfully sent';
    }else{
        $message[] = 'Could not sent the message'; 
    };
  };
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact Us</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
    <link rel="stylesheet" href="css/styleuser.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
    <div class="container-contact">
        <div class ="form-container">
            <span class="big-circle"></span>
            <img src="img/shape.png" class="square" alt="" />
                  <div class="form">
                      <div class="contact-info">
                          <h3 class="title">Let's get in touch</h3>
                          <p class="text">
                              Tell us what you think and you'll find that your feedback really matters!
                              You can review, rate, recommend or add to the list of favorites any book.
                          </p>
                          <div class="info">
                                <div class="information">
                                <img src="image/location.png" class="icon" alt="" />
                                <p>92 Cherry Drive Uniondale, NY 11553</p>
                          </div>
                          <div class="information">
                                <img src="image/email.png" class="icon" alt="" />
                                <p style="text-transform:lowercase">alexandraelenasirbulescu@gmail.com</p>
                          </div>
                          <div class="information">
                                <img src="image/phone.png" class="icon" alt="" />
                                <p>123-456-789</p>
                          </div>
                       </div>

                       <div class="social-media">
                          <p>Connect with us :</p>
                          <div class="social-icons">
                              <a href="https://www.facebook.com/">
                                  <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="https://twitter.com/?lang=en">
                                  <i class="fab fa-twitter"></i>
                              </a>
                              <a href="https://www.instagram.com/">
                                  <i class="fab fa-instagram"></i>
                              </a>
                              <a href="https://www.linkedin.com/">
                                  <i class="fab fa-linkedin-in"></i>
                              </a>
                           </div>
                        </div>
                  </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
          
                <form action="" method="post">
                    <h3 class="title">Contact us</h3>
                        <div class="input-container">
                            <input type="text" name="name" class="input" placeholder ="Name">
                            <span>Name</span>
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" style ="text-transform: none" placeholder="Email">
                            <span>Email</span>
                        </div>
                        <div class="input-container">
                            <input type="tel" name="phone" class="input" placeholder="Phone number">
                            <span>Phone</span>
                        </div>
                        <div class="input-container textarea">
                            <textarea name="messages" class="input" placeholder ="Message"></textarea>
                            <span>Message</span>
                        </div>
                        <input type="submit" name="submit" value="Send" class="btn" />
                </form>
              </div>

          </div>

    </div>

</div>


</div>
</div>



</body>
</html>
