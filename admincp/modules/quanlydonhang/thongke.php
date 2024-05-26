<?php
    include "../../config/connect.php";

    // Construct the SQL query
    $sql_thongke = "SELECT MONTH(tbl_cart_detail.thoigianmua) AS thang, YEAR(tbl_cart_detail.thoigianmua) AS nam, SUM(tbl_cart_detail.soluongmua * tbl_sanpham.giasanpham) AS tongdoanhthu
                    FROM tbl_cart_detail
                    INNER JOIN tbl_giohang ON tbl_cart_detail.code_cart = tbl_giohang.code_cart
                    INNER JOIN tbl_sanpham ON tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham
                    WHERE tbl_giohang.cart_status IN (3)
                    GROUP BY MONTH(tbl_cart_detail.thoigianmua), YEAR(tbl_cart_detail.thoigianmua)";

    $result_thongke = mysqli_query($connect, $sql_thongke);

    echo "<h1>Thống kê doanh thu theo tháng</h1>";
    while ($row_thongke = mysqli_fetch_array($result_thongke)) {
        $thang = $row_thongke['thang'];
        $nam = $row_thongke['nam'];
        $tongdoanhthu = $row_thongke['tongdoanhthu'];
        $tongdoanhthu_formatted = number_format($tongdoanhthu, 0, '.', ',');

        echo "<p>Tháng $thang năm $nam: <span style='font-weight: bold;'>". $tongdoanhthu_formatted. "</span> VND</p>";
    }
?>