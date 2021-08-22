<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }


  //include './add_cart.php'; 
  include '../layout/header.php';    ?>

  <div class="container"  id="contentContainer-fluid">


    <div class="row prod" id="content-data">

      <div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">

        <div class="col-md-12">
          <a href="add_product.php"  class="btn btn-primary pull-left">
            <i class="fa fa-plus"></i>
            Add furniture
          </a>

          <a href="#" data-toggle="modal" data-target="#categModal" class="btn btn-primary pull-right">
            <i class="fa fa-plus"></i>
            Add category
          </a>

        </div>


        <h4 class="text-center head-content">Furnitures</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>O</u></sup></sup></th>
              <th>Photo</th>

              <th>Furniture </th>
              <th>Price</th>

              <th>Quantity</th>              
              <th>Status</th>

              <th>Action</th>
            </tr>

            <?php 

              $count = 0;
              $proddATA = product();

              foreach ($proddATA as $prod) {  

                $count = $count + 1;   ?>

                <tr>

                  <td>
                    <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" >
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" >
                      <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  
                    </a>
                  </td>

                  <td>
                    <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" >
                      <?php echo ($prod->tbl_productName);   ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" >
                      <?php  echo ($prod->tbl_productPrice);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" >
                      <?php echo ($prod->tbl_productQty);   ?>
                    </a>
                  </td>
                  <td>
                    <?php  if($prod->tbl_productStatus == 0)  {   ?>
                      <b class="text-danger">
                        Removed
                      </b>

                    <?php  }  else {  ?>

                      <b class="text-primary">
                        Active
                      </b>
                    <?php  }  ?>
                    
                  </td>

                  <td class="text-center">
                    <a href="edit_furniture.php?p=<?php  echo urlencode($prod->tbl_productId);  ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                      Update 
                    </a>
                  </td>
                </tr>

              <?php }  ?> 

          </table>

        </div>    



      </div>


    </div><br><br><br><br><br><br><br><br><br>
  
  </div>


  <?php include '../layout/footer.php';  ?>

