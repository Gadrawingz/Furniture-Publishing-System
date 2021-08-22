<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['stuser'])){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  //include './add_cart.php'; 
  include '../layout/header.php';      ?>

  <div class="container content"  id="contentContainer-fluid">
  
    <div class="row prod" id="content-data" >
<div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">       

        <div class="col-md-12">
          <a href="#" data-toggle="modal" data-target="#categModal" class="btn btn-primary pull-left">
            <i class="fa fa-plus"></i>
            Add category
          </a>

        </div>

      <h4 class="text-center head-content">All categories</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Name</th>
              <th class="text-center">Action</th>
            </tr>

            <?php 
              
              $count = 0;
              $categdATA = prodCateg(1);
              foreach ($categdATA as $categdATASet) { 

                $count = $count + 1;  ?>

                <tr>

                  <td>
                    <a href="#"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="#">  <?php echo ($categdATASet->tbl_categoryName);   ?>
                    </a>
                  </td>

                  <td class="text-center">
                    <a href="edit_category.php?p=<?php  echo urlencode($categdATASet->tbl_categoryId);  ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                      Update 
                    </a>
                  </td>



                </tr>

              <?php }  ?> 

          </table>

        </div>    



      </div>

    </div><br><br><br><br><br><br><br><br><br>
  
  </div>


  <?php include '../layout/footer.php';  ?>
  
