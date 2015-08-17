<?php include('includes/header.php'); ?>
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
      $query = "INSERT INTO posts
                  (title, body, category, author, tags)
                VALUES('$title', '$body', '$category', '$author', '$tags')";

      $insert_row = $db->insert($query);
    }
  }

  $query = "SELECT * FROM categories";
  $categories = $db->select($query);
?>
  <form role="form" method="post" action="add_post.php">
    <legend>Add Post</legend>
  
    <div class="form-group">
      <label>Title</label>
      <input name="title" type="text" class="form-control" placeholder="Your Title">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea name="body" class="form-control" placeholder="Your Post"></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category" class="form-control">
        <?php while($row = $categories->fetch_assoc()) : ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Author</label>
      <input name="author" type="text" class="form-control" placeholder="Author Name">
    </div>
    <div class="form-group">
      <label>Tags</label>
      <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </form>
  <br>
<?php include('includes/footer.php'); ?>