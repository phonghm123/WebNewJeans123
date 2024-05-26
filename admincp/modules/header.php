<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
	
</head>

<body>
	
	<?php
	if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
	?>
	<p style="font-family: 'Times New Roman', Times, serif;"><a class="btn btn-danger" href="index.php?dangxuat=1">Đăng xuất : <?php if (isset($_SESSION['dangnhap'])) {
														echo $_SESSION['dangnhap'];
													} ?></a></p>
	
</body>

</html>