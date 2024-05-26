<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
        <div class="arrow-steps clearfix">
            <div class="step "> <span> <a href="../../../index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
            <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Kiểm tra </a></span> </div>
            <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
            
        </div>

<h4>Thông tin vận chuyển</h4>


<?php
 	$id_dangky = $_SESSION['id_khachhang'];
 	$sql_get_vanchuyen = mysqli_query($connect,"SELECT * FROM tbl_dangky WHERE id_khachhang='$id_dangky' LIMIT 1");
	
 	
 	if($id_dangky!=''){
 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
 		$name = $row_get_vanchuyen['hovaten'];
 		$phone = $row_get_vanchuyen['sodienthoai'];
 		$address = $row_get_vanchuyen['diachi'];
 		$note = $row_get_vanchuyen['email'];
 	}else{
		 
 		$name = '';
 		$phone = '';
 		$address = '';
 		$note = '';
 	}
 	?>
 		
<div class="col-md-12">
  		
  		<ul>
  			<li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
  			<li>Số điện thoại : <b><?php echo $phone ?></b></li>
  			<li>Địa chỉ : <b><?php echo $address ?></b></li>
  			<li>Gmail: <b><?php echo $note ?></b></li>
  		</ul>
<h4>Nếu bạn muốn đổi địa chỉ tài khoản hãy liên hệ shop ở phần Contact nhé</h4>
	<!--GIO HANG---->
    <table style="width:100%;text-align: center;border-collapse: collapse;" border="2">
    <tr>
        <th style="border: 2px solid black;">ID</th>
        <th style="border: 2px solid black;">Mã :</th>
        <th style="border: 2px solid black;">Tên</th>
        <th style="border: 2px solid black;">Hình</th>
        <th style="border: 2px solid black;">Số lượng</th>
        <th style="border: 2px solid black;">Size</th>
        <th style="border: 2px solid black;">Giá :</th>
        <th style="border: 2px solid black;">Thành tiền</th>
    </tr>
<?php
    if(isset($_SESSION['cart'])){
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
            $tongtien+=$thanhtien;
            $i++;
?>
    <tr>
        <td style="border: 2px solid black;"><?php echo $i?></td>
        <td style="border: 2px solid black;"><?php echo $cart_item['masp']?></td>
        <td style="border: 2px solid black;"><?php echo $cart_item['tensanpham']?></td>
        <td style="border: 2px solid black;"><img src="../../../admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']?>" width="150px"></td>
        <td style="border: 2px solid black;">
            <?php echo $cart_item['soluong']?>
        </td>
        <td style="border: 2px solid black;"><?php echo $cart_item['size']?></td>
        <td style="border: 2px solid black;"><?php echo number_format($cart_item['giasanpham'],0,',','.'). ' VNĐ'?></td>
        <td style="border: 2px solid black;"><?php  echo number_format($thanhtien,0,',','.'). ' VNĐ'?></td>
    </tr>

<?php 
        }
?>

    <tr>
        <td colspan="8">
            <p class="btn btn-success" style="float: left;"> Tổng tiền : <?php echo number_format($tongtien,0,',','.'). ' VNĐ' ?></p>
            <div style="clear: both;"> </div>

                <?php
                        if(isset($_SESSION['dangky'])){
                            
               ?>
                        <p><a href="index.php?quanly=thongtinthanhtoan" class="btn btn-dark">Hình thức thanh toán</a></p>
                <?php
                }else{
                
               ?>
                     <p><a class="btn btn-primary" href="index.php?quanly=dangky">Đăng kí đặt hàng</a></p>
                <?php
                 }
               ?>     
        </td>
    </tr>
<?php   
    }else{ 
?>
    <tr>
        <td colspan="6">Hiện tại giỏ hàng trống</td>
    </tr>
<?php
    }
?>
</table>