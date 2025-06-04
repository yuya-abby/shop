<?php
include("db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parent_id = intval($_POST['parent_id']);
    $account = $_SESSION['account'];
    $text = mysqli_real_escape_string($link, $_POST['text']);
    $now = date('Y-m-d H:i:s');

    $sql = "INSERT INTO msg (account, text, parent_id, add_time) VALUES ('$account', '$text', $parent_id, '$now')";
    if (mysqli_query($link, $sql)) {
        header("Location: msg-after2.php");
        exit();
    } else {
        echo "回覆失敗：" . mysqli_error($link);
    }
}
?>
