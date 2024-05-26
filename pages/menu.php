<html>
    <head>
    <style>
        .search{
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid black;
            height: 20px;
        }
        .search:hover{
            background-color: aliceblue;
        }
        .tkiem{
            height: 25px;
            border-radius: 5px;
            background-color: aliceblue;
            color: black;
            
        }
        .tkiem:hover{
            background-color:  midnightblue;
            color: aliceblue;
        }
    </style>
    </head>
<body>
<?php
     $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
     $query_danhmuc=mysqli_query($connect,$sql_danhmuc);
     

?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="menu">
               
            <ul class="menu_list">
                <div class="left-side">
                <img src="./images/logoNJ1.jpg" alt="" style="height: 100px; width: 100px; margin-right: 20px; margin-bottom: 10px">
                    <li> <a href="index.php">Trang chủ</a></li>
                  
                    <li> <a href="index.php?quanly=contact">Liên hệ </a></li>
                    <li> <a href="index.php?quanly=giohang">Giỏ hàng</a></li>
                    <li><a href="index.php?quanly=tatcasanpham">Sản phẩm</a>
                        <ul class="menu_danhmuc">
                        <?php
                                    while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){

                                ?>
                                <li> <a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc']?></a></li>

                                <?php
                                    }

                                ?>
                        </ul>
               </li>
               <li> <a href="index.php?quanly=chatbox">Chat box</a></li>
                </div>
                
            </ul>
                <?php
                    if(isset($_SESSION['dangky'])){
                ?>
                <ul class="menu_list">
                <div class="right-side">
                        <li><a href="index.php?quanly=thongtin"> Thông Tin</a></li>
                        <li> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
                        <li><a href="index.php?quanly=xemtrangthai"> Xem đơn</a></li>
                        <li><a href="index.php?quanly=doimatkhau"> Đổi mật khẩu</a></li>
                   </div>
                </ul>
                   
                    
                <?php
                    }else{
                ?>
                <ul class="menu_list">
                <div class="right-side">
                    <li> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                    <li> <a href="index.php?quanly=dangky">Đăng ký</a></li>
                </div>
                </ul>
                
                     
                <?php
                    }
                ?>
                 
                
               <ul class="menu_list right-side"  style="display:">
                    <li> 
                        <Form method="POST" action="index.php?quanly=timkiem"> 
                            <input class="search" type="text" placeholder="search..." name="tukhoa">
                            <input class="tkiem" type="submit" name="timkiem" value="Tìm Kiếm">
                        </Form>
                    </li>
               </ul>
                
            
 </div>
 </body>
</html>