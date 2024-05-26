<div class="clear"></div>
<div class="main">
<?php 
                        
                        if(isset($_GET['action']) && $_GET['query']){                        
                            $bientam=$_GET['action'];
                            $query =$_GET['query'];
                        }else{
                            $bientam='';
                            $query='';
                        }
                        if($bientam=='quanlydonhang' && $query=='xemdonhang'){
                            include("modules/quanlydonhang/xemdonhang.php"); 
                        }
                        // elseif($bientam=='quanlydonhang' && $query=='sua'){
                        //     include("modules/quanlydonhang/sua.php");
                            
                        // }elseif($bientam=='quanlydonhang' && $query=='them' ){
                        //     include("modules/quanlydonhang/lietke.php");
                            
                        // }
        
                    ?>
</div>