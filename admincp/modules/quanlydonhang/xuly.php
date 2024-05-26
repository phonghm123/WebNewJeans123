<?php
include "../../config/connect.php";

if (isset($_GET['code']) && isset($_GET['cart_status'])) {
    $code_cart = $_GET['code'];
    $cart_status = $_GET['cart_status'];

    // Kiểm tra giá trị của tinhtrangtt
    $sql_check_tinhtrangtt = "SELECT tinhtrangtt FROM tbl_cart_detail WHERE code_cart='$code_cart'";
    $result_check_tinhtrangtt = mysqli_query($connect, $sql_check_tinhtrangtt);
    $row = mysqli_fetch_assoc($result_check_tinhtrangtt);
    $tinhtrangtt = $row['tinhtrangtt'];

    // Kiểm tra nếu tinhtrangtt là 0 thì không thực hiện cập nhật cart_status thành 2 (đang giao)
    if ($tinhtrangtt == 0 && $cart_status == 2) {
        echo '<script>alert("Không thể chuyển trạng thái vì đơn hàng chưa thanh toán.");</script>';
    } else {
        $sql_update = "UPDATE tbl_giohang SET cart_status=$cart_status WHERE code_cart='$code_cart'";
        $query = mysqli_query($connect, $sql_update);
        if ($query) {
            echo '<script>alert("Update successful");</script>';
        } else {
            echo '<script>alert("Update failed");</script>';
        }
    }
    header('Location:../../index.php?action=quanlydonhang&query=them');
}

if (isset($_GET['code_cart'])) {
    $id = $_GET['code_cart'];
    $sql_delete = "DELETE FROM tbl_giohang WHERE  code_cart='$id'";
    mysqli_query($connect, $sql_delete);
    $sql_delete_cart_detail = "DELETE FROM tbl_cart_detail WHERE  code_cart='$id'";
    mysqli_query($connect, $sql_delete_cart_detail);
    header('Location:../../index.php?action=quanlydonhang&query=them');
}

?>
