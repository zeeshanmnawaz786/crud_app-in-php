<?php 
include("header.php"); 
include("dbconn.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "delete from student where id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Error: ". mysqli_error($conn);
    }
    else{
        header('location:index.php');
        exit();
    }
}

?>