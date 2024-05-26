<?php
include "../../config/connect.php";

if(isset($_GET['code'])){
    $code_cart = $_GET['code'];
    $sql_update_tt ="UPDATE tbl_cart_detail SET tinhtrangtt=1 WHERE code_cart='".$code_cart."'";
    $query_tt = mysqli_query($connect,$sql_update_tt);
    if($query_tt){
        echo '<script>alert("Cập nhật tình trạng thành công");</script>';
    }else{
        echo '<script>alert("Cập nhật tình trạng thất bại");</script>';
    }
    header('Location:../../index.php?action=quanlydonhang&query=them');
}
?>