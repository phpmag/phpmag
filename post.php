<?php
include 'init.php';
if (!isset($_GET['id'])) {
    exit;
}
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM post WHERE id = $id");
if (mysqli_num_rows($res) == 0) {
    exit;
}
$data = mysqli_fetch_array($res);
if (!empty($_POST['content'])) {
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $content = $purifier->purify(trim($_POST['content']));
    $stmt = $conn->prepare('UPDATE post SET content = ? WHERE id = ' . $id);
    $stmt->bind_param('s', $content);
    $stmt->execute();
    header('Location: ./');
    exit;
}

$title = htmlspecialchars(substr($data['title'], 0, 200));
include 'header.php';
?>
<div><?=$data['content']?></div>
<?php
include 'footer.php';
