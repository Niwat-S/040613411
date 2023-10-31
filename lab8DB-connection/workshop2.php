<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member");
    $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()) { ?>
                ชื่อสมาชิก: <?= $row["name"] ?><br>
                ที่อยู่: <?= $row["address"] ?> <br>
                อีเมล์: <?= $row["email"] ?> <br>
            <hr>
        <?php } ?>
</body>
</html>