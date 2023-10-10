<?php
session_start();
include "connect.php";

// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login-form.php");
} else if (isset($_SESSION['user'])) {
    header("location: user-home.php");
}
?>

<html>

<body>
    <h1>สวัสดี Admin <?php echo $_SESSION["fullname"]; ?></h1>

    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br><br>

    <hr>
    <br>

    <h1>นี่คือ สินค้าคงเหลือทั้งหมด</h1>

    <?php
    $stmt = $pdo->prepare("SELECT product.pname, product.price, SUM(item.quantity) AS total_quantity
           FROM orders 
           INNER JOIN item ON item.ord_id = orders.ord_id 
           INNER JOIN product ON product.pid = item.pid 
           GROUP BY product.pname, product.price
           ");
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<br>";
        echo "ชื่อสินค้า: " . $row["pname"] . "<br>";
        echo "ราคา: " . $row["price"] . " บาท <br>";
        echo "จำนวน: " . $row["total_quantity"] . " ชิ้น <br>";
        echo "<hr>\n";
    }

    ?>
    <br>
</body>

</html>
