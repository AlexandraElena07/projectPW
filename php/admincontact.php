<?php
@include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Contact</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>

<?php include 'adminheader.php'; ?>
  
<div class="section">
  <div class="container-contact">
    <section class="contact">
      <h1 class="heading" style ="margin-top: 0px; text-align: center; margin-bottom: 60px">Contact Form</h1>
      <table>
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Message</th>
        </thead>
        
        <tbody>
          <?php 
            $select_contact = mysqli_query($conn, "SELECT * FROM `contact`");
            if(mysqli_num_rows($select_contact) > 0){
            while($fetch_contact = mysqli_fetch_assoc($select_contact)){
          ?>
          
          <tr>
            <td><?php echo $fetch_contact['name']; ?></td>
            <td><?php echo $fetch_contact['email']; ?></td>
            <td><?php echo $fetch_contact['phone']; ?></td>
            <td><?php echo $fetch_contact['messages']; ?></td>
          </tr>
          
          <?php
            };
          };
          ?>
        </tbody>
      </table>
    </section>
  </div>
</div>

</body>
</html>
