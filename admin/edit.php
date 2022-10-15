<?php
include '../init.php';
include '../htmlpurifier/HTMLPurifier.auto.php';
if (!isset($_SESSION['loggedin'])) {
    exit;
}
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

$title = 'Administration';
include '../header.php';
?>
<h1>Edit Post</h1>
<div class="left">
    <form method="post">
        <p>Edit your post...</p>
        <p><small>Please make sure to include a large header and the author.</small></p>
        <div id="editor"></div>
        <textarea style="display:none;" name="content" id="content" required></textarea>
        <button type="submit" class="button">Edit</button>
    </form>
</div>
<script>
    const pell = window.pell;
    const editor = document.getElementById("editor");
    const textarea = document.getElementById("content");
    pell.init({
        element: editor,
        placeholder: '📝 Write your article here...',
        onChange: (html) => {
            content.value = html;
        }
    });
    document.querySelectorAll('.pell-button').forEach(button => button.setAttribute('tabIndex', "-1"));
    editor.content.innerHTML = <?=json_encode($data['content'])?>;
</script>
<?php
include '../footer.php';
