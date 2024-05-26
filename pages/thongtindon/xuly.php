<?php
    include "../../admincp/config/connect.php";

    if(isset($_GET['code_cart'])){
        $id = $_GET['code_cart'];
        $sql_check_status = "SELECT cart_status FROM tbl_giohang WHERE code_cart = '$id'";
        $result = mysqli_query($connect, $sql_check_status);
        $row = mysqli_fetch_assoc($result);
        if ($row['cart_status'] == 0 || $row['cart_status'] == 1) {
            $sql_delete = "DELETE FROM tbl_giohang WHERE code_cart = '$id'";
            mysqli_query($connect, $sql_delete);
            $sql_delete_cart_detail = "DELETE FROM tbl_cart_detail WHERE code_cart = '$id'";
            mysqli_query($connect, $sql_delete_cart_detail);
            echo "<script>alert('Đơn hàng đã được hủy thành công.'); window.location.href='../../index.php?quanly=xemtrangthai';</script>";
        } elseif ($row['cart_status'] == 2) {
            echo "<script>alert('Không thể hủy đơn hàng này. Đơn hàng đang được giao.'); window.history.back();</script>";
        } elseif ($row['cart_status'] == 3) {
            echo "<script>alert('Không thể hủy đơn hàng này. Đơn hàng đã giao xong.'); window.history.back();</script>";
        }
    }
