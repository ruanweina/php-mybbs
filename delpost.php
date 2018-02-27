<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', 'root', 'mybbs');

if (mysqli_connect_errno() !== 0) {
    die(mysqli_connect_error());
}

// 先查询帖子信息
$sql = "SELECT * FROM post WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
if (mysqli_errno($conn) !== 0) {
    die(mysqli_error($conn));
}
$post = mysqli_fetch_assoc($result);

if ($post['parent_id'] == 0) {
    // 删除所有回复
    $parent_id = $post['id'];
    $sql = "DELETE FROM post WHERE parent_id = " . $parent_id;

    mysqli_query($conn, $sql);

    if (mysqli_errno($conn) !== 0) {
        die(mysqli_error($conn));
    }

    echo '回帖已删除<br>';

    // 删除主题帖
    $sql = "DELETE FROM post WHERE id = " . $post['id'];
    mysqli_query($conn, $sql);
    if (mysqli_errno($conn) !== 0) {
        die(mysqli_error($conn));
    }

    echo '主贴已删除';

} else {

    $sql = "DELETE FROM post WHERE id = " . $post['id'];

    mysqli_query($conn, $sql);

    if (mysqli_errno($conn) !== 0) {
        die(mysqli_error($conn));
    }

    echo '回帖已删除!';
}
?>
