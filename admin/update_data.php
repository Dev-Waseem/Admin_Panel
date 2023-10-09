<?php
include('dbconnection.php');


if (isset($_POST['update'])) {
  $pro_id = $_POST['id'];
  $title = $_POST['pname'];
  $category = $_POST['category'];
  $desc = $_POST['description'];
  $img_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $img_size = $_FILES['image']['size'];

  move_uploaded_file($tmp_name, 'images/' . $img_name);
  $query = "UPDATE `products` SET `title` = '$title' , `category` = '$category' , `description` = '$desc' , `image` = '$img_name' where `id` = '$pro_id'";
  $result = mysqli_query($conn, $query);
  if ($result){
    echo "<script>alert('Data Update Successfully')</script>";
    header("Location: view_product.php");
}
}
?>