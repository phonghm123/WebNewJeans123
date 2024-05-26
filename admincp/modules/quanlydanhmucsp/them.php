 
 <html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
<div class="container" style="margin-bottom:50px">
        <h1 style="text-align:center">Trang quản trị danh mục sản phẩm</h1>
        <div class="row">
   <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
    Nhập vào tên danh mục:
        <input class="form-control" type="text" name="tendanhmuc" id="">
        <br>
    Nhập tứ tự:
        <input class="form-control" type="text" name="thutu" id="">
        <br>

        <input class="btn btn-primary" type="submit" value="Thêm danh mục sản phẩm" name="themdanhmuc">
    
</form>
</body>
 </html>
