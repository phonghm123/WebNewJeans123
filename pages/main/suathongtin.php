<?php
    include "../../config/connect.php";
    $hovaten=$_POST['hovaten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];

   if(isset($_POST['suanguoidung'])){
        $sql_sua_nd="UPDATE tbl_dangky SET hovaten='".$hovaten."',email='".$email."',sodienthoai='".$sodienthoai."',diachi='".$diachi."' WHERE id_khachhang='$_GET[idnguoidung]'";
        mysqli_query($connect,$sql_sua_nd);
        header('Location:../../index.php?quanly=thongtin');
    }
?>