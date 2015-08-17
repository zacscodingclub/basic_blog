<?php include('includes/header.php'); ?>
<?php 
  $id = $_GET['id'];

  $query = "SELECT * FROM categories
              WHERE id=".$id;

  $category = $db->select($query)->fetch_assoc();
?>

<?php
  if(isset($_POST['submit'])) {
    // Assign Vars
    $name = mysqli_real_escape_string($db->link, $_POST['name']);

    // Field validation

    if($name=='') {
      $error = 'Please fill out all required fields.';
    } else {
      $query = "UPDATE categories
                SET 
                name = '$name'
                WHERE id=".$id;
      $update = $db->update($query);
    }
  }
?>

<?php 
  if(isset($_POST['delete'])) {
    $query = "DELETE FROM categories WHERE id =".$id;
    $delete_row = $db->delete($query);
  }
?>

<form action="edit_category.php?id=<?php echo $id; ?>" method="POST" role="form">
  <legend>Edit Category</legend>

  <div class="form-group">
    <label>Category</label>
    <input type="text" class="form-control" name="name" placeholder="Input Category" value="<?php echo $category['name']; ?>">
  </div>  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href="index.php" class="btn btn-default">Cancel</a>
  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
</form>
<br>
<?php include('includes/footer.php'); ?>