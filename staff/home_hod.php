<?php
session_start();
require_once '../function/function.php';
// if(!isset($_SESSION['stuser']) && !isset($_SESSION['hodId'])) {
// echo '<script>window.location="../home/index.php"</script>';
// exit();

include '../layout/header_hod.php';
?>

  

  <div class="container"  id="contentContainer-fluid" style="height: auto!important;">
    <div class="row prod" id="content-data" style="font-family: verdana!important; height: 1000px!important;">
      <div class="col-md-2 left-data-link" style="height: auto!important; background-color: #1a5276!important; padding: 0px!important; margin: 0px!important; color: #FFF!important;"> 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h2 class="text-center text-success">Welcome to HOD management</h2><hr style="border: 2px solid #1a5276!important;">
       
    <?php if(!isset($_GET['viewstaffs']) && !isset($_GET['viewFurniture']) && !isset($_GET['setp']) && !isset($_GET['view_py'])) { ?> 
    <div id="section-3">
        <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-list fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">All furniture&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countFurnitures(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all furnitures</span>
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
                <i class="fa fa-archive fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Cupboards&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled>13</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all cupboards</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-archive fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Tables&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled>12</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all tables</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-archive fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Beds&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled>50</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all beds</span>
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
              <th colspan="1" class="text-center">Action</th>
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
              <td><button onmouseover="return alert('You cant Delete, unless HR!')" class="btn btn-danger">Delete</button></td>
            </tr>
        	<?php $no++; } ?>
        </table>
    	</div>
    <?php } ?>
    	


    </div>


</div>
</div>


        <?php include '../layout/staff_footer.php';  ?>