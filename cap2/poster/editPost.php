<?php
$PAGE_TITLE = "UPDATE POST";
require_once 'includes/header.inc.php'; ?>

<?php
$user_id = $_SESSION["id_user"];
$postid = $_GET['postid'] ?? '';
$postTitle = $postBody = $postVisible = '';
$errors = [];

// Get Post
$q = "SELECT * FROM `posts` WHERE `post_id`='$postid' AND `account_id`= '$user_id'";
$result = mysqli_query($conn, $q);
if ($result) {
  $post = mysqli_fetch_assoc($result);
  $postTitle = $post["title"];
  $postBody = $post["body"];
  $postVisible = $post["visible"];
} else {
  array_push($errors, "Can not get data");
}
?>

<?php
if (isset($_POST["updatePost"])) {
  $postTitle = htmlspecialchars($_POST['postTitle']);
  $postBody = htmlspecialchars($_POST['postBody']);
  $postVisible = $_POST['postVisible'];

  if (
    !isset($postTitle) || $postTitle == '' || !isset($postBody) || $postBody == '' ||
    !isset($postVisible) || $postVisible == ''
  ) {
    array_push($errors, "All fields are required.");
  } else {
    $q = "UPDATE `posts` SET `title`='$postTitle',`body`='$postBody',`visible`='$postVisible' WHERE `post_id`='$postid' AND `account_id`= '$user_id'";

    $result = mysqli_query($conn, $q);
    if ($result) {
      // set a inserted post's id in session
      $_SESSION["POST_UPDATE_ID"] = $postid;
      redirectTo("post.php?postid=" . $postid);
    } else {
      array_push($errors, "Post is not Updated. some issue here.");
    }
  }
}

?>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 mt-3">

      <!-- Alets -->
      <?php if (sizeof($errors)) : ?>
        <?php foreach ($errors as $error) :  ?>
          <?php echo showAlert($error, 'danger'); ?>
      <?php
        endforeach;
      endif; ?>

      <div class="card">
        <div class="card-header">
          <h3 class="text-muted font-weight-bold">Cập nhật bài viết</h3>
        </div>
        <div class="card-body">

          <form action="#" method="POST" class="needs-validation" novalidate>

            <div class="form-group">
              <label for="postTitle">Tiêu đề:</label>
              <input type="text" class="form-control" name="postTitle" id="postTitle" placeholder="tiêu đề bài viết" value="<?= $postTitle ?>" required>
              <div class="invalid-feedback">
                không được bỏ trống
              </div>
            </div>

            <div class="form-group">
              <label for="postBody">Nội dung:</label>
              <textarea name="postBody" class="form-control" rows="6" id="postBody" placeholder="Write a Post.." required><?= $postBody ?></textarea>
              <div class="invalid-feedback">
              không được bỏ trống
              </div>
            </div>

            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="postVisible" id="inlineRadio1" value="1" required checked>
                <label class="form-check-label" for="inlineRadio1">Public</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="postVisible" id="inlineRadio2" value="0" required>
                <label class="form-check-label" for="inlineRadio2">Private</label>

                <div class="invalid-feedback ml-2">Please check is required.</div>
              </div>
            </div>

            <div class="form-group mt-3">
              <button type="submit" name="updatePost" class="btn btn-success btn-lg">Cập nhật</button>

            </div>
            <div class="text-right">
              <button type="reset" class="btn btn-danger">Làm mới</button>
              <a href="index.php" class="btn btn-outline-dark">Trở về</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>


<?php require_once 'includes/footer.inc.php';
