<?php
include '../init.php';
if (!isset($_SESSION['loggedin'])) {
    exit;
}
if (!isset($_GET['id'])) {
    exit;
}
$id = intval($_GET['id']);
if (mysqli_num_rows($conn->query("SELECT * FROM post WHERE id = $id")) == 0) {
    exit;
}
if (isset($_POST['delete'])) {
    $conn->query("DELETE FROM post WHERE id = $id");
    header('Location: ./');
    exit;
}
$title = 'Delete Post';
include '../header.php';
?>
<h1>Delete Post?</h1>
<h3>Are you sure that you would like to delete this post? This cannot be undone!</h3>
<form method="post">
    <input type="hidden" name="delete" value="1">
    <button type="submit" class="button">Submit</button>
</form>
<?php
include '../footer.php';
