<?php session_start(); 
    include "connect.php";
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");

    }
    else if(isset($_SESSION['user'])){
        header("location: user-home.php");
    }
    ?>

<html>
<body>
    <h1>สวัสดี Admin <?=$_SESSION["fullname"]?></h1>

    หากต้องการออกจากระบบโปรดคลิก <a href='logout.php'>ออกจากระบบ</a><br><br>
    </a>

    <hr>
    <br>

    <?php 
           $user = $_SESSION['username'];
           $stmt = $pdo->prepare("SELECT *,COUNT(tid) AS ordercount, SUM(price) AS totalprice FROM orders 
           INNER JOIN member ON member.username = orders.username INNER JOIN item ON item.ord_id = orders.ord_id 
           INNER JOIN product ON product.pid = item.pid GROUP BY name");
           
           $stmt->execute();
        
           while ($row = $stmt->fetch()) {
               echo "ผู้ซื้อ : " . $row["username"] . "<br>";
               echo "จำนวนออเดอร์: <a href='view_order.php?username=" . $row['username'] . "'>" . $row['ordercount'] . "</a> ออเดอร์ <br>";
               echo "ยอดรวมทุกออเดอร์: " . $row ["totalprice"] . " บาท <br>";
               echo "<hr>\n";
           }    
    ?>
    <h3>ตรวจดูสินค้าคงเหลือ <a href="inventory.php">ที่นี่</a></h3>
    <hr>
</body>
</html>
