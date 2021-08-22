<?php
session_start();
require_once '../function/function.php';
require_once '../connect/connect.php';

include '../layout/header_finance.php';
?>

  

  <div class="container"  id="contentContainer-fluid" style="height: auto!important;">
    <div class="row prod" id="content-data" style="font-family: verdana!important; height: 1000px!important;">
      <div class="col-md-2 left-data-link" style="height: auto!important; background-color: #1a5276!important; padding: 0px!important; margin: 0px!important; color: #FFF!important;"> 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h2 class="text-center text-success">Welcome to Finance management</h2><hr style="border: 2px solid #1a5276!important;">
       
    <?php if(!isset($_GET['viewstaffs']) && !isset($_GET['setfprice']) && !isset($_GET['setp']) && !isset($_GET['view_py'])) { ?> 
    <div id="section-3">
        <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-list fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Paid orders&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->cPaidOrders(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all paid orders</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-archive fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Unpaid orders&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->cUnpaidOrders(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all unpaid orders</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

  
        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-list fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">All Furniture&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countFurnitures(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all furniture</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-archive fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Registered Customers&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countAllCustomers(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all customers</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

 
    <?php } else if(isset($_GET['viewstaffs']) ) { ?> 

    <div class="col-md-12">       
     	<h4 class="text-center head-content">All Registered Staff members</h4>

        <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size: 14px!important; ">
            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th><i class="fa fa-user"></i>Username</th>
              <th>Role</th>
              <th>Email</th>
              <th><i class="fa fa-phone"></i>Phone Number</th>
              <th>Address</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>

            <?php
              $no=1;
              $stmt= $obj->viewStaffMembers();
              while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) {
            ?>

            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['stf_firstname'];?></td>
              <td><?php echo $row['stf_lastname'];?></td>
              <td><?php echo $row['stf_username'];?></td>
              <td><?php echo $row['stf_userrole'];?></td>
              <td><?php echo $row['stf_email'];?></td>
              <td><?php echo $row['stf_telephone'];?></td>
              <td><?php echo $row['stf_address'];?></td>
              <td><a href="#" class="btn btn-primary">Update</a></td>
              <td><a href="#" class="btn btn-danger">Delete</a></td>
            </tr>
        	<?php $no++; } ?>
        </table>
    	</div>
    <?php } ?>
    










<?php if(isset($_GET['setfprice'])) { ?> 
<div class="container" id="contentContainer-fluid">
<div class="row prod" id="content-data">
  <div class="col-md-10">
    <div class="col-md-12 view-content">
      <?php
      require_once'../connect/pdoquery.php';
      $obj4 = new FurnitureQuery;

      $stmt60= $obj4->getNoPriceProduct();
      while($row= $stmt60->FETCH(PDO::FETCH_ASSOC)) {
      ?>

    <div class="col-md-4 col-sm-6 mt-4">
      <div class="card">
          <img class="card-img-top" src="../img/<?php echo $row['tbl_productPicture']; ?>" alt="Card image" style="border-bottom:1px solid black!important; width: auto!important; max-width: 100%!important; height: auto!important; max-height: 300px!important;">
          <div class="card-body">
            <h4 class="card-title"><?php echo $row['tbl_productName'] ?></h4>

            <a href="home_finance.php?setp=<?php echo $row['tbl_productId']; ?>">
            <h4 class="card-title" style="color: blue!important; font-weight: bolder!important;">Set a price</h4></a>
            <p class="card-text"><small></small></p>
          </div>
        </a>
      </div>
      </div>
    <?php } if($obj4->checkForPrice()=='0'){
      echo "<center><h3>Set Furniture price!</h3><hr><br>";
      echo "<p>No New uploaded furniture needs a price!</p></center>";
    } ?>
  </div>
</div>
</div>
</div>
<?php } ?>










<?php
if(isset($_GET['setp'])) {

  if(isset($_POST['updatePrice'])) {
      $fPrice = ($_POST['furniturePrice']);
      $sql = $con->prepare("UPDATE tbl_product SET tbl_productPrice='".$fPrice."' WHERE tbl_productId='".$_GET['setp']."' ");

      if($sql->execute()){
      echo '<script> alert("Price has been set!")</script>';
      echo '<script>window.location= "./home_finance.php?setfprice"</script>'; 
    } else { 
      echo '<script> alert("Process failed")</script>';
      echo '<script>window.location= "./home_finance.php?setfprice"</script>';
    }
  }

?>

<div class="container" id="contentContainer-fluid">
<div class="row prod" id="content-data">
  <div class="col-md-10">
    <div class="col-md-12 view-content">

      <h4 class="header-data text-center text-white" style="color: white;">
        <i class="fa fa-plus"></i>
        Set a furniture price 
      </h4>

        <form method="POST">
          <div class="form-group col-md-12">
            <label>Furniture Price</label>
            <input required="" class="form-control input" name="furniturePrice">
          </div>
        
          <div class="form-group button col-md-12">
            <button type="submit" name="updatePrice" class="btn btn-primary btn-do pull-left">
              <i class="fa fa-plus"></i>
              Save
            </button>      
            <button type="reset" class="btn btn-danger btn-do pull-right">
              <i class="fa fa-remove"></i>
              Cancel
            </button>  
          </div>
        </form>
      
      </div><br>
    </div>
  <?php } ?>










    <?php if(isset($_GET['view_py'])) { ?>
    <br>
      <div id="section-4">
        <div class="col-md-12">
          <h3 class="text-center head-content">Pending Payment for Orders</h4>
            <table class="table table-bordered">
              <tr style="font-weight: bold;" class="bg-success">
                <th>Photo</th>
                <th>Payment Method</th>
                <th>Amount Paid</th>
                <th>Customer</th>
                <th>Tel.No</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>

            <?php
              $no=1;
              $stmt= $obj->viewUnpaidOrders();
              while($xrow= $stmt->FETCH(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                  <td>
                    <img src="../img/<?php echo $xrow['tbl_paid_orderSlip']; ?>" style="height: 60px; width: 60px;">
                  </td>

                  <td>
                    <?php
                    $s5tmt= $obj->viewPaymentMethod($xrow['tbl_paymentId']);
                    $x5row= $s5tmt->FETCH(PDO::FETCH_ASSOC);
                       echo $x5row['tbl_paymentMethod'];
                    ?>
                  </td>
                  <td>
                    <?php
                      //$orderRow= orderData($xrow['tbl_orderId']);
                      //echo $orderRow->tbl_orderQty * $orderRow->tbl_orderAmt;
                    $s6tmt= $obj->viewOrderData($xrow['tbl_orderId']);
                    $x6row= $s6tmt->FETCH(PDO::FETCH_ASSOC);
                      echo $x6row['tbl_orderQty'] * $x6row['tbl_orderAmt'];
                    ?>
                  </td>

                  <td>
                    <?php
                    $s6tmt= $obj->viewOrderData($xrow['tbl_orderId']);
                    $x6row= $s6tmt->FETCH(PDO::FETCH_ASSOC);
                      $s9tmt= $obj->customerData($x6row['tbl_customerId']);
                      $x9row= $s9tmt->FETCH(PDO::FETCH_ASSOC);
                      echo $x9row['tbl_customerFname']." ".$x9row['tbl_customerLname'];
                    ?>
                  </td>

                  <td><?php echo $x9row['tbl_customerTel']; ?></td>
                  <td><?php echo $xrow['tbl_paid_orderDate']; ?></td>
                  <?php if(($xrow['tbl_paid_orderStatus']==0)) { ?>
                    <td class="text-center">
                      <b class="text-danger">
                        Pending  
                      </b>
                    </td>
                  <?php } else { ?>
                    <td class="text-center">
                      <a href="" class="btn btn-primary">
                        <i class="fas fa-money"></i>
                        Paid  
                      </a>
                    </td>
                  <?php } ?>
                    <td><a class="btn btn-primary" href="?view_py&approvPy=<?php echo $xrow['tbl_paid_orderId']; ?>&tn=<?php echo $x9row['tbl_customerTel']; ?>">Approve</a></td>
                </tr>
              <?php } ?> 
          </table>
        </div>
      </div>
    </div>
    <?php }

    if(isset($_GET['approvPy']) && isset($_GET['tn'])) {
      $approvPyId = $_GET['approvPy'];
      $obj->approvePayment($approvPyId);
      $obj->sendApprovalMessage($_GET['tn']);
      echo '<script> alert("Approved!")</script>';
      echo '<script>window.location= "./home_finance.php?view_py"</script>'; 
    }

    ?>













</div>
</div>
</div>


        <?php include '../layout/staff_footer.php';  ?>