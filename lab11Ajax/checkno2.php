<?php
include "connect.php";
$username = $_GET['username'];
$stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");
$stmt->bindParam(1, $username);
$stmt->execute();
?>
<table border="1">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Name</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Role</th>
        <th>Photo</th>
    </tr>
    <?php while ($row = $stmt->fetch()): ?>
        <tr>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['mobile'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><img src="../lab8/member_photo/<?php echo $row['username'] ?>.jpg" alt=""></td>
        </tr>
    <?php endwhile; ?>
</table>