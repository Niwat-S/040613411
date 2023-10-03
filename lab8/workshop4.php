<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE name  LIKE ?");
    if (!empty($_GET))
        $value = '%' . $_GET["keyword"] . '%';
    $stmt->bindParam(1, $value);
    $stmt->execute();
    ?>
    <?php while ($row = $stmt->fetch()) { ?>
        ชื่อสมาชิก: <?= $row["name"] ?><br>
        ที่อยู่: <?= $row["address"] ?> <br>
        อีเมล์: <?= $row["email"] ?> <br>

        <img src='./member_photo/<?= $row["username"] ?>.jpg' width='100'><br>
        <hr>
    <?php } ?>

</body>

</html>