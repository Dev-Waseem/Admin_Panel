<?php
include('includes/header.php');
include('dbconnection.php');


if (isset($_POST['submit'])) {
  $title = $_POST['pname'];
  $category = $_POST['category'];
  $desc = $_POST['description'];
  $img_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $img_size = $_FILES['image']['size'];

  move_uploaded_file($tmp_name, 'images/' . $img_name);
  $query = "INSERT INTO `products` (`title`,`category`,`description`,`image`) VALUES ('$title', '$category', '$desc', '$img_name')";
  $result = mysqli_query($conn, $query);
}
?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
  <form action="add_product.php" method="post" enctype="multipart/form-data">
  <div class="col-md-6 offset-md-3 mt-5">
    <br>
    <h2>Add Product</h2>
    <div class="form-group mb-3">
      <label class="mt-4" for="exampleInputName" class="mb-1">Product Name</label>
      <input type="text" name="pname" class="form-control" id="exampleInputName" placeholder="Enter your Product Name" required="required">
    </div>
    <?php
    $fetch = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $fetch);
    if (mysqli_num_rows($result)) {

    ?>
    <div class="form-group mb-3">
      <label for="exampleFormControlSelect1" class="mb-1">Category</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category" required="required">
        <option selected>Open this select menu</option>
      <?php
        while($cat = mysqli_fetch_assoc($result)){
          echo '<option value="'.$cat['cid'].'">'.$cat['name'].'</option>';
        }
      }
        ?>
        
      </select>
    </div>
    <label for="exampleFormControlSelect1" class="mb-1">Description</label>
    <div class="form-floating">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
    </div>
    <hr class="mt-4">
    <div class="form-group mt-3">
      <label class="mr-2">Upload your Image:</label>
      <input type="file" name="image">
    </div>
    <hr>
    <button type="submit" class="btn btn-warning" name="submit">Add Product</button>
  </div>
</form>


</body>

</html>

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>