<?php
$PAGE_TITLE = "CREATE NEW POST";
require_once 'includes/header.inc.php'; 
?>

<?php
$user_id = $_SESSION["id_user"];
$postTitle = $postBody = $postVisible = '';
$errors = [];

if (isset($_POST["createPost"])) {
    $postTitle = htmlspecialchars($_POST['postTitle']);
    $postBody = htmlspecialchars($_POST['postBody']);
    $postVisible = $_POST['postVisible'];

    if (!isset($postTitle) || $postTitle == '' || !isset($postBody) || $postBody == '' ||
    !isset($postVisible) || $postVisible == '') {
        array_push($errors, "All fields are required.");
    } else {
        $q = "INSERT INTO `posts` (`post_id`,`account_id`, `title`, `body`, `visible`, `updated_at`, `created_at`) VALUES (NULL, '$user_id', '$postTitle', '$postBody', '$postVisible', Now(),Now())";

        $result = mysqli_query($conn, $q);
        if ($result) {
            // set a inserted post's id in session
            $_SESSION["POST_CREATE_ID"] = mysqli_insert_id($conn);
            redirectTo("myPosts.php");
        } else {
            array_push($errors, "Post is not created. some issue here.");
        }
    }
}

?>



<div class="container">
  <div class="row">
    <div class="col-12 ">

      <!-- Alets -->
      <?php if (sizeof($errors)) : ?>
      <?php foreach ($errors as $error) :  ?>
      <?php echo showAlert($error, 'danger'); ?>
      <?php
            endforeach;
        endif; ?>

      <div class="card">
        <div class="card-header">
          <h3 class="text-muted font-weight-bold">Tạo mới bài post</h3>
        </div>
        <div class="card-body">

          <form action="#" method="POST" class="needs-validation" novalidate>

            <div class="form-group">
              <label for="postTitle">Tiêu đề:</label>
              <input type="text" class="form-control" name="postTitle" id="postTitle" placeholder="tiêu đề bài post" required>
              <div class="invalid-feedback">
                Không được bỏ trống
              </div>
            </div>

            <div class="form-group">
              <label for="postBody">Nội dung:</label>
              <textarea name="postBody" class="form-control" rows="6" id="postBody2" placeholder="Viết nội dung.."
                required></textarea>
              <div class="invalid-feedback">
              Không được bỏ trống
              </div>
            </div>
            
            


            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="postVisible" id="inlineRadio1" value="1" required
                  checked>
                <label class="form-check-label" for="inlineRadio1">Public</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="postVisible" id="inlineRadio2" value="0" required>
                <label class="form-check-label" for="inlineRadio2">Private</label>

                <div class="invalid-feedback ml-2">Please check is required.</div>
              </div>
            </div>

            <div class="form-group mt-3">
              <button type="submit" name="createPost" class="btn btn-success btn-lg">Thêm</button>

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
<script src="https://cdn.tiny.cloud/1/e2sfcz5xv9m4e0g5web5ukrutgy2jae7r0ucyl83i91acc2h/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
  selector: '#postBody2',
  height: 500,
  menubar: false,
  plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
});
</script>


<?php require_once 'includes/footer.inc.php';
