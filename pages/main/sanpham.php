 <head>
   <style>
      h2{
         text-align: left;
      }
      h1{
         margin-left: 20px;
      }
      .warpper_deital{  
         margin-left: 20px;
      }
      .hinhanh_sanpham img{
         box-shadow: 2px -2px 6px 5px dimgray;
      }
      .warpper_deital form{
         border-right: 2px solid black;
         float: right;
      }
   </style>
 </head>
 <body>
 <h1>Chi tiết sản phẩm </h2>
 <?php
    $sql_chitiet ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet=mysqli_query($connect,$sql_chitiet);
    while ($row_chitiet=mysqli_fetch_array($query_chitiet)){
 ?>
 <div class="warpper_deital"> 
 <div class="hinhanh_sanpham">
        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">
 </div>
    <form action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
        <div class="chitiet_sanpham" style="padding: 20px;">
            <h2 style="margin: 0;"><?php echo $row_chitiet['tensanpham'] ?></h2>
            <h2>Giá: <?php echo number_format($row_chitiet['giasanpham'],0,',','.').'đ' ?></h2>
            <p>Số lượng:
                <?php
                    if($row_chitiet['soluong'] > 0) {
                        echo $row_chitiet['soluong'];
                    } else {
                        echo "Hết hàng";
                    }
                ?>
            </p>
            <p>Danh mục :
         <?php echo $row_chitiet['tendanhmuc'] ?>
      </p>
      <p>Trạng thái :
  <?php
    if ($row_chitiet['trangthai'] == 1) {
      echo "Mới";
    } else {
      echo "Cũ";
    }
  ?>
</p>
</p>
            <p>Size:
                <select name="size">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </p>
            <p><input  class="themgiohang" type="submit" name="themgiohang" value="Thêm Giỏ Hàng"></p>
            <details>
 <p>Tóm tắt :
         <?php echo $row_chitiet['tomtat'] ?>
      </p>
      <p>Nội dung :
         <?php echo $row_chitiet['noidung'] ?>
      </p>
 </details>
        </div>
    </form>
    <div class="sidebar">
                <ul class="sidebar_list">
                    <?php
                        $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc=mysqli_query($connect,$sql_danhmuc);
                        while ($row=mysqli_fetch_array($query_danhmuc)){

                    ?>
                    <li><a href="index.php?quanly=danhmuclist&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc']?></a></li>
                    <?php

                        }
                        ?>
                </ul>
</div>
 </div>
 <?php
    }
 ?>
 </body>