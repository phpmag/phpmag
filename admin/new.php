<?php
include '../init.php';
include '../htmlpurifier/HTMLPurifier.auto.php';
if (!isset($_SESSION['loggedin'])) {
    exit;
}

if (!empty($_POST['title']) && !empty($_POST['content'])) {
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $title = substr(trim($_POST['title']), 0, 255);
    $content = $purifier->purify(trim($_POST['content']));
    $stmt = $conn->prepare('INSERT INTO post (title, content) VALUES (?, ?)');
    $stmt->bind_param('ss', $title, $content);
    $stmt->execute();
    header('Location: ./');
    exit;
}

$title = 'Administration';
include '../header.php';
?>
<h1>New Post</h1>
<div class="left">
    <form method="post">
        <p>Post Title</p>
        <input type="text" placeholder="Post Title" autofocus required name="title">
        <p>Write your post...</p>
        <p><small>Please make sure to include a large header and the author.</small></p>
        <div id="editor"></div>
        <textarea style="display:none;" name="content" id="content" required></textarea>
        <button type="submit" class="button">Post</button>
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
    document.querySelectorAll('.pell-button').forEach(button => button.setAttribute('tabIndex', "-1"))

</script>
<?php
include '../footer.php';
