<?php
    session_start();
    include "../../../admincp/config/connect.php";
   
    //XÓA SẢN PHẨM
    if(isset($_SESSION['cart'])&& isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        $size = $_GET['size']; // thêm dòng này để lấy giá trị size từ URL
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id || $cart_item['size']!=$size){
                //thiết lập lại session 
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'noidung'=>$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
                
            }
        $_SESSION['cart']=$product;
        header('Location:../../../index.php?quanly=giohang');
        }
		
	}

?>