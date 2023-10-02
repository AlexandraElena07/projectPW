<?php

@include 'config.php';

if(isset($_POST['add_book'])){
    $b_title = $_POST['b_title'];
    $b_author = $_POST['b_author'];
    $b_price = $_POST['b_price'];
    $b_no = $_POST['b_no'];
    $b_image = $_FILES['b_image']['name'];
    $b_image_tmp_name = $_FILES['b_image']['tmp_name'];
    $b_image_folder = 'uploaded_img/'.$b_image;

    $insert_query = mysqli_query($conn, "INSERT INTO `books`(title, author, price, no, image) VALUES('$b_title', ' $b_author', '$b_price', '$b_no', '$b_image')") or die ('query failed');

    if($insert_query){
        move_uploaded_file($b_image_tmp_name, $b_image_folder);
        $message[] = 'Book add succesfully';
    }else{
        $message[] = 'Could not add the book'; 
    };
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `books` where id = $delete_id");
    if($delete_query){
        $message[] = 'Book has been deleted';
    }else{
        $message[] = 'Book could not be deleted';
        };
};

if(isset($_POST['update_book'])){
    $update_b_id = $_POST['update_b_id'];
    $update_b_price = $_POST['update_b_price'];
    $update_b_no = $_POST['update_b_no'];

 
    $update_query = mysqli_query($conn, "UPDATE `books` SET price = '$update_b_price', no = '$update_b_no' WHERE id = '$update_b_id'");
 
    if($update_query){
       
       $message[] = 'Book updated succesfully';
       
    }else{
       $message[] = 'Book could not be updated';
       
    };
 
 };

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Books</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/adminstyle.css">

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

<?php include 'adminheader.php'; ?>

<div class="container-books">
   <section>
        <form action="" method="post" class="add-book-form" enctype="multipart/form-data">
            <h3>Add a new book</h3>
            
            <input type="text" name="b_title" placeholder="Enter the book title" class="box" required>
            <input type="text" name="b_author" placeholder="Enter the book author" class="box" required>
            <input type="number" name="b_price" min="0" placeholder="Enter the book price" class="box" required>
            <input type="number" name="b_no" min="0" placeholder="Enter the no. of books" class="box" required>
            <input type="file" name="b_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
            <input type="submit" value="Add the book" name="add_book" class="btn">
        </form>

   
   </section>

   <section class="display-book-table">

        <table>

            <thead>

                <th>Book image</th>
                <th>Book title</th>
                <th>Book author</th>
                <th>Book price</th>
                <th>No. of books</th>
                <th>Action</th>

            </thead>
            
            <tbody>
                <?php
                
                    $select_books = mysqli_query($conn, "SELECT * FROM `books`");
                    if(mysqli_num_rows($select_books) > 0){
                        while($row = mysqli_fetch_assoc($select_books)){
                ?>

                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image'];?>" height="100" alt=""></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['price']; ?>RON</td>
                    <td><?php echo $row['no']; ?></td>
                    <td>
                        <a href="adminbooks.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure that you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                        <a href="adminbooks.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class = "fas fa-edit"> </i> Update </a>
                    </td>
                </tr>

                <?php
                        };
                    }else{
                        echo "<div class='empty'>No book added</div>";
                    }
                ?>
            </tbody>

        </table>


   </section>

   <section class="edit-form-container">
     <?php
     
     if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($conn, "SELECT * FROM `books` WHERE id = $edit_id");
        if(mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_assoc($edit_query)){
     ?>

    <form action="" method="post" enctype="multipart/form-data">
        <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
        <input type="hidden" name="update_b_id" value="<?php echo $fetch_edit['id']; ?>">
        <p>Update Price:<input type="number" min="0" class="box" required name="update_b_price" value="<?php echo $fetch_edit['price']; ?>"></p>
        <p>Update No. Of Books:<input type="number" min="0" class="box" required name="update_b_no" value="<?php echo $fetch_edit['no']; ?>"></p>
        <input type="submit" value="Update the book" name="update_book" class="btn">
        <input type="reset" value="cancel" id="close-edit" class="option-btn">
       
     </form>


     <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
   </section>
</div>

<!-- custom js file link  -->
<script src="js/scriptbooks.js"></script>


</body>

</html>

