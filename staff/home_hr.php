<?php
session_start();
require_once '../function/function.php';
// if(!isset($_SESSION['stuser']) && !isset($_SESSION['hodId'])) {
// echo '<script>window.location="../home/index.php"</script>';
// exit();

include '../layout/header_hr.php';
?>

  

  <div class="container"  id="contentContainer-fluid" style="height: auto!important;">
    <div class="row prod" id="content-data" style="font-family: verdana!important; height: 1000px!important;">
      <div class="col-md-2 left-data-link" style="height: auto!important; background-color: #1a5276!important; padding: 0px!important; margin: 0px!important; color: #FFF!important;"> 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h2 class="text-center text-success">Welcome to HR management</h2><hr style="border: 2px solid #1a5276!important;">
    
    <?php 
    //require_once ('../connect/pdoquery.php');
    //$obj = new FurnitureQuery;

    if(!isset($_GET['viewstaffs']) && !isset($_GET['regstaff'])) { ?> 
    <div id="section-3">
        <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">System users&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countAllStaffmembers(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section describes all users who are this system made for.</span>
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
                <i class="fa fa-users fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Registered HODs&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countHODs(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all registered HoDs</span>
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
                <i class="fa fa-th fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Director Manager&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countHODs(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all registered DMs</span>
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
                <i class="fa fa-th fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">Finance users&nbsp;<button class="btn btn-lg btn-warning text-danger" disabled><?php echo $obj->countFinances(); ?></button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all registered Finance</span>
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
              <td><a onclick="return confirm('Are u sure you want to delete this member?')" href="?deleteStaff=<?php echo $row['stf_id'];?>" class="btn btn-danger">Delete</a></td>
            </tr>
        	<?php $no++; } ?>
        </table>
    	</div>
    <?php } ?>
    
    <?php
    if(isset($_GET['deleteStaff'])) {
    $obj->deleteStaffMember($_GET['deleteStaff']);
    echo "<script>alert('Deleted')</script>";
    echo "<script>window.location='home_hod.php?viewstaffs'</script>";
    }
    ?>
    	


      

    <?php if(isset($_GET['regstaff'])) {
    
    if(isset($_POST['regStaffBtn'])) {
      $obj->addStaffMember($_POST['fname'], $_POST['lname'], $_POST['uname'], $_POST['userrole'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address']);
    }
      
      
    ?>
    <div class="div-form">
              <div class="row">
                    <div class="col-sm-2"></div>
              
                    <div  class="col-md-8">
                    <div class="jumbotron">
                      <form enctype="multipart/form-data" class="row form" method="POST"> 

                        <h2 class="text-center">Add New Staff member</h2>

                          <center>
                            <p  class="error"></p>
                          </center><br/>

                          <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input class="form-control" id="fname" type="text" name="fname" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label >Last Name</label>
                            <input class="form-control" id="lname" type="text" name="lname" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label >User Name</label>
                            <input class="form-control" id="uname" type="text" name="uname" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label >User role</label>
                            <select class="form-control" id="userrole" name="userrole" required>
                            <?php if(isset($_GET['reghod'])) { ?>
                              <option value="HOD">HOD</option>
                              <?php } if(isset($_GET['regdm'])) { ?>
                              <option value="DM">DM</option>
                              <?php } if(isset($_GET['finance'])) { ?>
                              <option value="Finance">Finance</option>
                              <?php } ?>
                            </select>
                          </div>


                          <div class="form-group col-md-6">
                            <label >Email</label>
                            <input class="form-control" id="email" type="email" name="email" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label >Phone</label>
                            <input class="form-control" type="number" name="phone" required>
                          </div>


                          <div class="form-group col-md-6">
                            <label  class="pull-left">
                              Password: 
                            </label>
                            <input class="form-control" id="password" type="password" name="password" required>
                          </div>
                          
                          <div class="form-group col-md-6">
                            <label class="pull-left">
                              Address: 
                            </label>
                            <input class="form-control" id="address" type="text" name="address" required>
                          </div>
                          
                          <br><br>

                          <div class="form col-md-12">
                            <button class="btn btn-success pull-left btn-action" name="regStaffBtn">Register</button>
                          </div>
                      </form>
                      </div>     
                    </div>

                    <div class="col-sm-4 "></div>
            </div>
            <?php } ?>








    </div>


</div>
</div>


        <?php include '../layout/staff_footer.php';  ?>