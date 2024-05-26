<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_admincp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <title>Trang quản trị</title>
    <style>img {
    display: inline-block;
    vertical-align: middle;
}</style>
</head>
<body>
<div style="text-align: center;">
    <img src="..\images\logoNJ1.jpg" style="width: 12%; height: 150px;">
</div>
    <h3 class="admincp_tile">Chào mừng tới trang quản trị của NewJeans</h3>
    <div class="wrapper">
    <?php
        include("config/connect.php");
        include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");
    ?>
    </div>
</body>
</html>