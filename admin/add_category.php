<?php include('includes/header.php'); ?>
<?php
  if(isset($_POST['submit'])) {
    // Assign Vars
    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    // Field validation

    if($name=='') {
      $error = 'Please fill out all required fields.';
    } else {
      $query = "INSERT INTO categories
                  (name)
                VALUES('$name')";
      $update = $db->update($query);
    }
  }
?>
  <form action="add_category.php" method="POST" role="form">
    <legend>Add Category</legend>
  
    <div class="form-group">
      <label>Category</label>
      <input type="text" class="form-control" name="name" placeholder="Input Category">
    </div>  
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </form>
  <br>
<?php include('includes/footer.php'); ?>