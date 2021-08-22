<div id="accountModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <span class="glyphicon glyphicon-user"></span> View profile</h2>
      </div>
      <div class="modal-body">

        <center>
          <p  class="error"  > </p>
        </center><br/>

        <div class="row form">

          <form enctype="multipart/form-data"> 

          <div class="col-md-2"></div>
          <div class="col-md-8">

            <?php   

              if(isset($_SESSION['guestId'])){

                $u = userData($_SESSION['guestId']);

              }else if(isset($_SESSION['otherId'])){

                $u = userData($_SESSION['otherId']);

              }else if(isset($_SESSION['adId'])){

                $u = userData($_SESSION['adId']);

              }

            ?>
        
            <h4 class="col-md-6">
                Name: 

                <span class="text-primary">
                  <?php echo $u->tbl_adminName;  ?>
                </span>

              </h4>

              <h4 class="col-md-6">
                Username: 

                <span class="text-primary">
                  <?php echo $u->tbl_adminUserName;  ?>
                </span>
              </h4>
              <h4 class="col-md-6" >
                Phone: 

                <span class="text-primary">
                  <?php echo $u->tbl_adminTel;  ?>
                </span>
              </h4>

              <h4 class="col-md-6" >
                E-mail: 

                <span class="text-primary">
                  <?php echo $u->tbl_adminEmail;  ?>
                </span>
              </h4>

              <h4 class="col-md-6" >
                Address: 

                <span class="text-primary">
                  <?php echo strtoupper( $u->tbl_adminAddress);  ?>
                </span>
              </h4>


          </div><!-- end of column-->

          <div class="col-md-2"></div>
          
          </form>

        </div> <!-- end of row---> 

      </div>
      <div class="modal-footer">

        <!--
        <a href="#" id="changePass" class="btn btn-danger pull-left btn-action">
          <i class="fa fa-warning text-danger"></i>
          Change password</a>

        <a href="#" id="changeProf" class="btn btn-success pull-right btn-action">
          <i class="fa fa-edit text-white"></i>
          Change profile
        </a>

        -->
      </div>
    </div>

  </div>
</div>





<!-- Modal -->
<div id="categModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <i class="fa fa-plus"></i>
          Add new category
        </h2>
      </div>
      <div class="modal-body">

        <form method="POST" action="add_category.php"  enctype="multipart/form-data" >
  
          <center>
            <p class="error" > </p>
          </center><br>


          <div class="row form">

            <div class="col-md-3"></div>

            <div class="col-md-6">
        
              <div class="form-group">
                <label for="inputdefault">Category name</label>
                <input class="form-control" name="Cname" type="text" required="true">
              </div>

              <div class="form-group">
                <label>Photo </label>
                <input required="" type="file" class="form-control input" name="EpPhoto"  >
              </div>



            </div><!-- end of column-->
          
          </div> <!-- end of row---> 


      </div>
      <div class="modal-footer">
        <button type="submit" name="addCtg" class="btn btn-primary pull-right btn-action">Register</a>
      </div>

      </form>

    </div>

  </div>
</div>















<!-- Modal -->
<div id="ModelModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <i class="fa fa-plus"></i>
          Add new model
        </h2>
      </div>
      <div class="modal-body">

        <form method="POST" action="add_model.php"  enctype="multipart/form-data" >
  
          <center>
            <p class="error" > </p>
          </center><br>


          <div class="row form">

            <div class="col-md-3"></div>

            <div class="col-md-6">
        
              <div class="form-group">
                <label for="inputdefault">Name</label>
                <input class="form-control" name="Cname" type="text" required="true">
              </div>


            </div><!-- end of column-->
          
          </div> <!-- end of row---> 


      </div>
      <div class="modal-footer">
        <button type="submit" name="addCtg" class="btn btn-primary pull-right btn-action">Register</a>
      </div>

      </form>

    </div>

  </div>
</div>







<div id="contactModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <i class="fa fa-plus"></i>
          Contact us, we are here to help you
        </h2>
      </div>
      <div class="modal-body">

        <center>
          <p  class="text-danger error"  > </p>
        </center><br/>

        <div class="row form">

          <form enctype="multipart/form-data"> 

          <div class="col-md-3"></div>
          <div class="col-md-6">

            <div class="form-group">
              <label>Message</label>
              <textarea class="form-control input" id="message" ></textarea>
            </div>

          </div><!-- end of column-->
          
          </form>

        </div> <!-- end of row---> 

      </div>
      <div class="modal-footer">
        <a href="#" id="sendMessage" class="btn btn-success pull-right btn-action">Send Message</a>
      </div>
    </div>

  </div>
</div>





<div id="changeProfModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <i class="fa fa-edit"></i> Edit profile</h2>
      </div>
      <div class="modal-body">

        <center>
          <p  class="error"  > </p>
        </center><br/>

        <div class="row form">


          <form enctype="multipart/form-data"> 
          <div class="col-md-6">

            <?php   

              if(isset($_SESSION['guestId'])){

                $u = userData($_SESSION['guestId']);

              }else if(isset($_SESSION['otherId'])){

                $u = userData($_SESSION['otherId']);

              }else if(isset($_SESSION['adId'])){

                $u = userData($_SESSION['adId']);

              }

            ?>

        
            <div class="form-group">
              <label>First Name</label>
              <input class="form-control" id="efname" value="<?php echo $u->tbl_userFname;  ?>" type="text">
            </div>

            <div class="form-group">
              <label >Last Name</label>
              <input class="form-control" id="elname" value="<?php echo $u->tbl_userLname;  ?>" type="text">
              </select>
            </div>

            <div class="form-group">
              <label >Phone Number</label>
              <input class="form-control" id="ephone" value="<?php echo $u->tbl_userPhone;  ?>" type="number">
              </select>
            </div>



          </div><!-- end of column-->
          
          <div class="col-md-6">


            <div class="form-group">
              <label >E-mail</label>
              <input type="email" value="<?php echo $u->tbl_userEmail;  ?>" class="form-control" id="Eemail" >
              </select>
            </div>

            <div class="form-group">
              <label >Date of birth</label>
              <input class="form-control"  value="<?php echo ( $u->tbl_userDob);  ?>" id="edob" type="date">
            </div>

            <div class="form-group">
              <label >Gender</label>
              <select class="form-control" id="egender">

                <option value="<?php echo strtoupper( $u->tbl_userGender);  ?>">
                  <?php echo strtoupper( $u->tbl_userGender);  ?>    
                </option>

                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>



          </div>
          </form>

        </div> <!-- end of row---> 

      </div>
      <div class="modal-footer">
        <a href="#" id="confirm" class="btn btn-success pull-right btn-action">Confirm</a>
      </div>
    </div>

  </div>


  <input type="hidden" value="<?php echo $u->tbl_userId;  ?>" id="u">
</div>



<div id="changePassModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center text-primary">
          <i class="fa fa-lock"></i> Change password</h2>
      </div>
      <div class="modal-body">

        <center>
          <p  class="error"  > </p>
        </center><br/>

        <div class="row form">


          <form enctype="multipart/form-data"> 

          <div class="col-md-3"></div>

          <div class="col-md-6">

            <?php   

              if(isset($_SESSION['guestId'])){

                $u = userData($_SESSION['guestId']);

              }else if(isset($_SESSION['otherId'])){

                $u = userData($_SESSION['otherId']);

              }else if(isset($_SESSION['adId'])){

                $u = userData($_SESSION['adId']);

              }

            ?>

        
            <div class="form-group">
              <label>Current password</label>
              <input class="form-control" id="cpass" type="password">
            </div>

            <div class="form-group">
              <label >New password</label>
              <input class="form-control" id="newpass" type="password">
              </select>
            </div>



          </div><!-- end of column-->
          
          <div class="col-md-3"></div>
          </form>

        </div> <!-- end of row---> 

      </div>
      <div class="modal-footer">
        <a href="#" id="change" class="btn btn-success pull-right btn-action">Change</a>
      </div>
    </div>

  </div>


  <input type="hidden" value="<?php echo $u->tbl_userId;  ?>" id="usr">
</div>