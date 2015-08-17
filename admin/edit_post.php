<?php include('includes/header.php'); ?>
<?php 
  $id = $_GET['id'];

  $query = "SELECT * FROM posts
              WHERE id=".$id;
  $post = $db->select($query)->fetch_assoc();

  $query = "SELECT * FROM categories";
  $categories = $db->select($query);
?>

<?php 
  if(isset($_POST['submit'])) {
    // Assign Vars
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $author = mysqli_real_escape_string($db->link, $_POST['author']);
    $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

    // Field validation

    if($title=='' || $body=='' || $category=='' || $author=='') {
      $error = 'Please fill out all required fields.';
    } else {
      $query = "UPDATE posts
                SET
                title= '$title', body='$body', category='$category',author='$author', tags='$tags'
                WHERE id = $id";

      $update_row = $db->update($query);
    }
  }
?>

<?php 
  if(isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id =".$id;
    $delete_row = $db->delete($query);
  }
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
  <legend>Edit Post</legend>

  <div class="form-group">
    <label>Title</label>
    <input name="title" type="text" class="form-control" placeholder="Your Title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control" placeholder="Your Post">
      <?php echo $post['body']; ?>
    </textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control">
      <?php while($row = $categories->fetch_assoc()) : ?>
        <?php
          if($row['id'] == $post['category']) {
            $selected = 'selected';
          } else {
            $selected = '';
          }
        ?>
        <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
      <?php endwhile; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Author Name" value="<?php echo $post['author']; ?>">
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <a href="index.php" class="btn btn-default">Cancel</a>
  <button type="submit" class="btn btn-danger" name="delete">Delete</button>
</form>
<br>
<?php include('includes/footer.php'); ?>