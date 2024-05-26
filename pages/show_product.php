<div style="clear:both;"></div>

<div class="show_new">
<?php //lấy qiamly từ menu truyền vào bằng phương thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                       if($bientam==""){?>

                        <div class="new_product">
                        <h1 style="text-align: center">Sản phẩm mới</h1>
                        </div>
                    <?php
                            include("main/sanphammoi.php");
                       
                            
                        }
 ?>
 
 </div>
 
 <div style="clear:both;"></div>
 <div class="row">

<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                       if($bientam==""){
                           
                          ?>
                           <div class="new_product">
                            <h3>TẤT CẢ SẢN PHẨM</h3>
                            </div>
                     <?php
                            include("main/tatcasp.php");
                            
                        }

 ?>
</div>
 </div>



 </div>