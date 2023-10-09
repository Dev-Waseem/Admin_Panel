<?php


$conn = mysqli_connect('localhost','root','','admin_panel');

if(!$conn){
//     echo "Database connection Successfully established."; 
// }else{
    echo "Database connection Error: " . mysqli_connect_error();
}

?>