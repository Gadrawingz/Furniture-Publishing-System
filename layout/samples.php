<form method="POST">
<h2 class="text-center">Log In</h2>
  <center>
    <p class="error">
      
    </p>
  </center><br/>

  <div class="form-group col-md-12">
    <label>Username</label>
    <input class="form-control" id="user" type="text">
  </div>
  
  <div class="form-group col-md-12">
    <label >Password</label>
    <input class="form-control" id="pass" type="password">
    </select>
  </div>

  <div class="form col-md-12">
    <a href="#" id="check" class="btn btn-success pull-left btn-action">
      Sign In
    </a>
  </div>                 
</form>







        if($row['Stf_utype'] == 'HOD') {
            header("Location: .php?welcome");
        } else if($row['Stf_utype'] == 'HR') {
            header("Location: .php?welcome");
        } else if($row['Stf_utype'] == 'Lecturer') {
            header("Location: .php?welcome");
        } else if($row['Stf_utype'] == 'DAS') {
            header("Location: .php?welcome");
        }







            <?php 

              /*$count = 0;
              $paymentdATA = loadPaidOrder();

              foreach ($paymentdATA as $paymentdATASet) {  

                $count = $count + 1;  
                $orderdATASet = orderData($paymentdATASet->tbl_orderId);

                $prod = prodData(($orderdATASet->tbl_productId));
                $customerInfo = customerData($orderdATASet->tbl_customerId); */ ?>

                <tr>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" >
                      <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php echo ($prod->tbl_productName);   ?> 
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php  echo ($orderdATASet->tbl_orderAmt);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php echo ($orderdATASet->tbl_orderQty);   ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>">
                      <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>">
                      <?php echo ($paymentdATASet->tbl_paid_orderDate);   ?>
                    </a>
                  </td>


                  
                  <td>
                    <?php  if($paymentdATASet->tbl_paid_orderStatus == 0)  {   ?>
                      <a href="confirm_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-success">
                          Confirm 
                      </a>

                    <?php  }  else {  ?>

                      <b  class="text-primary">
                        Confirmed
                      </b>
                    <?php  }  ?>
                    
                  </td>

                  <?php  if($paymentdATASet->tbl_paid_orderStatus == 1)  {   ?>

                    <td class="text-center">
                      <a href="remove_payment.php?py=<?php // echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-danger">
                        <i class="fa fa-warning text-danger"></i>
                        Remove  
                      </a>
                    </td> 
                  <?php  } ?>
                </tr>

              <?php }  ?> 






























<?php
session_start();
include '../connect/connect.php'; 
include '../function/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform For Advertising And Selling Furniture</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- Please visit https://www.donnekt.com -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/homestyles.css">    
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Carrois+Gothic+SC&display=swap" rel="stylesheet">
</head>
<body>

<script type="text/javascript">
  function checkMe() {
    var phone = document.querySelector("#phone");
    var error = document.querySelector(".error");

    if(phone.value.length >  12  || phone.value.length <  12 ){
      phone.style.border = "2px solid brown";
      error.innerHTML = "Phone is invalid";
      return false;
    
    } else {
      phone.style.border = "";
      error.innerHTML = "";
      return false;
    }
  }
</script>

<div class="container">
<nav class="navbar  navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">RP/IPRC HUYE FURNITURE PLATFORM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item" >
        <div class="dropdown">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
            Categories
          </button>

          <div class="dropdown-menu">
            <a class="dropdown-item active" href="#">All</a>
            <?php $categdATA = prodCateg(1);
            foreach ($categdATA as $categdATASet) { ?>
              <a class="dropdown-item" href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
                <?php  echo ($categdATASet->tbl_categoryName); ?>
              </a>
              <?php } ?>
            </div>
          </div>
      </li>
      <?php if(isset($_SESSION['guestId'])) { ?>
      <?php  if(isset($_SESSION["cart"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php" style="color:#fff">
            <span class="fa fa-warning"></span>Cart
          </a>
        </li>
      <?php } ?>
        <li class="nav-item">
          <a class="nav-link" style="color:#fff" href="order.php" >Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../logout.php"id="account"  style="color:#fff">
            <span class="fas fa-user"></span>
            <?php  echo ($_SESSION['guestName']); ?>
          </a>
        </li>
      <?php } else { ?>
      </ul>

      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="signin.php" style="color:#fff;">Login</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>










<div class="container mt-0">
  <?php  if(!isset($_SESSION['guestId'])) { ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/chair.jpg" alt="Carpentry" width="1100" height="500">

          <div class="carousel-caption" >
            <h3>Carpentry</h3>
            <p>Buy furniture on this platform</p>
          </div>

        </div>

        <div class="carousel-item">
          <img src="../img/sofa.jpg" alt="Carpentry" width="1100" height="500">

          <div class="carousel-caption mt-5" style="color:black;margin-top:40px">
            <h3>Carpentry</h3>
            <p>furniture is placed to allow free movement. This makes the space 
            around furnitura</p>
          </div>

        </div>

        <div class="carousel-item" >
          <img src="../img/good.png" alt="Carpentry" width="1100" height="500">
          <div class="carousel-caption" style="color:black;margin-top:40px">
            <h3>Carpentry</h3>
            <p>Buy furniture on this platform</p>
          </div>
      
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
   
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
  
      </a>
    </div>


  <?php  }  ?>


  <hr>
            <div id="section-1">
            <h2 class="text-center text-danger pt-4">Browse our Categories</h2>
              <div class="row">
             
                <?php  $categdATA = prodCateg(1);
                  foreach ($categdATA as $categdATASet) {   ?>

<div class="col-md-4 col-sm-6 mt-4">
  <div class="card">
  <h5 class="text-center p-2">Shop By Category</h5>
  <a  href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
  <img class="card-img-top" src="../img/<?php  echo $categdATASet->tbl_categoryPhoto; ?>" alt="Card image" width="100px" height="300" style="border-bottom:1px solid black">
  <div class="card-body">
    <h4 class="card-title"><?php  echo $categdATASet->tbl_categoryName; ?></h4>
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
               
               
                
                <h4> k3878 Fallen Point
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurniture@gmail.com</h4>  
            </div>
            </div>
            
        </div>
        <?php include 'home_footer.php';  ?>

























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

      <div class="col-md-10 text-success">
        <h2 class="text-center">Welcome to HR management</h2>
        
        <div id="section-3">
        <!-- Icon Cards-->
      <div class="row">

        <div class="col-xl-6 col-lg-6 mb-5 text-center m-4">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-users fa-5x text-center p-5"></i>
              </div>
              <h3 class="ml-5">System users&nbsp;<button class="btn btn-lg btn-danger" disabled>6</button></h3>
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
              <h3 class="ml-5">Registered HODs&nbsp;<button class="btn btn-lg btn-danger" disabled>50</button></h3>
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
              <h3 class="ml-5">Director Manager&nbsp;<button class="btn btn-lg btn-danger" disabled>50</button></h3>
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
              <h3 class="ml-5">Finance users&nbsp;<button class="btn btn-lg btn-danger" disabled>50</button></h3>
            </div>
            <p class="card-footer text-white clearfix small z-1">
              <span class="float-left">This section shows the total number of all registered Finance</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </p>
          </div>
        </div>


      </div>
    </div>

  
        </div>   
      </div>
    </div>
  </div><hr>
  <?php include '../layout/footer.php';  ?>

  
