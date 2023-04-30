   <?php include("header.php") ?>
   <?php include("dbconn.php") ?>

   <!-- Button trigger modal -->
    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button>



   <table class="table table-hover table-border table-striped">
    <thead>
        <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Age</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $query = "select * from student";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "No students found".mysqli_error($conn);
    }
    else{
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
          <!-- <td><?php echo $row['id']; ?></td> -->
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['age']; ?></td>
          <td><a href="update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
          <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>

        <?php
      }
    }

    ?>
    </tbody>
    </table>

<!-- Modal -->
<form action="insert_data.php" method="post" >
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
        </div>
        <div class="modal-body">
    <div class="mb-3">
      <label for="exampleInputFirstName1" class="form-label">First Name</label>
      <input type="text" name="f_name" class="form-control" id="exampleInputFirstName1">
    </div>
    <div class="mb-3">
      <label for="exampleInputLastName1" class="form-label">Last Name</label>
      <input type="text" name="l_name" class="form-control" id="exampleInputLastName1">
    </div>
    <div class="mb-3">
      <label for="exampleInputAge1" class="form-label">Age</label>
      <input type="text" name="age" class="form-control" id="exampleInputAge1">
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <input type="submit" name="add_student" value="ADD" class="btn btn-success">
  </div>
  </div>
  </div>
  </div>
</form>


   <?php include("footer.php") ?>
