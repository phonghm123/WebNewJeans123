<?php
    session_start();
    include "../../../admincp/config/connect.php";
    //them so luong

    //tru so luong

	//xóa sản phẩm 
	if(isset($_SESSION['cart'])&& $_GET['xoa']){

		
	}

    
  //them 
if(isset($_POST['themgiohang'])){
    //session_destroy();
    $id=$_GET['idsanpham'];
    $soluong=1;
    $size = $_POST['size']; // thêm dòng này để lấy giá trị size từ form thêm sản phẩm
    $sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
    $query = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasanpham'=>$row['giasanpham'],'hinhanh'=>$row['hinhanh'],'noidung'=>$row['noidung'],'masp'=>$row['masanpham'], 'size' => $size)); // thêm 'size' => $size vào mảng $new_product
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                //neu du lieu trung
                if($cart_item['id']==$id && $cart_item['size'] == $size){ // thêm điều kiện so sánh size
                    $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'noidung'=>$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $size); // thêm 'size' => $size vào mảng $product
                    $found = true;
                }else{
                    //neu du lieu khong trung
                    $product[]= array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'noidung'=>$cart_item['noidung'],'masp'=>$cart_item['masp'], 'size' => $cart_item['size']); // thêm 'size' => $cart_item['size'] vào mảng $product
                }
            }
            if($found == false){
                //lien ket du lieu new_product voi product
                $_SESSION['cart']=array_merge($product,$new_product);
            }else{
                $_SESSION['cart']=$product;
            }
        }else{
            $_SESSION['cart'] = $new_product;
        }

    }
    header('Location:../../../index.php?quanly=giohang');
    
}