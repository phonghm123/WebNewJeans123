<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
    <ul class="admincp_list">
        <li><a class="btn btn-primary" href="../index.php">Quay về trang chủ</a></li>
        <li><a class="btn btn-primary" href="index.php?action=quanlysanpham&query=lietke">Danh sách sản phẩm </a></li>
        <li><a class="btn btn-primary" href="index.php?action=quanlysanpham&query=them">Thêm sản phẩm </a></li>

        <?php
        if (isset($_SESSION['dangnhap'])) {
            if ($_SESSION['dangnhap'] == 'admin') {
                ?>
                <li><a class="btn btn-primary" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm
                    </a></li>
                <li><a class="btn btn-primary" href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a></li>

                <?php

            }
        }

        ?>
        <li><a class="btn btn-primary" href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng </a></li>
        <li><a class="btn btn-primary" href="index.php?action=thongkethang&query=thongkethang">Thông kê theo các tháng</a>
        <li><a class="btn btn-primary" href="index.php?action=chatbox&query=chat">Chat box</a>
        </li>
    </ul>
</body>

</html>
