<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<?php
    // 1. กำหนดคำสั่ง SQL ให้ดึงสินค้าตามรหัสสินค้า
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]); // 2. นำค่า pid ที่สงมากับ URL กำหนดเป็นเงื่อนไข
    $stmt->execute(); // 3. เริ่มค้นหา
    $row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
?>
<div >
   
    <div style="padding: 15px">
    <img src='member_photo/<?= $row["username"] ?>.jpg' width='100'><br>
         ชื่อสมาชิก: <?= $row["name"] ?><br>
        ที่อยู่: <?= $row["address"] ?> <br>
        อีเมล์: <?= $row["email"] ?> <br>
    </div>
    <hr>
</div>
</body> 