<?php
include 'init.php';
$title = 'Home';
include 'header.php';
?>
<h1><?=$name?></h1>
<?php
$res = $conn->query('SELECT * FROM post ORDER BY timestamp DESC LIMIT 200');
while ($row = mysqli_fetch_assoc($res)):
?>
<a href="post.php?id=<?=intval($row['id'])?>">
    <div class="article">
        <h2><?=htmlspecialchars($row['title'])?></h2>
        <p><?=mb_strimwidth(strip_tags($row['content']), 0, 100, '...')?></p>    </div>
</a>
<?php
endwhile;
include 'footer.php';
