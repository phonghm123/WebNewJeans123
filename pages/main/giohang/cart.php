<html>
    <head>
        <style>
            .btn-delete{
                background-color: #dc3545;
                text-decoration: none;
                color: #fff;
                border-radius: 8px;
                font-family: 'Times New Roman', Times, serif;
                padding: 10px 10px;
                box-shadow: -1px 2px 1px 0px darkgray;
            }
            .btn-delete:hover{
                background-color: #bb2d3b;
            }
            .total-money{
                background-color: #198754;
                text-decoration: none;
                color: #fff;
                border-radius: 8px;
                font-family: 'Times New Roman', Times, serif;
                padding: 10px 10px;
                box-shadow: -1px 2px 1px 0px darkgray;
            }
            .total-money:hover{
                background-color: #157347;
            }
            .btn-submit{
                background-color: #0d6efd;
                text-decoration: none;
                color: #fff;
                border-radius: 8px;
                font-family: 'Times New Roman', Times, serif;
                padding: 10px 10px;
                box-shadow: -1px 2px 1px 0px darkgray;
            }
            .btn-submit:hover{
                background-color: #0a58ca;
            }
            h1,h2{
                margin-left: 15px;
            }
        </style>    
    </head>
    <body>
    <h1>Giỏ Hàng</h1>
          
    <p><?php
        if(isset($_SESSION['dangky'])){
            echo '<h2>Xin chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span></h2>';
        
        } 
  ?></p>

    
    <?php
            if(isset($_SESSION['cart'])){

                
            }

    ?>
    <table class="table table-striped" style="width:100%; border: 2px solid black; text-align: center;">
        <tr>
            <th style="border: 2px solid black;">ID</th>
            <th style="border: 2px solid black;">Mã :</th>
            <th style="border: 2px solid black;">Tên</th>
            <th style="border: 2px solid black;">Hình ảnh</th>
            <th style="border: 2px solid black;">Số lượng</th>
            <th style="border: 2px solid black;">Size</th>
            <th style="border: 2px solid black;">Giá :</th>
            <th style="border: 2px solid black;">Thành tiền</th>
            <th style="border: 2px solid black;">Hành động</th>
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
            <td style="border: 2px solid black;"><?php echo $i ?></td>
            <!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
            <td style="border: 2px solid black;"><?php echo $cart_item['masp']?></td>
            <td style="border: 2px solid black;"><?php echo $cart_item['tensanpham'] ?></td>
            <td style="border: 2px solid black; width: 180px;"><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" width="100%" height="100%"></td>
            <td style="border: 2px solid black;">
    <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>&size=<?php echo $cart_item['size'] ?>"><i class="fas fa-minus"></i></a>
    <?php echo $cart_item['soluong'] ?>
    <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>&size=<?php echo $cart_item['size'] ?>"><i class="fas fa-plus"></i></a>
</td>
            <td style="border: 2px solid black;"><?php echo $cart_item['size'] ?></td>
            <td style="border: 2px solid black;"><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
            <td style="border: 2px solid black;"><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
            <td style="border: 2px solid black;">
    <a class="btn-delete" href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id']?>&size=<?php echo $cart_item['size']?>">XÓA</a>
</td>
        </tr>


    <?php 
            }
    ?>

        <tr>
            <td colspan="8">
                <p class="total-money" style="float: left"> Tổng tiền: <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                <p  style="float: right" ><a class="btn-delete" href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet"> Xóa Tất Cả Sản Phẩm </a></p>
                <div style="clear:both;"> </div>

                    <?php
                            if(isset($_SESSION['dangky'])){
                                
                    ?>
                            <p><a class="btn-submit" href="pages/main/thanhtoan/index.php?quanly=vanchuyen">Đặt hàng</a></p>
                    <?php
                    }else{
                    
                    ?>
                         <p><a class="btn-submit" href="index.php?quanly=dangnhap">Đăng nhập để đặt hàng</a></p>
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
    </body>
</html>