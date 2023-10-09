<?php
include('includes/header.php');
include('dbconnection.php');

//Display Product

$query = "SELECT * FROM `products` as p JOIN `category` as c on p.category = c.cid order by p.id desc";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){



?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>All Categories </h2>
                <hr>
            <table class="table table-warning">
                <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($data = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <th scope="row"><?php echo $data['id']?></th>
                    <td><?php echo $data['title']?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['description']?></td>
                    <td><img src="<?php echo 'images/' . $data['image']?>" width="100px" height="100px"></td>
                    <td>
                        <?php
                        if($data['status'] == 1){
                            echo "Active";
                        }else{
                            echo "Deactivate";
                        }    
                        
                        ?>
                    </td>
                    <td><a class="btn btn-primary" href="update.php?id=<?php echo $data['id']?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete.php">Delete</a></td>
                </tr>
                <?php
                    }
                }
                
                ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </nav>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('includes/footer.php');
include('includes/scripts.php');

?>