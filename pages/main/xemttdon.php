
<?php
$sql_lietke_dh = "SELECT 
                    tbl_giohang.*,
                    tbl_dangky.hovaten,
                    tbl_dangky.diachi,
                    tbl_dangky.taikhoan,
                    tbl_dangky.sodienthoai,
                    GROUP_CONCAT(tbl_cart_detail.id_sanpham) AS sanpham_ids,
                    GROUP_CONCAT(tbl_cart_detail.soluongmua) AS soluongmua_list,
                    GROUP_CONCAT(tbl_cart_detail.size) AS size_list,
                    tbl_cart_detail.thoigianmua,
                    tbl_cart_detail.tinhtrangtt
                FROM 
                    tbl_giohang 
                JOIN 
                    tbl_dangky ON tbl_giohang.id_khachhang = tbl_dangky.id_khachhang 
                JOIN 
                    tbl_cart_detail ON tbl_giohang.code_cart = tbl_cart_detail.code_cart 
                GROUP BY 
                    tbl_giohang.code_cart
                ORDER BY 
                    tbl_giohang.id_cart DESC";
$result_lietke_dh = mysqli_query($connect, $sql_lietke_dh);


if (mysqli_num_rows($result_lietke_dh) == 0) {
    echo "<h1>Hiện tại bạn chưa có đơn hàng nào. Hãy đặt hàng để có thể trải nghiệm dịch vụ tốt nhé</h1>";
} else {
?>
<div class="table-container">
  <h1 style="font-family: 'Times New Roman', Times, serif;">Danh sách đơn hàng của người dùng</h1>
  <table class="table table-striped" style="font-family: 'Times New Roman', Times, serif;">
  <thead>
    <tr>
        <th>ID</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Hình thức trả</th>
        <th>Điện thoại</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng Thái đơn</th>
        <th>Thanh toán</th>
        <th colspan="2">Quản lý</th>
    </tr>
</thead>

    <?php
    $i = 0;
  
    while ($row = mysqli_fetch_array($result_lietke_dh)) {
        $i++;
        
       
   ?>
   <tbody>
    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $row['code_cart']?></td>
        <td><?php echo $row['hovaten']?></td>
        <td><?php echo $row['diachi']?></td>
        <td><?php echo $row['cart_payment']?></td>
        <td><?php echo $row['sodienthoai']?></td>
        <td><?php echo date('Y-m-d H:i:s', strtotime($row['thoigianmua']));?></td>
        <td>
        <?php if ($row['cart_status'] == 0) {
                echo '<a>Chưa xác nhận</a>';
            } else if ($row['cart_status'] == 1) {
                echo '<a>Đã xác nhận</a>';
            } else if ($row['cart_status'] == 2) {
                echo '<a>Đang giao</a>';
            } else if ($row['cart_status'] == 3) {
                echo '<a>Đã giao</a>';
            }
            else{
                
            }
          ?>
        </td>
<td>        <?php if ($row['tinhtrangtt'] == 0) {
                echo '<a href="index.php?quanly=xemthanhtoan" style="text-decoration: none; text-color: black">Chưa thanh toán</a>  ';
            } else if ($row['tinhtrangtt'] == 1) {
                echo '<a>Đã thanh toán</a>';
            }
          ?></td>
        <td>
            <a class="btn btn-primary" href="index.php?quanly=xemthongtin&code=<?php echo $row['code_cart']?>">Xem đơn hàng</a>
        </td>
        <td>
            <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteOrder(<?php echo $row['code_cart']?>);">Hủy</a>
        </td>
    </tr>
</tbody>
     
     <?php
    }
  ?>

 </table>
 <script>function deleteOrder(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn hủy đơn hàng này?',
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, hủy nó!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "pages/thongtindon/xuly.php?code_cart=" + id;
        }
    })
}</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
  }
?>
<style>
  .table-container {
    width: 100%;
    overflow-x: auto;
  }
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
    border: 1px solid black;
    
  }
  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #000;
    border-right: 1px solid #000;
    border-collapse: collapse;
  }
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }
  .table tbody + tbody {
    border-top: 2px solid #dee2e6;
  }
  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }
  .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    text-decoration: none;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
  .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    text-decoration: none;
  }
  .btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }
  .btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    text-decoration: none;
  }
  .btn-danger:hover {
    color: #fff;
    background-color: #c82333;
    border-color: #bd2130;
  }
  .btn-warning {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
  }
  .btn-warning:hover {
    color: #212529;
    background-color: #e0b90f;
    border-color: #d3aa00;
  }
  .btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }
  .btn-info:hover {
    color: #fff;
    background-color: #138496;
    border-color: #117a8b;
  }
  .btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
  }
  .btn-success:hover {
    color: #fff;
    background-color: #218838;
    border-color: #1e7e34;
  }
</style>