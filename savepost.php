<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'mybbs');

if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}

// 接收表单数据
$subject = $_POST['subject'];
$content = $_POST['content'];
$section_id = $_POST['section_id'];
$parent_id = $_POST['parent_id'];
$post_at = time();
$post_by = 2;

$sql = "INSERT INTO post (`id`,`subject`,`content`,`post_at`,`post_by`,`section_id`,`parent_id`) VALUES (null,'" . $subject . "', '" . $content . "', " . $post_at . ", " . $post_by . ", " . $section_id . ", " . $parent_id . ")";

mysqli_query($conn, $sql);

if (mysqli_errno($conn)) {
    die(mysqli_error($conn));
}

echo '数据保存成功!';
