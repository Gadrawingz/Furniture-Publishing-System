<?php
session_start();
require_once '../function/function.php';
require_once '../connect/connect.php';
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
     



<?php
if(isset($_GET['addfurniture'])) {

if(isset($_POST['prodUpload'])) {
$EpName = ($_POST['EpName']);
$EpCateg = (($_POST['EpCateg']));
$status = 1; 
$EpPrice = 0; 
$EpQty = (($_POST['EpQty']));
$EpModel = (($_POST['EpModel']));
@$target_dir = "../img/";

$file = basename($_FILES["EpPhoto"]["name"]);
@$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
@$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (!preg_match("/^[a-zA-Z ]*$/", $EpName)) {
  echo '<script> alert("Name is invalid")</script>';
  echo '<script>window.location= "add_product.php"</script>'; 
  exit();
}

$sql = $con->prepare("SELECT * FROM tbl_product WHERE tbl_productName = ? " );
$sql->bindParam(1, $EpName);

$sql->execute();
if($sql->rowCount() > 0){

  echo '<script> alert("'.$EpName.' is already exist ")</script>';
  echo '<script>window.location= "add_product.php"</script>'; 
  exit();
  
  } else {
  $sql = $con->prepare("INSERT INTO `tbl_product`(`tbl_productName`, `tbl_productPicture`, `tbl_productPrice`, `tbl_categoryId`, `tbl_modelId`, `tbl_productQty`, `tbl_productStatus`) VALUES (?,?,?,?,?,?,?)" );

  $sql->bindParam(1, $EpName);
  $sql->bindParam(2, $file);
  $sql->bindParam(3, $EpPrice);
  $sql->bindParam(4, $EpCateg);
  $sql->bindParam(5, $EpModel);
  $sql->bindParam(6, $EpQty);
  $sql->bindParam(7, $status);

  if($sql->execute()){
    //move file to the server
    move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);
    echo '<script> alert("Furniture been saved")</script>';
    echo '<script>window.location= "add_product.php?viewFurniture"</script>'; 
    exit();
  } else { 
    echo '<script> alert("Process failed")</script>';
    echo '<script>window.location= "add_product.php?addfurniture"</script>'; 
    exit();
  }
} 
}

?>

<div class="container" id="contentContainer-fluid">

<div class="row prod" id="content-data">

  <div class="col-md-10">
    <div class="col-md-12 view-content">

      <h4 class="header-data text-center text-white" style="color: white;">
        <i class="fa fa-plus"></i>
        Add new furniture: 
      </h4>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group col-md-6">
            <label>Furniture</label>
            <input required="" class="form-control input" name="EpName"  >
          </div>

          <div class="form-group col-md-6">
            <label>Photo</label>
            <input required="" type="file" class="form-control input" name="EpPhoto"  >
          </div>

          <div class="form-group col-md-6">
            <label>Category</label>
            <select class="form-control input" name="EpCateg">
            <?php
            $stmt41 = $obj->viewCategories();
              while($row41 = $stmt41->FETCH(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $row41['tbl_categoryId']; ?>"><?php echo $row41['tbl_categoryName']; ?></option>
              <?php } ?>
            </select>
            </select>
          </div>


          <div class="form-group col-md-6">
            <label>Model</label>
            <select class="form-control input" name="EpModel">
            <?php
            $stmt41 = $obj->viewModels();
              while($row41 = $stmt41->FETCH(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $row41['tbl_modelId']; ?>"><?php echo $row41['tbl_modelName']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label>Quantity </label>
            <input type="number" value="1"  class="form-control input"  name="EpQty" > 
          </div>

          <div class="form-group button col-md-12">
            <button type="submit" name="prodUpload" class="btn btn-primary btn-do pull-left">
              <i class="fa fa-plus"></i>
              Register
            </button>      

            <button class="btn btn-danger btn-do pull-right">
              <i class="fa fa-remove"></i>
              Cancel
            </button>  

          </div>

        </form>
      
      </div><br>
    </div>
  <?php } ?>

























<?php
if(isset($_GET['addmodel'])) {

  if(isset($_POST['addModelBtn'])  ) {
      $Mname = ($_POST['Mname']);
    
      $sql = $con->prepare("SELECT * FROM tbl_model WHERE tbl_modelName = ? " );
      $sql->bindParam(1, $Mname);

      $sql->execute();
      if($sql->rowCount() > 0){
        echo '<script> alert("'.$Mname.' is already exist ")</script>';
        echo '<script>window.location= "./model.php"</script>'; 
        exit();

      }else {
        $status = 1;
        $sql = $con->prepare("INSERT INTO tbl_model (tbl_modelName, tbl_modelStatus) VALUES (?,?)");

        $sql->bindParam(1, $Mname);
        $sql->bindParam(2, $status);

        if($sql->execute()){
          echo '<script> alert("Model has been saved")</script>';
          //echo '<script>window.location= "./model.php"</script>'; 
          //exit();

        } else { 
          echo '<script> alert("Process failed")</script>';
          //echo '<script>window.location= "./model.php"</script>'; 
          //exit();
        }

      }
    } ?>

<div class="container" id="contentContainer-fluid">

<div class="row prod" id="content-data">

  <div class="col-md-10">
    <div class="col-md-12 view-content">

      <h4 class="header-data text-center text-white" style="color: white;">
        <i class="fa fa-plus"></i>
        Add new model 
      </h4>

        <form method="POST" action=""  enctype="multipart/form-data">
          <div class="form-group col-md-12">
            <label>Model name</label>
            <input required="" class="form-control input" name="Mname"  >
          </div>
        
          <div class="form-group button col-md-12">
            <button type="submit" name="addModelBtn" class="btn btn-primary btn-do pull-left">
              <i class="fa fa-plus"></i>
              Add
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
















<?php
if(isset($_GET['addcateg'])) {

      if(isset($_POST['addCtgBtn'])) {
      $Cname = ($_POST['Cname']);
      @$target_dir2= "./images/";

      $file2 = basename($_FILES["Categfile"]["name"]);
      @$target_file2 = $target_dir2 . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
      


      $sql = $con->prepare("SELECT * FROM tbl_category WHERE tbl_categoryName = ? " );
      $sql->bindParam(1, $Cname);

      $sql->execute();
      if($sql->rowCount() > 0){

        echo '<script> alert("'.$Cname.' is already exist ")</script>';
        echo '<script>window.location= "./add_product.php"</script>'; 
        exit();

      }else {
        $status = 1;
        $sql = $con->prepare("INSERT INTO tbl_category (tbl_categoryName, tbl_categoryPhoto, tbl_categoryStatus) VALUES (?,?,?)" );

        $sql->bindParam(1, $Cname);
        $sql->bindParam(2, $file2);
        $sql->bindParam(3, $status);

        if($sql->execute()){
          //move file to the server
          move_uploaded_file($_FILES["Categfile"]["tmp_name"], $target_file2);

          echo '<script> alert("Category been saved")</script>';
          //echo '<script>window.location= "./category.php"</script>'; 
          exit();

        }

        else{ 
          echo '<script> alert("Process failed")</script>';
          //echo '<script>window.location= "./category.php"</script>'; 
          exit();
        }
      }
    } ?>

<div class="container" id="contentContainer-fluid">

<div class="row prod" id="content-data">

  <div class="col-md-10">
    <div class="col-md-12 view-content">

      <h4 class="header-data text-center text-white" style="color: white;">
        <i class="fa fa-plus"></i>
        Add new category 
      </h4>

        <form method="POST" action=""  enctype="multipart/form-data">
          <div class="form-group col-md-6">
            <label>Category name</label>
            <input required="" class="form-control input" name="Cname">
          </div>

          <div class="form-group col-md-6">
            <label>Category File</label>
            <input required="" class="form-control input" type="file" name="Categfile">
          </div>
        
          <div class="form-group button col-md-12">
            <button type="submit" name="addCtgBtn" class="btn btn-primary btn-do pull-left">
              <i class="fa fa-plus"></i>
              Add
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














<?php if(isset($_GET['viewFurniture'])) { ?> 
<div class="container" id="contentContainer-fluid">
<div class="row prod" id="content-data">
  <div class="col-md-10">
    <div class="col-md-12 view-content">
      <?php
      require_once'../connect/pdoquery.php';
      $obj4 = new FurnitureQuery;

      $stmt60= $obj4->getProduct();
      while($row= $stmt60->FETCH(PDO::FETCH_ASSOC)) {
      ?>

    <div class="col-md-4 col-sm-6 mt-4">
      <div class="card">
        <?php
        if(isset($_SESSION['stfDM'])) {
          $stfchkn= 'dm';
        } else if(isset($_SESSION['stfHod'])) {
          $stfchkn= 'hod';
        } else if(isset($_SESSION['stfFinance'])) {
          $stfchkn= 'finance';
        }
        ?>

        <a href="../home/?view_product=<?php echo $row['tbl_productId']; ?>&stfchkn=<?php echo $stfchkn;?>">
          <img class="card-img-top" src="../img/<?php echo $row['tbl_productPicture']; ?>" alt="Card image" style="border-bottom:1px solid black!important; width: auto!important; max-width: 100%!important; height: auto!important; max-height: 300px!important;">
          <div class="card-body">
            <h4 class="card-title"><?php echo $row['tbl_productName'] ?></h4>
            <h4 class="card-title">Price:<?php echo $row['tbl_productPrice']; ?> Rwfs</h4>
            <p class="card-text"><small></small></p>
          </div>
        </a>
      </div>
      </div>
    <?php } ?>
  </div>
</div>
</div>
</div>
<?php } ?>












    <?php if(isset($_GET['v_reports'])) { ?>
    <div class="col-md-12">
     	<h2 class="text-center head-content">Full report</h2>

        <div class="table-responsive">
        <table class="table table-striped table-hover" style="font-size: 14px!important; ">
            
            <tr>
              <th colspan="8" class="text-center" style="font-size: 20px!important;">All Staff members</th>
            </tr>
            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Furniture</th>
              <th>Last Name</th>
              <th><i class="fa fa-user"></i>Username</th>
              <th>Role</th>
              <th>Email</th>
              <th><i class="fa fa-phone"></i>Phone Number</th>
              <th>Address</th>
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
            </tr>
        	<?php $no++; } ?>







            <tr>
              <th colspan="8" class="text-center" style="font-size: 20px!important;">All furnitures</th>
            </tr>
            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Product name</th>
              <th>Product Price</th>
              <th colspan="2" class="text-center">Model</th>
              <th>Quantity</th>
              <th colspan="2" class="text-center">Status</th>
            </tr>
            <?php
              $no=1;
              $stmt= $obj->getProduct();
              while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) {
            ?>

            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['tbl_productName'];?></td>
              <td><?php echo $row['tbl_productPrice'];?></td>
              <td colspan="2" class="text-center">
                <?php
                $mdRow1= modelData($row['tbl_modelId']);
                echo $mdRow1->tbl_modelName;
                ?>
              </td>
              <td><?php echo $row['tbl_productQty'];?></td>
              <td colspan="2" class="text-center"><?php echo $row['tbl_productStatus'];?></td>
            </tr>
          <?php $no++; } ?>









            <tr>
              <th colspan="8" class="text-center" style="font-size: 20px!important;">All paid orders</th>
            </tr>
            <tr style="font-weight: bold;" class="bg-success">
                <th>Photo</th>
                <th>Payment Method</th>
                <th>Amount paid</th>
                <th class="text-center" colspan="2">Customer</th>
                <th>Date</th>
                <th class="text-center" colspan="2">Status</th>
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









            <tr>
              <th colspan="8" class="text-center" style="font-size: 20px!important;">Unpaid orders</th>
            </tr>
            <tr>
                <th>Photo</th>
                <th>Payment Method</th>
                <th>Amount Paid</th>
                <th>Customer</th>
                <th>Tel.No</th>
                <th>Date</th>
                <th class="text-center" colspan="2">Status</center></th>
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
                    <td class="text-center" colspan="2">
                      <b class="text-danger">
                        Pending  
                      </b>
                    </td>
                  <?php } else { ?>
                    <td class="text-center" colspan="2">
                      <a href="" class="btn btn-primary">
                        <i class="fas fa-money"></i>
                        Paid  
                      </a>
                    </td>
                  <?php } ?>
                </tr>
          <?php $no++; } ?>




        </table>
    	</div>
    <?php } ?>

    </div>

        <?php include '../layout/staff_footer.php';  ?>