<?php
session_start();
include '../connect/pdoquery.php';
$obj = new FurnitureQuery;
include '../connect/connect.php'; 
include '../function/function.php'; 
include './head.php';


?>


<div class="container">
  

  <?php if(isset($_GET['customer'])) {

    if(isset($_POST['custLogin'])) {
    $stmt2= $obj->customerLoginForm();
    $row2= $stmt2->FETCH(PDO::FETCH_ASSOC);
    
    if($_POST['email']== $row2['tbl_customerEmail'] && $_POST['password']== $row2['tbl_customerPass']){
      $_SESSION['custNames'] = $row2['tbl_customerFname']." ".$row2['tbl_customerLname'];
      $_SESSION['custId'] = $row2['tbl_customerId'];
      echo "<script>window.location='../home/'</script>";
    } else {
      echo "<script>window.location='../home/signin.php?customer'</script>";

    }
  }
  ?>


  <div class="div-form">
    <div class="row">
      <div class="col-sm-4"></div>
      <div  class="col-md-4">
        <div class="card">
          <h2 class="card-header text-center">Customer Login</h2>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" class="row form"> 
              <h4 class="text-center"><i class="fas fa-users fa-2x"></i></h4>
              <center>
                <p class="error"></p>
              </center><br/>

            
              <div class="form-group col-md-12">
                <label><i class="fas fa-envelope"></i>Email Address</label>
                <input class="form-control" id="user" type="email" name="email">
              </div>
              <div class="form-group col-md-12">
                <label><i class="fas fa-lock"></i>Password</label>
                <input class="form-control" id="pass" type="password" name="password">
              </div>
              <div class="form col-md-12">
                <button type="submit" name="custLogin" class="btn btn-success pull-left btn-action">
                  Sign In
                </button>
                <button type="reset" id="check" class="btn btn-danger pull-right btn-action">
                Cancel
                </button>
              </div>
              <div class="form col-md-12">
              <center>
                <a href="signin.php?regcust" class="btn btn-success text-center"  style="color: #FFF!important;">
                  Registration
                </a>
              </center>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><br><hr><br>
  <?php } ?>





  <?php if(isset($_GET['staff'])) { ?>


<?php   
if(isset($_POST['staffLogin'])) {

  if(($_POST['userrole'])=='HR') { 
    $stmt1= $obj->humanResourceLogin();
    $row1= $stmt1->FETCH(PDO::FETCH_ASSOC);
    
    if($_POST['email']== $row1['hr_email'] && $_POST['password']== $row1['hr_password']){
      $_SESSION['stuser'] = $row1['hr_firstname']." ".$row1['hr_lastname'];
      //header("Location:../staff/home_hr.php");
      echo "<script>window.location='../staff/home_hr.php'</script>";

    } else {
      echo "<script>window.location='signin.php?staff&error'</script>";
    }
  }


  if(isset($_POST['userrole'])=='HOD' || isset($_POST['userrole'])=='DM' || isset($_POST['userrole'])=='Finance') {
    $stmt= $obj->staffMemberLogin();
    $row= $stmt->FETCH(PDO::FETCH_ASSOC);
    
    if($_POST['email']== $row['stf_email'] && $_POST['password']== $row['stf_password']){
      $_SESSION['stfId'] = $row['stf_id'];
      $_SESSION['stfName'] = $row['stf_firstname']." ".$row['stf_lastname'];
      
    if($row['stf_userrole']== 'HOD') {
      $_SESSION['stfHod']= $row['stf_firstname']." ".$row['stf_lastname'];
      echo "<script>window.location='../staff/home_hod.php'</script>";

    } else if($row['stf_userrole']== 'DM') {
      $_SESSION['stfDM'] = $row['stf_firstname']." ".$row['stf_lastname'];
      echo "<script>window.location='../staff/home_dm.php'</script>";

    } else if($row['stf_userrole']== 'Finance') {
      $_SESSION['stfFinance'] = $row['stf_firstname']." ".$row['stf_lastname'];
      echo "<script>window.location='../staff/home_finance.php'</script>";

    } else {
      echo "<script>window.location='signin.php?staff'</script>";

    }
  }
}

}
?>


  <div class="div-form">
    <div class="row">
      <div class="col-sm-4"></div>
      <div  class="col-md-4">
        <div class="card">
          <h2 class="card-header text-center">Staff Member Login</h2>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" class="row form"> 
              <h4 class="text-center"><i class="fas fa-users fa-2x"></i></h4>
              <center>
                <?php if(isset($_GET['error'])) { ?>
                <p class="btn-danger text-center text-light">Incorrect E-mail or Password</p>
                <?php } ?>
              </center><br/>

              <div class="form-group col-md-12">
                <label><i class="fas fa-users"></i>Login as:</label>
                <select class="form-control" id="loginAs" name="userrole">
                <option value="HR">HR</option>
                <option value="HOD">HOD</option>
                <option value="DM">DM</option>
                <option value="Finance">Finance</option>
              </select>
              </div>
              
              <div class="form-group col-md-12">
                <label><i class="fas fa-user"></i>Email Address</label>
                <input class="form-control" id="user" type="email" name="email">
              </div>
              <div class="form-group col-md-12">
                <label><i class="fas fa-lock"></i>Password</label>
                <input class="form-control" id="pass" type="password" name="password">
              </div>
              <div class="form col-md-12">
                <button type="submit" name="staffLogin" id="" class="btn btn-success pull-left btn-action">
                  Sign In
                </button>
                <button type="reset" id="check" class="btn btn-danger pull-right btn-action">
                Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
















    <?php if(isset($_GET['regcust'])) {
    
    
    if(isset($_POST['regCustBtn'])) {
      $obj->customerRegist($_POST['fname'], $_POST['lname'], $_POST['uname'], $_POST['email'], $_POST['phone'], $_POST['password'], $_POST['address']);
      echo "<script>window.location='signin.php?customer'</script>";
    }
      
      
    ?>
    <div class="div-form">
              <div class="row">
                    <div class="col-sm-2"></div>
              
                    <div  class="col-md-8">
                    <div class="jumbotron">
                      <form enctype="multipart/form-data" class="row form" method="POST"> 

                        <h2 class="text-center">Customer registration</h2>

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
                            <button class="btn btn-success pull-left btn-action" name="regCustBtn" type="submit">Register</button>
                            <button class="btn btn-danger pull-right btn-action" type="reset">Cancel</button>
                          </div>
                      </form>
                      </div>     
                    </div>

                    <div class="col-sm-4 "></div>
            </div>
            <?php } ?>


























                        
      


<?php if(!isset($_GET['regcust']) && !isset($_GET['customer']) && !isset($_GET['staff'])) { ?>
        <div id="section-3" style="background-color: #d2b4de!important;">
            <div class="row" >

              <h4 class="text-center">Reach us</h3>
              <div class="col-md-4">
                <i class="fa fa-map-marker fa-3x text-center p-5"></i>
               
               
                
                <h4>RP/IPRC HUYE
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fa fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fa fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurn@gmail.com</h4>
            </div>
          
            </div>
            
        </div>
        <?php }

        include './footer.php';  ?>