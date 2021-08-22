<?php session_start();
  include '../connect/connect.php'; 
  include '../function/function.php'; 
  include './head.php'; ?>
  <div class="container mt-0">

      <?php if(!isset($_GET['view_product']) && !isset($_GET['view_cart']) && !isset($_GET['view_order']) && !isset($_GET['add_payment'])) { ?>
    <!-- <h2 class="text-center" style="font-size: 4rem;">All available furniture</h2><hr> -->

  <div class="container">
    <div id="section-1">
      <div class="row">
      <?php
      require_once'../connect/pdoquery.php';
      $obj = new FurnitureQuery;
      $stmt60= $obj->getProduct();
      while($row= $stmt60->FETCH(PDO::FETCH_ASSOC)) {
      ?>

          <div class="col-md-4 col-sm-6 mt-4">
            <div class="card">
              <a href="?view_product=<?php echo $row['tbl_productId']; ?>">
                <img class="card-img-top" src="../img/<?php echo $row['tbl_productPicture']; ?>" alt="<?php echo $row['tbl_productName'] ?>" width="640px" height="300" style="border-bottom:1px solid black">

                <div class="card-body">
                  <h4 class="card-title"><b><center><?php echo $row['tbl_productName'] ?></center></b></h4>
                  <h5 class="card-title"><b><center>Price:<?php echo $row['tbl_productPrice'] ?> frws</center></b></h5>
                  <p class="card-text text-center">Model:<small>
                    <?php
                      $mdRow1= modelData($row['tbl_modelId']);
                      echo $mdRow1->tbl_modelName;
                    ?>
                  </small></p>
                  
                </div>
              </a>
            </div>
          </div>
          <?php } ?>
      <?php } ?>
    <!-- </div></div> -->

















  <?php
  if(isset($_GET['view_product'])) {

    if($_GET['view_product']) {
      $info= prodData($_GET['view_product']);   
      if(!isset($info)){
      exit('<div class="container"><h1 class="text-danger"> Wrong Operation</h1></div>');
    }

  ?>

        <div id="section-4">
            <div class="row">

             <h2 class="text-center" style="padding:2rem;">
                 View product details
             </h2>
             <div class="col-md-6 col-sm-6" style="padding: 10rem; border: 1px solid blue;">
              <img src="../img/<?php  echo $info->tbl_productPicture; ?>">
             </div>  

             <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                      <label for="email">Product Name</label>
                      <input type="text" class="form-control" value="<?php echo $info->tbl_productName; ?>" readonly style="border: none;">
                    </div>

                    <div class="form-group">
                      <label for="email">Product Price</label>
                      <input type="text" class="form-control" value="<?php  echo $info->tbl_productPrice; ?> Rwfs" readonly style="border: none;">
                    </div>

                    <?php
                    // Get model Name
                    $mdRow= modelData($info->tbl_modelId);
                    ?>
                    <div class="form-group">
                      <label for="email">Product Model</label>
                      <input type="text" class="form-control" value="<?php echo $mdRow->tbl_modelName; ?>" readonly style="border: none;">
                    </div>

                    <div class="form-group">
                      <label for="email">Product Quantity</label>
                      <input type="text" class="form-control" value="<?php  echo $info->tbl_productQty; ?>" readonly style="border: none;">
                    </div>


                  <?php if(isset($_SESSION['custId']) &&($info->tbl_productQty>0)) { ?>
                  <?php if(isset($_SESSION['custId'])) { 
                    include ('./addToCart.php');
                  }
                  ?>

                    <form method="POST" action="?view_product=<?php echo urlencode($info->tbl_productId); ?>&p=<?php echo urlencode($info->tbl_productId); ?>&action=add&id=<?php echo urlencode($info->tbl_productId); ?>">

                    <div class="form-group">
                      <label for="email">Add quantity</label>
                      <input type="number" class="form-control" name="quantity">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success bt-lg form-control" name="add2cart"><i class="fas fa-plus"></i>&nbsp;Add to cart</button>
                    </div>
                    </form>
                <?php } if(isset($_GET['stfchkn'])) {

                 if($_GET['stfchkn']=='hod') { ?>
                  <br><hr><a href="../staff/home_hod.php" class="btn btn-danger bt-lg form-control">Back Home</a>
                <?php } else if($_GET['stfchkn']=='dm') { ?>
                  <br><hr><a href="../staff/home_dm.php" class="btn btn-danger bt-lg form-control">Back Home</a>
                <?php } else if($_GET['stfchkn']=='finance') { ?>
                  <br><hr><a href="../staff/home_finance.php" class="btn btn-danger bt-lg form-control">Back Home</a>
                <?php } } ?>



                
              </div>
            </div>
          </div>
  <?php } } ?>











                




    <?php if(isset($_GET['view_cart'])) { 
      require_once './addToCart.php';
    ?>
    <br>
      <div id="section-4">
        <div class="row">
          <h3 class="text-center head-content">Shopping cart</h4>
            <table class="table table-bordered">
              <tr>
                <th>Furniture Name</th>
                <th>Quantity</th>
                <th>Price </th>
                <th>Total Price</th>
                <th class="text-center">Action</th>
              </tr>
              <?php
              if(!empty($_SESSION["cart"])){
                $count = 0;
                $total = 0;

                foreach($_SESSION["cart"] as $key => $value){  
                $prod= prodData(($value['product_id'])); 
                if(!$prod) {continue; } 
              ?>

              <tr>
                <td><?php echo ($value["item_name"]); ?> </td>
                <td><?php  echo ($value["item_quantity"]); ?></td>
                <td>$ <?php echo ($value["product_price"]); ?></td>
                <td>Rwfs <?php  echo number_format($value["item_quantity"] * $value["product_price"]); ?></td>

                <?php if(isset($_SESSION['custId'])){ ?>
                  <td><center><a class="btn btn-danger text-center" href="?view_cart&action=delete&id=<?php echo urlencode($prod->tbl_productId);?>"> Remove</a></center></td>
                <?php } ?>
              </tr>
              <?php $count= $count + 1; ?>
              <?php
              $total= $total + ($value['item_quantity']  * $value['product_price']); ?><?php } ?> 

            <tr>
              <td colspan="3" align="right">Total</td>
              <th align="right"> <b class="text-primary">
                <?php echo number_format($total);  ?></b> Rwfs
              </th>

              <th>
                <?php if(isset($_SESSION['custId'])) { ?>
                  <center><a class="btn btn-success text-center" id="addProdToCartConfirm"  href="?view_cart&action=confirm">&#10004; Confirm</a></center>  
                <?php } ?> 
              </th>       
            </tr>
            <?php } else { ?>
            <tr>
              <td colspan="5"><p class="text-danger text-center">No Furniture added </p></td>
            </tr>
          <?php } ?>
          
          </table>
        </div>
      </div>
    <?php } ?>













    <?php if(isset($_GET['add_payment'])) { 
      require_once './addToCart.php';

      // contains all phps for payment
      require_once './payment.php';

    ?>
    <br>
    <div class="div-form">
    <div class="row">
      <div class="col-md-4"></div>
      <div  class="col-md-4">
        <div class="card">
          <h3 class="card-header text-center">Add payment slip</h3>
          <p class="text-center">Furniture: <u><?php echo ucwords($product->tbl_productName); ?></u></p>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" class="row form"> 
              <h4 class="text-center"><i class="fas fa-money fa-2x"></i></h4>
              <center>
                <p class="error"></p>
              </center><br/>

              <div class="form-group col-md-12">
                <label><i class="fas fa-th"></i>&nbsp;Payment method</label>
                <select  class="form-control input" name="method" >
                  <?php 
                    $paymentdATA = paymentMethod(1);
                    foreach($paymentdATA as $paymentdATASet) {   ?>
                      <option value="<?php  echo $paymentdATASet->tbl_paymentId; ?>">
                        <?php  echo $paymentdATASet->tbl_paymentMethod; ?> 
                      </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group col-md-12">
                <label><i class="fas fa-file"></i>&nbsp;Payment slip</label>
                <input type="file" class="form-control input" name="slip" required/>
              </div>
              
              <div class="form col-md-12">
                <button type="submit" name="pay" class="btn btn-success pull-left btn-action">
                  Save payment
                </button>
                <button type="reset" class="btn btn-danger pull-right btn-action">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>


















    <?php if(isset($_GET['view_order'])) { 
      require_once './addToCart.php';
    ?>
    
    <br>
      <div id="section-4">
        <div class="row">
          <h3 class="text-center head-content">Ordered Furniture</h4>
            <table class="table table-bordered">
              <tr style="font-weight: bold;" class="bg-success">
                <th>Photo</th>
                <th>Furniture Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th class="text-center">Status</th>
              </tr>

            <?php 

              $orderdATA = order($_SESSION['custId']);
              $total = 0;
              $totalQty =0;

              foreach ($orderdATA as $orderdATASet) {  

                $prod = prodData(($orderdATASet->tbl_productId));

                $paidOrderData = checkPaidOrderData($orderdATASet->tbl_orderId, 1); 
                $pendingPaidOrder = checkPaidOrderData($orderdATASet->tbl_orderId, 0);  

                $total = $total + ($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); 
                $totalQty = $totalQty + ($orderdATASet->tbl_orderQty); ?>

                <tr>
                  <td>
                    <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  </td>

                  <td><?php echo ($prod->tbl_productName);   ?> </td>
                  <td><?php  echo ($orderdATASet->tbl_orderAmt);  ?></td>

                  <td><?php echo ($orderdATASet->tbl_orderQty);   ?></td>
                  <td>Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?></td>

                  <?php  if(  ($orderdATASet->tbl_orderStatus == 1) && ($pendingPaidOrder > 0) )  {   ?>

                    <td class="text-center">
                      <b class="text-danger">
                        Pending  
                      </b>
                    </td>

                  <?php  } else if(  ($orderdATASet->tbl_orderStatus == 1) && ($paidOrderData == 0) )  {   ?>

                    <td class="text-center">
                      <a href="?add_payment=<?php  echo urlencode($orderdATASet->tbl_orderId);  ?>" class="btn btn-primary">
                        <i class="fas fa-money"></i>
                        Pay  
                      </a>
                    </td>

                  <?php  } else {   ?>

                    <td class="text-center">
                      <b class="text-success">
                        Paid  
                      </a>
                    </td>
                  <?php } ?>


                </tr>

              <?php }  ?> 

              <tr  style="font-weight: bolder;" class="bg-secondary">
                <td colspan="4">Total</td>
                <td><?php echo number_format($totalQty); ?></td>
                <td>
                  Rwfs <?php echo number_format($total); ?>
                </td>
              </tr>

          </table>
        </div>
      </div>
    <?php } ?>





















    <hr style="height: 30px; color: #434dce; border-top: 2px solid #000;">
    <?php if(!isset($_GET['view_cart']) && !isset($_GET['view_order']) && !isset($_GET['add_payment'])) { ?>
        <div id="section-3">
            <div class="row" >

              <h4 class="text-center">Reach us</h3>
              <div class="col-md-4">
                <i class="fas fa-home fa-3x text-center p-5"></i>
               
               
                
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
      <?php } ?>

        <?php include './footer.php';  ?>