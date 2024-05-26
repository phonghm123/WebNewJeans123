 <style>
     .thongtin{
         width: 100%;
         height: 100%;
         border: 3px solid black;
         text-align: left;
         border-radius: 15px;
         background-color:floralwhite ;
     }
     p{
        margin-left: 20px;
     }
     h3,h2{
        margin-left: 20px;
     }
 </style>
 
 <h2>Thông tin cá nhân </h2>
<div class="thongtin">
 <p><?php
        if(isset($_SESSION['dangky'])){
            echo '<h3>Xin Chào: '.'<span style="color:red">'.$_SESSION['dangky'].'</span></h3>';
            $id =$_SESSION['dangky'];
            $sql_thongtin ="SELECT * FROM tbl_dangky WHERE taikhoan='$id' LIMIT 1";
            $query_thongtin=mysqli_query($connect,$sql_thongtin);
            while($row=mysqli_fetch_array($query_thongtin)){
  ?></p><br>
    <p>Họ và tên : <?php echo $row['hovaten']  ?></p>
    <p>Email : <?php echo $row['email']  ?></p>
    <p>Địa chỉ : <?php echo $row['diachi']  ?></p>
    <p>Số điện thoại : <?php echo $row['sodienthoai']  ?></p>
  <a href="index.php?quanly=doithongtin" style="text-decoration: none; margin-left: 20px;">Thay đổi thông tin</a>


<?php
            }
    }

    ?>
</div>