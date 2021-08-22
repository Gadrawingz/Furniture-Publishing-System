<?php session_start();
  include '../connect/connect.php'; 

  include '../function/function.php'; 
  include './head.php';              

  if($_GET['ctg'])  { ?>
        <div class="container">
            <div id="section-1">
              <div class="row">

                <?php 

                  $count = 0;
                  $proddATA = productForCateg($_GET['ctg']);

                  foreach ($proddATA as $prod) {  

                    $count = $count + 1; 
                    $model = modelData($prod->tbl_modelId);   ?>
                    <div class="col-md-4 col-sm-6 mt-4">
  <div class="card">
  <a href="index.php?view_product=<?php  echo urlencode($prod->tbl_productId); ?>">
  <img class="card-img-top" src="../img/<?php  echo $prod->tbl_productPicture; ?>" width="640px" height="300" style="border-bottom:1px solid black">
  <div class="card-body">
    <h4 class="card-title"><?php  echo $prod->tbl_productName; ?></h4>
    <h4 class="card-title">Price:<?php  echo $prod->tbl_productPrice; ?> Rwfs  </h4>  
    <p class="card-text">Model: <small><?php  echo $model->tbl_modelName; ?></small></p>
  </div>
  </a>
                 
</div>
</div>



        <?php  }  ?>

                
            </div>
        </div>
        <hr>

        <div id="section-3 mt-3">
            <div class="row" >

              <h2 class="text-center text-danger pt-4">Get in  Touch</h2>
              <div class="col-md-4">
                <i class="fas fa-user fa-3x text-center p-5"></i>
               
               
                
                <h4>RP/IPRC HUYE
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurn@gmail.com</h4>

                
            </div>
            

            </div>
            
        </div>




        <?php include './footer.php';  ?>


        <?php  }   ?>