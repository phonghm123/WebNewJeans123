<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['dangky'])) {
    $taikhoan = $_SESSION['dangky'];
} else {
    // Handle the case where the username is not set
    echo "Username is not set";
    exit;
}

// Kiểm tra xem người dùng đã gửi yêu cầu đổi mật khẩu hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy mật khẩu cũ và mật khẩu mới từ form
    $matkhau = $_POST['matkhau'];
    $newPassword = $_POST['new_password'];

    // Kiểm tra xem mật khẩu cũ có khớp với mật khẩu hiện tại hay không
    // Nếu không khớp, hiển thị thông báo lỗi
    $matkhau_truy_van = mysqli_query($connect, "SELECT matkhau FROM tbl_dangky WHERE taikhoan = '$taikhoan'");
    $matkhau_truy_van = mysqli_fetch_assoc($matkhau_truy_van);
    $matkhau_truy_van = $matkhau_truy_van['matkhau'];

    if ($matkhau!== $matkhau_truy_van) {
        echo "<script>Swal.fire({title: 'Mật khẩu không chính xác!', icon: 'error', confirmButtonText: 'OK'})</script>";
        exit;
    }

    // Lưu mật khẩu mới vào cơ sở dữ liệu hoặc nơi lưu trữ khác
    $update_password = mysqli_query($connect, "UPDATE tbl_dangky SET matkhau = '$newPassword' WHERE taikhoan = '$taikhoan'");

    if ($update_password) {
        echo "<script>Swal.fire({title: 'Đổi mật khẩu thành công!', icon: 'success', confirmButtonText: 'OK'})</script>";
    } else {
        echo "<script>Swal.fire({title: 'Cập nhật mật khẩu thất bại!', icon: 'error', confirmButtonText: 'OK'})</script>";
    }
}
?>
<form method="POST" action="" onsubmit="return checkPassword()">
    <style>
        form{
            text-align: center;
            align-content: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="password"] {
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
    <label for="matkhau">Mật khẩu cũ:</label>
    <input type="password" name="matkhau" id="matkhau" required><br>

    <label for="new_password">Mật khẩu mới:</label>
    <input type="password" name="new_password" id="new_password" required><br>

    <label for="confirm_password">Xác nhận mật khẩu mới:</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br>

    <input type="submit" value="Đổi mật khẩu">
</form>

<script>
function checkPassword() {
    var password = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    if (password!= confirmPassword) {
        alert("Mật khẩu và mật khẩu xác minh không khớp nhau!");
        return false;
    }
    return true;
}
</script>