<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<table class="table table-striped" style="border-bottom: 2px solid black;font-family: 'Times New Roman', Times, serif">
    <?php
    $sql_lietke="SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $result_lietke= mysqli_query($connect,$sql_lietke);
?>
<p style="font-family: 'Times New Roman', Times, serif; font-size: 20px">Liệt kê danh mục sản phẩm</p>

     <tr>
         <td>ID</td>
         <td>Tên danh mục</td>
         <td>Thứ tự</td>
         <td>Hành động</td>
     </tr>
     <?php
    $i=0;
    while($row=mysqli_fetch_array($result_lietke)){
        $i++;
    
     ?>
     <tr>
         <td><?php echo $i ?></td>
         <td><?php echo $row['tendanhmuc'] ?></td>
         <td><?php echo $row['thutu']?></td>
         <td>
         <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteCategory(<?php echo $row['id_danhmuc']?>);">Xóa</a>
             <a class="btn btn-warning" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a>
         </td>
     </tr>

     <?php
    }
    ?>
    </table>
<script>function deleteCategory(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa danh mục này?',
        text: "Bạn sẽ không thể hoàn tác hành động này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Có, xóa nó!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "modules/quanlydanhmucsp/xuly.php?iddanhmuc=" + id;
        }
    })
}</script>
