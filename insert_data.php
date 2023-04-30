   <?php include("dbconn.php") ?>


<?php
if(isset($_POST['add_student'])){
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname === '' || $lname === '' || $age === ''){
        echo '<script>alert("Please fill in all the fields")</script>';
            echo '<script>window.location.href = "index.php";</script>';


    }
    else{
        $query = "insert into student values(null, '$fname', '$lname', '$age')";
        $result = mysqli_query($conn, $query);

        if($result){
            echo '<script>window.location.href = "index.php";</script>';
        }
        else{
            echo '<script>alert("Something went wrong")</script>';
        }
    }
}
?>