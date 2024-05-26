


<div class="main">
            <?php
                // include ("sidebar/sidebar.php");
            ?>
            <div class="maincontent">
              
                <?php //lấy qiamly từ menu truyền vào bằng phuongư thức GET
                        if(isset($_GET['quanly'])){
                            $bientam=$_GET['quanly'];

                        }else{
                            $bientam="";
                        }
                        if ($bientam=='danhmuclist'){
                            include("main/danhmuc.php");
                        }elseif ($bientam=='giohang'){ 
                            include("main/giohang/cart.php");
                        }elseif ($bientam=='dangky'){ 
                            include("main/dangky.php");
                        }elseif ($bientam=='contact'){ 
                            include("main/contact.php");
                        }elseif ($bientam=='sanpham'){ 
                            include("main/sanpham.php");
                        }elseif ($bientam=='tatcasanpham'){ 
                            include("main/index.php");
                        }elseif ($bientam=='tatcasp'){ 
                                include("main/tatcasp.php");
                        }elseif ($bientam=='dangnhap'){ 
                            include("main/dangnhap.php");
                        }elseif ($bientam=='thongtin'){ 
                            include("main/thongtin.php");

                        }elseif ($bientam=='timkiem'){ 
                            include("main/timkiem.php");
                        }elseif ($bientam=='xemtrangthai'){ 
                            include("main/xemttdon.php");
                        }elseif ($bientam=='doithongtin'){ 
                            include("main/doithongtin.php");
                        }elseif ($bientam=='xemthanhtoan'){ 
                            include("main/thongtinTT.php");
                        }elseif ($bientam=='doimatkhau'){ 
                            include("main/doimatkhau.php");
                        }elseif($bientam=="xemthongtin"){
                            include("thongtindon/xemdonhang.php"); 
                        }elseif($bientam=="chatbox"){
                            include("chatbox.php"); 
                        }
                        else{ ?>






<div class="slideshow-container">
       
         <div class="mySlides fade">
           <div class="numbertext">1 / 4</div>
           <img src="images/318273306_1842665756100208_5077044326070218320_n.png" style="width:100%; height: 400px">
         </div>
        <div class="mySlides fade">
           <div class="numbertext">2 / 4</div>
           <img src="images/318369186_1189101898647361_4190634559166379856_n.png" style="width:100%; height: 400px">
         </div>
        <div class="mySlides fade">
           <div class="numbertext">3 / 4</div>
           <img src="images/318464419_5650673404997744_6898287037650137511_n.png" style="width:100%; height: 400px">
         </div>
         <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="images/318699422_473016024959979_1819865447099962921_n.png " style="width:100%; height: 400px">
          </div>
        
  
       <div style="text-align:center">
         <span class="dot" id="dot" onclick="currentSlide(1)"></span>
         <span class="dot" id="dot"  onclick="currentSlide(2)"></span>
         <span class="dot" id="dot"  onclick="currentSlide(3)"></span>
         <span class="dot" id="dot"  onclick="currentSlide(4)"></span>
       </div>
 <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }

</script>
                        <?php
                       
                        }
 ?>
                
            </div>
        </div>



