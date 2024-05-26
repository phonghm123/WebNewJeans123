<?php
    session_start();
    include "../../../admincp/config/connect.php";
   //TĂNG SỐ LUONG
if(isset($_GET['cong'])){
	$id=$_GET['cong'];
    $size = $_GET['size']; // thêm dòng này để lấy giá trị size từ URL
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id || $cart_item['size']!= $size){ // thêm điều kiện so sánh size
            $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
            $_SESSION['cart'] =$product;
        }
        else{
            
            if($cart_item['soluong']<=10){
                $tangsoluong =$cart_item['soluong']+1;
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
         
            }else{
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
         

            }
            $_SESSION['cart'] =$product;
        }

    }
    header('Location:../../../index.php?quanly=giohang');
}
//TRỪ SỐ LƯỢNG
if(isset($_GET['tru'])){
	$id=$_GET['tru'];
    $size = $_GET['size']; // thêm dòng này để lấy giá trị size từ URL
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id || $cart_item['size']!= $size){ // thêm điều kiện so sánh size
            $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
            $_SESSION['cart'] =$product;
        }
        else{
            
            if($cart_item['soluong']>1){
                $trusoluong =$cart_item['soluong']-1;
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$trusoluong,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
         
            }else{
                $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']);
         

            }
            $_SESSION['cart'] =$product;
        }

    }
    header('Location:../../../index.php?quanly=giohang');
}

?>