<?php
include ("db.php");
$sql = "SELECT * FROM addproduct";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0) {
    echo "<div class='container'>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='product'>";
        echo "<img src='img/" . htmlspecialchars($row["img"]) . "' onclick=\"location.href='product-detail.php?id=" . $row['id'] . "'\" style='height:200px; width:200px;'>";
        echo "<p>價格：NT$" . htmlspecialchars($row["money"]) . "</p>";
        echo "<a href='check.php?id=" . $row['id'] . "' class='button'>立即購買</a>";
        echo "<h3>" . htmlspecialchars($row["category"]) . "</h3>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p style='text-align:center;'>目前沒有商品。</p>";
}
?>
