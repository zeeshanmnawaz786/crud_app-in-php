<?php 
include("header.php"); 
include("dbconn.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "select * from student where id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "No students found" . mysqli_error($conn);
    }
    else{
      $row = mysqli_fetch_array($result);

      if(isset($_POST['update_student'])){
          $fname = $_POST['f_name'];
          $lname = $_POST['l_name'];
          $age = $_POST['age'];

          if ($fname === '' || $lname === '' || $age === ''){
              echo '<script>alert("Please fill in all the fields")</script>';
          }
          else{
              $query = "update student set first_name = '$fname', last_name = '$lname', age = '$age' where id = $id";
              $result = mysqli_query($conn, $query);
              if (!$result) {
                  echo mysqli_error($conn);
              }
              else{
                  header('location:index.php');
                  exit();
              }
          }
      }
?>

      <form action="update_page.php?id=<?php echo $id; ?>" method="post">
         <div class="mb-3">
            <label for="FirstName" class="form-label">First Name</label>
            <input type="text" name="f_name" value="<?php echo $row['first_name']; ?>" class="form-control" id="FirstName">
          </div>
          <div class="mb-3">
            <label for="LastName" class="form-label">Last Name</label>
            <input type="text" name="l_name" value="<?php echo $row['last_name']; ?>" class="form-control" id="LastName">
          </div>
          <div class="mb-3">
            <label for="Age" class="form-label">Age</label>
            <input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control" id="Age">
          </div>
          <input type="submit" name="update_student" value="UPDATE" class="btn btn-success">
      </form>

<?php 
    }
}
else{
    echo "No student ID specified";
}
include("footer.php"); 
?>
