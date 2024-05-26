 <p>Xem đơn hàng</p>
 <?php
    $code=$_GET['code'];
    $sql_lietke_dh="SELECT * FROM tbl_cart_detail ,tbl_sanpham  WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham 
        AND tbl_cart_detail.code_cart=$code
        ORDER BY tbl_cart_detail.id_cart_detail DESC";
    $result_lietke_dh= mysqli_query($connect,$sql_lietke_dh);
?>
<p>Thông tin chi tiết đơn hàng</p>
 <table style="width: 100%;" style="border-collapse:collapse;"> 
     <tr>
         <td style="border: 2px solid black;">ID</td>
         <td style="border: 2px solid black;">Mã đơn hàng</td>
         <td style="border: 2px solid black;">Tên Sản phẩm</td>
         <td style="border: 2px solid black;">Hình </td>
         <td style="border: 2px solid black;">Số lượng</td>
         <td style="border: 2px solid black;">Size</td>
         <td style="border: 2px solid black;">Đơn giá</td>
         <td style="border: 2px solid black;">Thành tiền</td>
         
     </tr>
     <?php
    $i=0;
    $tongtien=0;
    while($row=mysqli_fetch_array($result_lietke_dh)){
        $i++;
        $thanhtien= $row['giasanpham'] * $row['soluongmua'];
        $tongtien+=$thanhtien;
     ?>
     <tr>
         <td style="border: 2px solid black;"><?php echo $i ?></td>
         <td style="border: 2px solid black;"><?php echo $row['code_cart'] ?></td>
         <td style="border: 2px solid black;"><?php echo $row['tensanpham']?></td>
         <td style="width:150px;height:150px; border: 2px solid black;" >
                            <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?> " width="100%" >   
         </td>
         <td style="border: 2px solid black;"><?php echo $row['soluongmua']?></td>
         <td style="border: 2px solid black;"><?php echo $row['size']?></td>
         <td style="border: 2px solid black;"><?php echo number_format($row['giasanpham'],0,',','.').'VNĐ' ?></td>
         <td style="border: 2px solid black;"><?php echo number_format($thanhtien,0,',','.').'VNĐ' ?></td>
         
     </tr>
     <?php
    }
    ?>
     <tr>
         <th class="btn btn-success"colspan="7">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'VNĐ' ?></th>
         
     </tr>
     <tr>
    
     </tr>
    
 </table>


 