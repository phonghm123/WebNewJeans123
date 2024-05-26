
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div>
<?php
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$taikhoan= $_POST['taikhoan'];
        $matkhau = ($_POST['matkhau']);
        $rematkhau=  ($_POST['rematkhau']);
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
		$sql_check = "SELECT * FROM tbl_dangky WHERE taikhoan = '".$taikhoan."'";
		$query_check = mysqli_query($connect, $sql_check);
		$count = mysqli_num_rows($query_check);
		if ($count > 0) {
			echo '<script>Swal.fire({
                icon: "error",
                title: "Tên tài khoản đã tồn tại",
                text: "Vui lòng chọn tên tài khoản khác",
                showConfirmButton: true,
                confirmButtonText: "Đóng"
            })</script>';
		} elseif (!$tenkhachhang ||!$taikhoan ||!$matkhau ||!$rematkhau ||!$email ||!$dienthoai ||!$diachi) {
			echo '<script>Swal.fire({
                icon: "error",
                title: "Không đủ thông tin",
                text: "Vui lòng kiểm tra lại và nhập đầy đủ thông tin",
                showConfirmButton: true,
                confirmButtonText: "Đóng"
            })</script>';
		} elseif ($matkhau!= $rematkhau) {
			echo '<script>Swal.fire({
                icon: "error",
                title: "Mật khẩu nhập lại không trùng khớp",
                text: "Vui lòng kiểm tra lại mật khẩu",
                showConfirmButton: true,
                confirmButtonText: "Đóng"
            })</script>';
		} else {
			$sql_dangky = "INSERT INTO tbl_dangky(hovaten,taikhoan,matkhau,sodienthoai,email,diachi) VALUE('".$tenkhachhang."','".$taikhoan."','".$matkhau."','".$dienthoai."','".$email."','".$diachi."')";
			$query_dangky = mysqli_query($connect, $sql_dangky);
			if ($query_dangky) {
				echo '<script>Swal.fire({
					icon: "success",
					title: "Bạn đã đăng ký thành công!",
					text: "Hiện tại bạn đã có thể đăng nhập. Chúc có trải nghiệm mua sắm vui vẻ!",
					showConfirmButton: true,
					confirmButtonText: "Đóng"
				  })</script>';
				$_SESSION['dangky'] = $taikhoan;
				$_SESSION['email'] = $email;
				$_SESSION['id_khachhang'] = mysqli_insert_id($connect);
			}
		}
	}
?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign up</title>
		<style type="text/css">
	table.dangky tr td {
	    padding: 5px;
	}
	h3{
		color: red;
		margin-left: 300px;
	}
	h2{
		margin-left: 280px;
	}
</style>
</head>
<body>
	

<form class="dang-ky" action="" method="POST">
        <h1>Đăng Ký</h1>
       <div class="dk">
           <label for="">Họ và tên</label><br>
           <input type="text" name="hovaten" placeholder="Họ và tên">
       </div>
	   <div class="dk">
           <label for="">Tài Khoản</label><br>
           <input type="text" name="taikhoan" placeholder="Tài Khoản">
       </div>
       <div class="dk">
           <label for="">Mật khẩu</label><br>
           <input type="password" name="matkhau" placeholder="Mật khẩu">
       </div>
	   <div class="dk">
           <label for="">Nhập lại mật khẩu</label><br>
           <input type="password" name="rematkhau" placeholder="Nhập lại mật khẩu">
       </div>
	   <div class="dk">
           <label for="">Email</label><br>
           <input type="email" name="email" placeholder="Email">
       </div>
	   <div class="dk">
           <label for="">Số điện thoại</label><br>
           <input type="text" name="dienthoai" placeholder="Số điện thoại">
       </div>
	   <div class="dk">
           <label for="">Địa chỉ</label><br>
           <input type="text" name="diachi" placeholder="Địa chỉ">
       </div>
	<tr>
		
		<td><a href="index.php?quanly=dangnhap" style="text-decoration: none; margin-left: 10px;"> Đăng nhập nếu có tài khoản</a></td>
	</tr>
	<td><input class="nutdk" type="submit" name="dangky" value="Đăng ký"></td>
</form>
</body>
</html>