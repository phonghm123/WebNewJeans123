<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Search Form -->
<form method="POST" action="">
    <input type="text" name="search" placeholder="Nhập thông tin tìm kiếm..." style="width: 300px; padding: 5px;">
    <input type="submit" name="submit" value="Tìm kiếm" style="padding: 5px;">
    <select name="month" style="padding: 5px;">
        <option value="">Chọn tháng</option>
        <?php
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
            echo "<option value='$m'>$month</option>";
        }
        ?>
    </select>
    <select name="year" style="padding: 5px;">
        <option value="">Chọn năm</option>
        <?php
        for ($y=2020; $y<=date('Y'); $y++) {
            echo "<option value='$y'>$y</option>";
        }
        ?>
    </select>
    <input type="submit" name="filter_month_year" value="Lọc theo tháng/năm" style="padding: 5px;">
</form>

<?php
// Check if the form is submitted
$search_query = "";
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($connect, $_POST['search']);
    $search_query = "WHERE tbl_giohang.code_cart LIKE '%$search%' OR tbl_dangky.hovaten LIKE '%$search%' OR tbl_dangky.diachi LIKE '%$search%' OR tbl_dangky.taikhoan LIKE '%$search%' OR tbl_dangky.sodienthoai LIKE '%$search%'";
}

$filter_query = "";
if (isset($_POST['filter_month_year'])) {
    $selected_month = isset($_POST['month']) ? mysqli_real_escape_string($connect, $_POST['month']) : "";
    $selected_year = isset($_POST['year']) ? mysqli_real_escape_string($connect, $_POST['year']) : "";

    if ($selected_month && $selected_year) {
        $filter_query = " AND MONTH(tbl_cart_detail.thoigianmua) = $selected_month AND YEAR(tbl_cart_detail.thoigianmua) = $selected_year";
    } elseif ($selected_year) {
        $filter_query = " AND YEAR(tbl_cart_detail.thoigianmua) = $selected_year";
    }
}

// SQL query to list orders with optional search and month/year filter
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
                $search_query $filter_query
                GROUP BY 
                    tbl_giohang.code_cart
                ORDER BY 
                    tbl_giohang.id_cart DESC";
$result_lietke_dh = mysqli_query($connect, $sql_lietke_dh);

?>
<h1 style="font-family: 'Times New Roman', Times, serif;">Danh sách đơn hàng của người dùng</h1>
<table class="table table-striped" style="border-bottom: 2px solid black; font-family: 'Times New Roman', Times, serif;">
    <tr>
        <td>Mã đơn hàng</td>
        <td>Tên khách hàng</td>
        <td>Địa chỉ</td>
        <td>Tài khoản</td>
        <td>Hình thức thanh toán</td>
        <td>Điện thoại</td>
        <td>Ngày mua</td>
        <td>Trạng thái đơn</td>
        <td>Thanh toán</td>
        <td>Chi tiết sản phẩm</td>
        <td colspan="2" style="text-align: center; border-radius: 2px solid black">Quản lý</td>
    </tr>

    <?php
    $prev_month_year = null;
    while ($row = mysqli_fetch_array($result_lietke_dh)) {
        $current_month_year = date('F Y', strtotime($row['thoigianmua'])); // get the month and year
        if ($prev_month_year != $current_month_year) {
            echo "<tr><th colspan='12'>{$current_month_year}</th></tr>"; // print the month and year header
            $prev_month_year = $current_month_year;
        }

        // Tách danh sách các sản phẩm, số lượng và kích thước
        $sanpham_ids = explode(',', $row['sanpham_ids']);
        $soluongmua_list = explode(',', $row['soluongmua_list']);
        $size_list = explode(',', $row['size_list']);

        $sanpham_details = [];
        for ($i = 0; $i < count($sanpham_ids); $i++) {
            $sanpham_details[] = "ID: {$sanpham_ids[$i]}, Số lượng: {$soluongmua_list[$i]}, Size: {$size_list[$i]}";
        }
        $sanpham_details_str = implode('<br>', $sanpham_details);
    ?>
        <tr>
            <td><?php echo $row['code_cart']; ?></td>
            <td><?php echo $row['hovaten']; ?></td>
            <td><?php echo $row['diachi']; ?></td>
            <td><?php echo $row['taikhoan']; ?></td>
            <td><?php echo $row['cart_payment']; ?></td>
            <td><?php echo $row['sodienthoai']; ?></td>
            <td><?php echo date('Y-m-d H:i:s', strtotime($row['thoigianmua'])); ?></td>
            <td>
                <?php
                if ($row['cart_status'] == 0) {
                    echo '<a class="btn btn-warning" href="javascript:void(0);" onclick="updateCartStatus(' . $row['code_cart'] . ', 1);">Đơn hàng mới</a>';
                } else if ($row['cart_status'] == 1) {
                    echo '<a class="btn btn-primary" href="javascript:void(0);" onclick="updateCartStatus(' . $row['code_cart'] . ', 2);">Đã xác nhận</a>';
                } else if ($row['cart_status'] == 2) {
                    echo '<a class="btn btn-info" href="javascript:void(0);" onclick="updateCartStatus(' . $row['code_cart'] . ', 3);">Đang giao</a>';
                } else if ($row['cart_status'] == 3) {
                    echo '<a class="btn btn-success" href="javascript:void(0);">Đã hoàn thành</a>';
                }
                ?>
            </td>
            <td>
    <?php
    if ($row['cart_payment'] == 'Paypal') {
        echo '<button class="btn btn-success">Đã trả</button>';
    } else {
     
        if ($row['tinhtrangtt'] == 0) {
          
            echo '<a class="btn btn-warning" href="modules/quanlydonhang/trangthaitt.php?code='.$row['code_cart'].'">Chưa trả</a>';
        } else if ($row['tinhtrangtt'] == 1) {
       
            echo '<button class="btn btn-success">Đã trả</button>';
        }
    }
    ?>
</td>


            <td>
                <a class="btn btn-primary" href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart']; ?>">Xem đơn hàng</a>|
            </td>
            <td>
                <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteOrder(<?php echo $row['code_cart']; ?>);">Hủy</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<script>
function deleteOrder(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn hủy đơn hàng này?',
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "modules/quanlydonhang/xuly.php?code_cart=" + id;
        }
    })
}

function updateCartStatus(code_cart, new_status) {
    if (confirm("Bạn có chắc chắn muốn cập nhật trạng thái đơn hàng này?")) {
        window.location.href = "modules/quanlydonhang/xuly.php?code=" + code_cart + "&cart_status=" + new_status;
    }
}
</script>

<style>
body {
    font-family: 'Times New Roman', Times, serif;
}
.table {
    width: 100%;
    border-collapse: collapse;
}
.table th, .table td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}
.table th {
    background-color: #f2f2f2;
}
.form-container {
    margin-bottom: 20px;
}
.form-container input, .form-container select {
    margin-right: 10px;
    padding: 5px;
}
</style>
