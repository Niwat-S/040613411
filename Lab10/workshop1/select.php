<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(empty($_COOKIE['lang'])){
            setcookie("lang",$_GET['language'],time()+10);
        }
        
        if(isset($_COOKIE['lang'])){
            setcookie("lang",$_GET["language"],time()+10);
        }


    ?>
    <a href="main.php">Go to main</a>
</body>
</html>