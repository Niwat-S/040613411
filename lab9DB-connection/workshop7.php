<?php include "connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert Member </title>
</head>
<body>
<form action="workshop7_insert.php" method="post" enctype="multipart/form-data">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>

        <label for="name">Name:</label>
        <input name="name" id="name"><br><br>

        <label for="address">Address:</label>
        <textarea name="address" id="address"></textarea><br><br>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" id="mobile"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br><br>

        <label for="image">Image:</label>
        <input type="file" name="picture" id="picture"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
