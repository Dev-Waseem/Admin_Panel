<?php
include('includes/header.php');
include('dbconnection.php');


if(isset($_POST['submit'])) {
    $category_name = $_POST['cname'];

    $query = "INSERT INTO `category` (`name`) VALUES ('$category_name')";
    $result = mysqli_query($conn, $query);
    if($result) {
      echo '<div class="alert alert-success">
      Category added successfully.
      </div>';
    } else {
      echo '<div class="alert alert-danger">
      Error adding category: ' . mysqli_error($conn) . '
      </div>';
    }
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
<div class="col-md-6 offset-md-3 mt-5">
    <form action="add_category.php" method="POST">
        <br>
        <h2>Add Product</h2>
          <div class="form-group mb-3 mt-4">
            <label for="exampleInputName">Category Name</label>
            <input type="text" name="cname" class="form-control mt-3" id="exampleInputName" placeholder="Enter your Category Name" required="required">
          </div>
          <hr class="mb-4 mt-4">
          <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
        </form>
    </div> 
    

</body>

</html>

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>