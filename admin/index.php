<?php
include '../init.php';
if (!isset($_SESSION['loggedin'])) {
    if (!empty($_POST['password'])) {
        if (trim($_POST['password']) == $admin_pwd) {
            $_SESSION['loggedin'] = true;
            header('Location: ./');
            exit;
        } else {
            $title = 'Login';
            include '../header.php';
            ?>
            <h3>Incorrect Password! Try again!</h3>
            <h1>Login</h1>
            <form method="post">
                <p>Password:</p>
                <input type="password" required placeholder="Password..." autofocus name="password">
                <p></p>
                <button class="button" type="submit">Login</button>
            </form>
            <?php
            include '../footer.php';
            exit;
        }
    }
    $title = 'Login';
    include '../header.php';
    ?>
    <h1>Login</h1>
    <form method="post">
        <p>Password:</p>
        <input type="password" required placeholder="Password..." autofocus name="password">
        <p></p>
        <button class="button" type="submit">Login</button>
    </form>
    <?php
    include '../footer.php';
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
