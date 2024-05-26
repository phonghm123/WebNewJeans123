<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
	
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['taikhoan'];
		$matkhau = ($_POST['password']);
		$sql = "SELECT * FROM tbl_dangky,tbl_admin WHERE tbl_dangky.taikhoan='".$taikhoan."' AND tbl_dangky.matkhau='".$matkhau."'  LIMIT 1";
		$row = mysqli_query($connect,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$row_data = mysqli_fetch_array($row);
			if($row_data['chucvu'] == 1) {
				echo '<script>Swal.fire({
					icon: "error",
					title: "Tài khoản đã bị vô hiệu hóa",
					text: "Vui lòng liên hệ với quản trị viên để biết thêm chi tiết",
					showConfirmButton: true,
					confirmButtonText: "Đóng"
				})</script>';
			} else {
				$_SESSION['dangky'] = $row_data['taikhoan'];
				$_SESSION['email'] = $row_data['email'];
				$_SESSION['id_khachhang']= $row_data['id_khachhang'];
				header("Location:index.php");
			}
		}elseif($taikhoan=='admin'){
            header("Location:admincp/login.php");
        }else{
            echo '<script>Swal.fire({
                icon: "error",
                title: "Tài khoản hoặc mật khẩu không đúng",
                text: "Vui lòng kiểm tra lại thông tin",
                showConfirmButton: true,
                confirmButtonText: "Đóng"
            })</script>';
        }
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
</head>
<body>
    <form class="dang-nhap" action="" method="POST">
        <h1>LOGIN</h1>
       <div class="dn">
           <label for=""> Tài Khoản</label><br>
           <input type="text" name="taikhoan">
       </div>

       <div class="dn">
           <label for=""> Mật khẩu</label><br>
           <input type="password" name="password">
       </div>
       <tr><td><a href="index.php?quanly=dangky" style="text-decoration: none; margin-left: 10px;margin-top: 10px;"> Đăng ký nếu chưa có tài khoản</a></td></tr>
       <div class="dn">
           <input class="nutdn" type="submit" name="dangnhap" value="Đăng Nhập">
       </div>
    </form>
</body>
</html>