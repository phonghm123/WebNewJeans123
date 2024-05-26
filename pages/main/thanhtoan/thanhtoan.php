<?php
session_start();
include('../../../admincp/config/connect.php');

if (isset($_POST['redirect'])) {
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0, 9999); // random tuwf 0 den 4 so
    $cart_pay = $_POST['payment'];
    $size = $_GET['size'];
    $createDate = new DateTime(null, new DateTimeZone('Asia/Ho_Chi_Minh'));
    $cart_date = $createDate->format('Y-m-d H:i:s');

    $insert_cart = "INSERT INTO tbl_giohang(id_khachhang, code_cart, cart_status, cart_payment, size) 
                    VALUES ('$id_khachhang', '$code_order', 0, '$cart_pay', '$size')";
    $cart_query = mysqli_query($connect, $insert_cart);

    if ($cart_query) {
        // thêm giỏ hàng chi tiết
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $size = $value['size'];
            $insert_order_details = "INSERT INTO tbl_cart_detail(id_sanpham, code_cart, soluongmua, thoigianmua, size, tinhtrangtt) 
                                    VALUES ('$id_sanpham', '$code_order', '$soluong', '$cart_date', '$size', 0)";
            mysqli_query($connect, $insert_order_details);
        }
        // Hiển thị cửa sổ thông báo đặt hàng thành công
    }
    echo "<script>alert('Đặt hàng thành công!');</script>";
    header('Location:../../../index.php');
}
?>