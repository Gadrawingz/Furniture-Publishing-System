<?php
session_start();
require_once '../function/function.php';
include '../layout/header_dm.php';
?>  

  <div class="container"  id="contentContainer-fluid" style="height: auto!important;">
    <div class="row prod" id="content-data" style="font-family: verdana!important; height: 1000px!important;">
      <div class="col-md-2 left-data-link" style="height: auto!important; background-color: #1a5276!important; padding: 0px!important; margin: 0px!important; color: #FFF!important;"> 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h2 class="text-center text-success">Welcome to Director Manager management</h2><hr style="border: 2px solid #1a5276!important;">
       
    <?php if(!isset($_GET['viewstaffs']) && !isset($_GET['v_approved'])) { ?> 
    <div id="section-3">
        <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-list fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Sales&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled>6</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows all sold furniture</span>
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
              <h3 class="ml-5">All furniture&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled>13</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all piece of furniture</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

 
    <?php } else if(isset($_GET['viewstaffs'])) { ?> 
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
    	



















    <?php if(isset($_GET['v_approved'])) { ?>
    <br>
      <div id="section-4">
        <div class="col-md-12"">
          <h3 class="text-center head-content">Approved payments</h4>
            <table class="table table-bordered">
              <tr style="font-weight: bold;" class="bg-success">
                <th>Photo</th>
                <th>Payment Method</th>
                <th>Amount paid</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
              </tr>

            <?php
              $no=1;
              $stmt= $obj->viewPaidAndApproved();
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

                  <td><?php  echo $xrow['tbl_paid_orderDate']; ?></td>
                  <td class="text-center">
                    <b class="text-success">
                      Paid  
                    </b>
                  </td>
                </tr>
              <?php } ?> 
          </table>
        </div>
      </div>
    <?php } ?>



















    </div>


</div>
</div>


        <?php include '../layout/staff_footer.php';  ?>