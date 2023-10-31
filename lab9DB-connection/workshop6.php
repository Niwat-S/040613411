<?php include "connect.php" ?>
<html>

<head>
    <meta charset="utf-8">
    <script>
        function confirmDelete(username) { // ฟังก์ชนจะถูกเรียกถ้าผู้ใช ั คลิกที่link ลบ
            var ans = confirm("ต้องการลบ " + username); // แสดงกล่องถามผู้ใช ้
            if (ans == true) // ถ้าผู้ใชกด ้ OK จะเข ้าเงื่อนไขนี้
                document.location = "member-delete.php?username=" + username; 
        }
    </script>
</head>

<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "username  : " . $row["username"] . "<br>";
        echo "name  :" . $row["name"] . "<br>";
        echo "address : " . $row["address"] . "<br>";
        echo "mobile: " . $row["mobile"] . " <br>";
        echo "<a href='editform.php?username=" . $row["username"] . "'>แก ้ไข</a> | ";
        echo "<a href='member-delete.php' onclick=\"confirmDelete('" . $row["username"] . "')\">ลบ</a>";

        echo "<hr>\n";
    }
    ?>
</body>

</html>