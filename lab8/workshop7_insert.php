<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute(); 
    if ($_FILES["picture"]["tmp_name"]) {
        $targetfile = 'img/' . $_POST["username"] . '.jpg'; 
        $upload = move_uploaded_file($_FILES["picture"]["tmp_name"], $targetfile);
    }
    
    
?>
<html>
<head><meta charset="UTF-8"></head>
<body>
เพิ่มสมาชิกสำเร็จ username : <?=$_POST["username"]?>
</body>
</html> 