    <!-- Sidebar -->
    <h2 class="text-center"><b>Menus</b></h2><br>

    <ul class="sidebar navbar-nav" id="side-link" style="margin-bottom: 0px!important;">

      <?php if(isset($_SESSION['stuser'])){  ?>
      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?regstaff&reghod" style="color: #FFF!important;">
          <i class="fa fa-edit"></i>
          <span>Register Hod</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?regstaff&regdm" style="color: #FFF!important;">
          <i class="fa fa-folder"></i>
          <span>Register DM</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?regstaff&finance" style="color: #FFF!important;">
          <i class="fa fa-money"></i>
          <span>Reg. Finance</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?viewstaffs" style="color: #FFF!important;">
          <i class="fa fa-users"></i>
          <span>View All staffs</span>
        </a>
      </li>


    <?php } else if(isset($_SESSION['stfHod'])){  ?>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?addmodel" style="color: #FFF!important;">
          <i class="fa fa-edit"></i>
          <span>Add model</span>
        </a>
      </li>


      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?addcateg" style="color: #FFF!important;">
          <i class="fa fa-edit"></i>
          <span>Add Category
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?addfurniture" style="color: #FFF!important;">
          <i class="fa fa-money"></i>
          <span>Add furniture</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?viewFurniture" style="color: #FFF!important;">
          <i class="fa fa-users"></i>
          <span>View Furniture</span>
        </a>
      </li>



    <?php } else if(isset($_SESSION['stfFinance'])){  ?>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="home_finance.php?view_py" style="color: #FFF!important;">
          <i class="fa fa-list"></i>
          <span>View payments</span>
        </a>
      </li>
       

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?setfprice" style="color: #FFF!important;">
          <i class="fa fa-bookmark"></i>
          <span>Set furniture price</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="?sendreport=true" style="color: #FFF!important;">
          <i class="fa fa-th"></i>
          <span>Provide report to DM</span>
          <?php
          if(isset($_GET['sendreport'])=='true') { 
            echo"<script>alert('Report is successfully provided to DM!');</script>";
          }
          ?>
        </a>
      </li>

    <?php } else if(isset($_SESSION['stfDM'])) { ?>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?viewFurniture" style="color: #FFF!important;">
          <i class="fa fa-edit"></i>
          <span>View furniture</span>
        </a>
      </li>

     <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="home_dm.php?v_approved" style="color: #FFF!important;">
          <i class="fa fa-list"></i>
          <span>View approved</span>
        </a>
      </li>

      <li class="nav-item dropdown" style="margin-bottom: 10px!important;">
        <a class="nav-link" href="add_product.php?v_reports" style="color: #FFF!important;">
          <i class="fa fa-bookmark"></i>
          <span>View Reports</span>
        </a>
      </li>

      


    <?php } ?>
    </ul>

