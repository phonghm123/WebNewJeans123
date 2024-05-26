<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="container" style="border-bottom: 2px solid black;">
        <h1 style="text-align:center">Trang quản lý danh sách sản phẩm</h1>
        <div class="row">
            <form class="col-6" method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">

                <br />
                Nhập tên sản phẩm:
                <input class="form-control" type="text" name="tensanpham" id="">
                <br>
                Nhập mã sản phẩm:
                <input class="form-control" type="text" name="masp" id="">
                <br>
                Nhập giá sản phẩm:
                <input class="form-control" type="number" name="giasp" id="">
                <br>
                Nhập số lượng sản phẩm:
                <input class="form-control" type="number" name="soluong" id="">
                <br>
                Chọn ảnh sản phẩm:
                <input class="form-control" type="file" name="hinhanh" id="">
                <br>
                Nhập tóm tắt:
                <input class="form-control" type="text" name="tomtat" id="">
                <br>
                Nhập vào nội dung sản phẩm:
                <textarea class="form-control" name="noidung" id="" cols="30" rows="10"></textarea>
                <script>
                    CKEDITOR.replace('noidung');
                </script>
                <br>
                <select class="form-control" name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($connect, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                        <!--dùng value thêm danh mục dựa vào địa chỉ id_danhmuc -->
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>


                    <?php
                    }
                    ?>
                </select>
                <br />
                Tình trạng
                <select class="form-control" name="hienthi">
                    <option value="1">Mới</option>
                    <option value="0">Cũ</option>
                </select>
                <br>
                <input class="btn btn-primary" type="submit" name="themsanpham" value="Thêm mới">
            </form>
        </div>
    </div>
</body>

</html>