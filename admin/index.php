<?php
include '../init.php';
if (!isset($_SESSION['loggedin'])) {
    exit;
}
$title = 'Administration';
include '../header.php';
$res = $conn->query('SELECT * FROM post ORDER BY timestamp DESC LIMIT 200');
?>
<h1>Administration</h1>
<h2>Publish</h2>
<a href="new.php" class="button">+ New Post</a>
<h2>Posts</h2>
<?php
while ($row = mysqli_fetch_assoc($res)):
?>

<div class="post">
    <h3><?=htmlspecialchars($row['title'])?></h3>
    <p><?=mb_strimwidth(strip_tags($row['content']), 0, 100, '...')?></p>
    <p><a href="../post.php?id=<?=intval($row['id'])?>" style="color:green;">View</a> - <a href="edit.php?id=<?=intval($row['id'])?>" style="color:blue;">Edit</a> - <a href="delete.php?id=<?=intval($row['id'])?>" style="color:red;">Delete</a></p>
</div>
<?php
endwhile;
include '../footer.php';
