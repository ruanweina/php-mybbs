<?php
// 更新帖子
$conn = mysqli_connect('localhost', 'root', 'root', 'mybbs');

if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}

// 接收表单数据
$id = $_POST['id'];
$content = $_POST['content'];

$sql = "UPDATE post SET content = '" . $content . "' WHERE id = " . $id;

mysqli_query($conn, $sql);

if (mysqli_errno($conn)) {
    die(mysqli_error($conn));
}

echo '数据更新成功!';
