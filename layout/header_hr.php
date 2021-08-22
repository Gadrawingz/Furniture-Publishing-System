<!DOCTYPE html>
<html lang="en">
<head>
  <title>Platform For Advertising And Selling Furniture</title>
  <!--
    Application powered and revised at Donnekt group
    https://www.donnekt.com
    Developed & Designed by Gadrawingz
    Backed by Gadrawingz
    https://www.github.com/Gadrawingz
    https://www.instagram.com/gadrawingz
  -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- add style -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- form style -->
  <link rel="stylesheet" href="../css/form.css">
  <!-- 1 style -->
  <link rel="stylesheet" href="../css/1.css">
  <!-- small style -->
  <link rel="stylesheet" href="../css/small.css">
  <!-- 2 style -->
  <link rel="stylesheet" href="../css/2.css">

  <style>
    .proError{
      width: 50%;
      border:1px solid #a94442;
      color: #a94442;
      background-color: #f2dede;
      border-radius: 5px;
      text-align: center;
      height: 6vh;
      margin-top:3px;
      margin-bottom: 3px;
    }

    .proError p{
      margin-top:-13px;
      font-size: 16px;
      font-family: Arial;
    }

    /* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */

    .flip-card {
      background-color: transparent;
      perspective: 1000px; /* Remove this if you don't want the 3D effect */
    }

    /* This container is needed to position the front and back side */
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY( 180deg);
}

/* Position the front and back side */
.flip-card-front, .flip-card-back {
  position: relative;
  width: 100%;
  top: 0px;
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateY(180deg);
}


  </style>
</head>
<body>

  <script type="text/javascript">
    
    //////////////////////////// used javascript////////////////////////

    function toggleMe() {
      var icon = document.getElementById('icon');

      if(icon.getAttribute('class') === 'fa fa-arrow-down'){
        icon.setAttribute('class', 'fa fa-arrow-up');
      }else{
        icon.setAttribute('class', 'fa fa-arrow-down');
      }
    }


  </script>

<?php
include '../connect/pdoquery.php';
$obj = new FurnitureQuery;

if(isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../home");
}
?> 

<nav class="navbar nav-data container" style="border-top-left-radius: 20px;  border-top-right-radius: 20px; padding: 8px!important;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button onclick="toggleMe();"  type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="fa fa-arrow-down" id="icon" style="color: white;"> </i>
      </button>
      <a class="navbar-brand text-white" href="#" style="color: white; font-family: verdana!important;">
        <b>HR&nbsp;&raquo;</b>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav nav-link">

        <?php if(isset($_SESSION['stuser'])) { ?>
          <li><button class="btn btn-success btn-lg"><i class="fa fa-user text-white">&nbsp;</i><?php echo $_SESSION['stuser'];?></button></li>
          &nbsp;&nbsp;<li><a href="#">Dashboard</a></li>&nbsp;&nbsp;
          <li>
            <a href="?logout" class="log-data btn btn-danger">
              <i class="fa fa-lock text-white"></i>
              Logout
            </a>
          </li>
        <?php } else { ?>

          <li>
            <a href="#" id="login" >
              <span class="fa fa-user"></span> Sign In
            </a>
          </li>
        <?php } ?>
         
      </ul>

    </div>
  </div>
</nav>