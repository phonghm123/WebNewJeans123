<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
</head>

<body>
<?php
	$sql_nguoidung="SELECT * FROM tbl_dangky WHERE id_khachhang='$_GET[idnguoidung]' LIMIT 1";
	$querynd=mysqli_query($connect,$sql_nguoidung);
	
?>
<div class="container" style="margin-bottom: 20px; border-bottom: 2px solid black;">
        <h1 style="text-align:center">Sửa người dùng</h1>
        <div class="row">
<form action="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $_GET['idnguoidung'] ?>" method="POST" enctype="multipart/form-data">
	<table width="50%" style="border-collapse: collapse;">
	<?php
	
	 	while($nguoidung =mysqli_fetch_array($querynd)){
	
	?>

	Name:
	<input class="form-control" type="text" size="50" name="hovatens"value="<?php echo $nguoidung['hovaten']?>">
	<br>
	Account
	<input class="form-control" type="text" size="50" name="taikhoans" value="<?php echo $nguoidung['taikhoan']?>">
	<br>
	Email
		<input class="form-control" type="text" size="50" name="emails" value="<?php echo $nguoidung['email']?>">
		<br>		
	Number Phone
		<input class="form-control" type="text" size="50" name="dienthoais" value="<?php echo $nguoidung['sodienthoai']?>">
	<br>
	Address
	<textarea class="form-control" name="diachis">
					<?php echo $nguoidung['diachi']?>
			</textarea>
	<br>
	Chức Vụ 
	<select class="form-control" name="chucvus">
				<?php 
						if($nguoidung['chucvu']==1){
				?>
					<option value="1" selected> Vô hiệu hóa</option>
					<option value="0">Kích hoạt</option>

				<?php
						}else{
				?>
					<option value="1" > Vô hiệu hóa</option>
					<option value="0" selected>Kích hoạt</option>
				<?php

						}
				
				?>
			</select>
	<br>
	<input class="btn btn-primary" type="submit" name="suanguoidung" value="Sửa">
	
</table>
</form>
<?php
	 }
	
	?>
		</div>
</div>