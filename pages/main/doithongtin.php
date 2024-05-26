<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['dangky'])) {
    $taikhoan = $_SESSION['dangky'];
} else {
 
    echo "Username is not set";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $hovaten = $_POST['hovaten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $diachi = $_POST['diachi'];

  
    $update_info = mysqli_query($connect, "UPDATE tbl_dangky SET hovaten = '$hovaten', email = '$email', sodienthoai = '$sodienthoai', diachi = '$diachi' WHERE taikhoan = '$taikhoan'");

    if ($update_info) {
        echo "<script>Swal.fire({title: 'Đổi thông tin thành công!', icon: 'success', confirmButtonText: 'OK'})</script>";
    } else {
        echo "<script>Swal.fire({title: 'Cập nhật thông tin thất bại!', icon: 'error', confirmButtonText: 'OK'})</script>";
    }
}
?>
<form method="POST" action="" onsubmit="return checkInfo()">
    <style>
        form{
            text-align: center;
            align-content: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 20%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <label for="hovaten">Họ và tên:</label>
    <input type="text" name="hovaten" id="hovaten" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="sodienthoai">Số điện thoại:</label>
    <input type="tel" name="sodienthoai" id="sodienthoai" required><br>

    <label for="diachi">Địa chỉ:</label>
    <input type="text" name="diachi" id="diachi" required><br>

    <input type="submit" value="Đổi thông tin">
</form>

<script>
function checkInfo() {
    // Add validation logic here if needed
    return true;
}
</script>