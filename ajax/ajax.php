<script type="text/javascript">

  $(document).ready(function(){

    $('#add').on('click', function(){

        var fname = $('#fname').val();
        var lname = $('#lname').val();

        var username = $('#username').val();
        var password = $('#password').val();

        var phone = $('#phone').val();
        var email = $('#email').val();

        var address = $('#address').val();
        var error = $('.error');

        if(fname == ''){

          $('#fname').css('border', '2px solid brown');
          $('#username').css('border', '');

          $('#password').css('border', '');
          $('#phone').css('border', '');

          $('#email').css('border', '');
          $('#address').css('border', '');

          error.text('First name is blank.');

          error.show();
          return false;
        
        }else if(username == ''){

          $('#username').css('border', '2px solid brown');
          $('#fname').css('border', '');

          $('#password').css('border', '');
          $('#phone').css('border', '');

          $('#email').css('border', '');
          $('#address').css('border', '');

          error.text('Username is blank.');

          error.show();
          return false;
   
        }else if(password == ''){

          $('#password').css('border', '2px solid brown');
          $('#fname').css('border', '');

          $('#username').css('border', '');
          $('#phone').css('border', '');

          $('#email').css('border', '');
          $('#address').css('border', '');

          error.text('Password is blank.');

          error.show();
          return false;
   
        }else if(phone == ''){

          $('#phone').css('border', '2px solid brown');
          $('#fname').css('border', '');

          $('#username').css('border', '');
          $('#password').css('border', '');

          $('#email').css('border', '');
          $('#address').css('border', '');
                    
          error.text('Phone is blank.');

          error.show();
          return false;
   
        }else if(phone.length > 12 ||  phone.length < 12   ){

          $('#phone').css('border', '2px solid brown');
          $('#fname').css('border', '');

          $('#username').css('border', '');
          $('#password').css('border', '');

          $('#email').css('border', '');
          $('#address').css('border', '');

          error.text('Phone is invalid, Eg: 250789875533');

          error.show();
          return false;
   
        }else if(address == ''){

          $('#address').css('border', '2px solid brown');
          $('#fname').css('border', '');

          $('#username').css('border', '');
          $('#password').css('border', '');

          $('#email').css('border', '');
          $('#phone').css('border', '');
                    
          error.text('Address is required.');

          error.show();
          return false;
   
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              fname: fname, 
              lname: lname, 

              username: username,
              password: password,

              phone: phone,
              email: email,

              address: address


            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(username+' has been registered');
                    
                    window.location ="signin.php";

                }else if(data.trim() === 'exist' ){

                    alert(username+' is already registered');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                  $('#fname').css('border', '2px solid brown');
                  $('#username').css('border', '');

                  $('#password').css('border', '');
                  error.text('First name is  invalid.')

                  error.show();
                  return false;

                
                }else if(data.trim() === 'linvalid' ){

                  $('#lname').css('border', '2px solid brown');
                  $('#username').css('border', '');

                  $('#password').css('border', '');
                  $('#fname').css('border', '');

                  error.text('Last name is  invalid.')

                  error.show();
                  return false;

                
                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });



    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#check').on('click', function(){

        var user = $('#user').val();
        var pass = $('#pass').val();

        var type = $('#type').val();

        var error = $('.error');

        if(user == ''){

          $('#user').css('border', '2px solid brown');
          $('#pass').css('border', '');

          error.text('Username is required.')

          error.show();
          return false;
        
        }else if(pass == ''){

          $('#pass').css('border', '2px solid brown');
          $('#user').css('border', '');

          error.text('Password is required.')
          error.show();

          return false;
   
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              user: user, 
              pass: pass,

              type: type
            },

            success: function(data){

                if(data.trim() === 'guest' ){

                    //alert('You are authorised');
                    window.location ="index.php";

                   
                    $('#loginModal').modal('toggle');

                }

                else if(data.trim() === 'other' ){

                    //alert('You are authorised');
                    window.location ="../other/";

                   
                    $('#loginModal').modal('toggle');

                }

                else if(data.trim() === 'admin' ){

                    //alert('You are authorised');
                    window.location ="../admin/";

                   

                }

                else if(data.trim() === 'hod' ){

                    //alert('You are authorised');
                    window.location ="../hod/furniture.php";
                   

                }

                else if(data.trim() === 'finance' ){

                    //alert('You are authorised');
                    window.location ="../hod/paid.php";
                   

                }


                else if(data.trim() === 'wrong' ){

                    alert('Wrong Credentials');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }

            }

          });   

        }

    });







    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#ship').on('click', function(){

        var order = $('#order').val();
        var location = $('#location').val();

        var address1 = $('#address1').val();
        var address2 = $('#address2').val();

        if(location == ''){

          $('#location').css('border', '2px solid brown');
          alert('Location is not selected.')

          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              order: order, 
              location: location,

              address1: address1,
              address2: address2
            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Your order has been shipped, You will receive confirmation message');
                    window.location ="shipping.php";

                }


                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }

            }

          });   

        }

    });





    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#editUser').on('click', function(){

        var userData = $('#userData').val();
        var EditFname = $('#EditFname').val();


        var EditLoc1 = $('#EditLoc1').val();
        var EditPhone = $('#EditPhone').val();

        var EditEmail = $('#EditEmail').val();

        if(EditFname == ''){

          $('#EditFname').css('border', '2px solid brown');

          $('#EditPhone').css('border', '');
          $('#EditEmail').css('border', '');

          alert('Name is required.');
          return false;
        
        }else if(EditPhone == ''){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');
          
          alert('Phone number is required.');
          return false;
        
        }else if(EditPhone.length > 12 || EditPhone.length < 12 ){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');

          alert('Phone number is invalid, Eg: 250789875533');
          return false;
        
        }else if(EditEmail == ''){

          $('#EditEmail').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditPhone').css('border', '');
          
          alert('Email is blank.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              userData: userData, 
              EditFname: EditFname,

              EditPhone: EditPhone,
              EditEmail: EditEmail,

              EditLoc1: EditLoc1

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(EditFname+' has been updated');
                    window.location ="index.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                    alert("Name is invalid,  only letters and white space allowed");
                    $('#EditFname').css('border', '2px solid brown');

                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });




    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#addSuppl').on('click', function(){

        var sFname = $('#sFname').val();
        var sLname = $('#sLname').val();

        var sNid = $('#sNid').val();
        var sPhone = $('#sPhone').val();

        if(sFname == ''){

          $('#sFname').css('border', '2px solid brown');
          $('#sNid').css('border', '');

          $('#sPhone').css('border', '');

          alert('First name is blank.');
          return false;
        
        }else if(sNid == ''){

          $('#sNid').css('border', '2px solid brown');
          $('#sFname').css('border', '');

          $('#sPhone').css('border', '');

          alert('National Id is blank.');
          return false;
        
        }else if(sNid.length > 16 || sNid.length < 16  ){

          $('#sNid').css('border', '2px solid brown');
          $('#sFname').css('border', '');

          $('#sPhone').css('border', '');

          alert('Invalid national Id.');
          return false;
        
        }else if(sPhone == ''){

          $('#sPhone').css('border', '2px solid brown');
          $('#sFname').css('border', '');

          $('#sNid').css('border', '');

          alert('Phone Number is blank');
          return false;
        
        }else if(sPhone.length > 12 || sPhone.length < 12  ){

          $('#sPhone').css('border', '2px solid brown');
          $('#sFname').css('border', '');

          $('#sNid').css('border', '');

          alert('Invalid phone number, eg: 250787873533');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              sFname: sFname, 
              sLname: sLname,

              sNid: sNid,
              sPhone: sPhone
            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(sFname+' has been saved');
                    window.location ="supplier.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                    alert("First name is invalid,  only letters and white space allowed");
                    $('#sFname').css('border', '2px solid brown');

                    return false;

                
                }else if(data.trim() === 'linvalid' ){

                    alert("Last name is invalid,  only letters and white space allowed");
                    $('#sLname').css('border', '2px solid brown');

                    return false;

                
                }else if(data.trim() === 'exist' ){

                    alert(sNid+ " is already exist");
                    $('#sNid').css('border', '2px solid brown');

                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });




    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#editSuppl').on('click', function(){

        var EsFname = $('#EsFname').val();
        var EsLname = $('#EsLname').val();

        var EsNid = $('#EsNid').val();
        var EsPhone = $('#EsPhone').val();

        var suppData = $('#suppData').val();
        var EsVisible = $('#EsVisible').val();

        if(EsFname == ''){

          $('#EsFname').css('border', '2px solid brown');
          $('#EsNid').css('border', '');

          $('#EsPhone').css('border', '');

          alert('First name is blank.');
          return false;
        
        }else if(EsNid == ''){

          $('#EsNid').css('border', '2px solid brown');
          $('#EsFname').css('border', '');

          $('#EsPhone').css('border', '');

          alert('National Id is blank.');
          return false;
        
        }else if(EsNid.length > 16 || EsNid.length < 16  ){

          $('#EsNid').css('border', '2px solid brown');
          $('#EsFname').css('border', '');

          $('#EsPhone').css('border', '');

          alert('National Id is invalid.');
          return false;
        
        }else if(EsPhone == ''){

          $('#EsPhone').css('border', '2px solid brown');
          $('#EsFname').css('border', '');

          $('#EsNid').css('border', '');

          alert('Phone number is blank.');
          return false;
        
        }else if(EsPhone.length > 12 || EsPhone.length < 12  ){

          $('#EsPhone').css('border', '2px solid brown');
          $('#EsFname').css('border', '');

          $('#EsNid').css('border', '');

          alert('Phone number is invalid, eg: 250787873533');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              EsFname: EsFname, 
              EsLname: EsLname,

              EsNid: EsNid,
              EsPhone: EsPhone,

              suppData: suppData,
              EsVisible: EsVisible
            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(EsFname+' has been updated');
                    window.location ="supplier.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                    alert("First name is invalid,  only letters and white space allowed");
                    $('#EsFname').css('border', '2px solid brown');

                    return false;

                
                }else if(data.trim() === 'linvalid' ){

                    alert("Last name is invalid,  only letters and white space allowed");
                    $('#EsLname').css('border', '2px solid brown');

                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });




    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#Uorder').on('click', function(){

        var Eorder = $('#Eorder').val();
        var Eprod = $('#Eprod').val();

        var Ecustomer = $('#Ecustomer').val();
        var Eqty = $('#Eqty').val();

        if(Eprod == ''){

          $('#Eprod').css('border', '2px solid brown');
          $('#Ecustomer').css('border', '');

          $('#Eqty').css('border', '');

          alert('Product is not selected.');
          return false;
        
        }else if(Ecustomer == ''){

          $('#Ecustomer').css('border', '2px solid brown');
          $('#Eprod').css('border', '');

          $('#Eqty').css('border', '');

          alert('Customer is not selected.');
          return false;
        
        }else if(Eqty == ''){

          $('#Eqty').css('border', '2px solid brown');
          $('#Eprod').css('border', '');

          $('#Ecustomer').css('border', '');

          alert('Quantity is blank.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              Eorder: Eorder, 
              Eprod: Eprod,

              Ecustomer: Ecustomer,
              Eqty: Eqty
            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Order has been updated');
                    window.location ="order.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });





    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#Uship').on('click', function(){

        var Eship = $('#Eship').val();
        var shOrder = $('#shOrder').val();

        var shLocation = $('#shLocation').val();
        var shAddress1 = $('#shAddress1').val();

        var shAddress2 = $('#shAddress2').val();
        var shVisible = $('#shVisible').val();

        if(shOrder == ''){

          $('#shOrder').css('border', '2px solid brown');
          $('#shLocation').css('border', '');

          alert('Order is not selected.');
          return false;
        
        }else if(shLocation == ''){

          $('#shLocation').css('border', '2px solid brown');
          $('#shOrder').css('border', '');

          alert('Location is not selected.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              Eship: Eship, 
              shOrder: shOrder,

              shLocation: shLocation,
              shAddress1: shAddress1,

              shAddress2: shAddress2,
              shVisible: shVisible

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Shipped order has been updated');
                    window.location ="shipping.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });



    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#Eprod').on('click', function(){

        var EprodData = $('#EprodData').val();
        var EpName = $('#EpName').val();

        var EpPrice = $('#EpPrice').val();
        var shAddress1 = $('#shAddress1').val();

        var shAddress2 = $('#shAddress2').val();
        var shVisible = $('#shVisible').val();

        if(shOrder == ''){

          $('#shOrder').css('border', '2px solid brown');
          $('#shLocation').css('border', '');

          alert('Order is not selected.');
          return false;
        
        }else if(shLocation == ''){

          $('#shLocation').css('border', '2px solid brown');
          $('#shOrder').css('border', '');

          alert('Location is not selected.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              Eship: Eship, 
              shOrder: shOrder,

              shLocation: shLocation,
              shAddress1: shAddress1,

              shAddress2: shAddress2,
              shVisible: shVisible

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Shipped order has been updated');
                    window.location ="shipping.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });





    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#Ustock').on('click', function(){

        var Estock = $('#Estock').val();
        var ETprod = $('#ETprod').val();

        var ETqty = $('#ETqty').val();
        var ETcost = $('#ETcost').val();

        if(ETprod == ''){

          $('#ETprod').css('border', '2px solid brown');
          $('#ETqty').css('border', '');

          $('#ETcost').css('border', '');

          alert('Product is not selected.');
          return false;
        
        }else if(ETqty == ''){

          $('#ETqty').css('border', '2px solid brown');
          $('#ETprod').css('border', '');

          $('#ETcost').css('border', '');

          alert('Quantity is blank.');
          return false;
        
        }else if(ETcost == ''){

          $('#ETcost').css('border', '2px solid brown');
          $('#ETprod').css('border', '');


          $('#ETqty').css('border', '');
          alert('Cost is blank.');

          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              Estock: Estock, 
              ETprod: ETprod,

              ETqty: ETqty,
              ETcost: ETcost

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Transaction has been updated');
                    window.location ="stock.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });





    ////////////////////////////////////////////////////////////////////////////////////////////


    $('#addStock').on('click', function(){

        var ATprod = $('#ATprod').val();
        var ATqty = $('#ATqty').val();

        var ATcost = $('#ATcost').val();

        if(ATprod == ''){

          $('#ATprod').css('border', '2px solid brown');
          $('#ATqty').css('border', '');

          $('#ATcost').css('border', '');
          alert('Product is not selected.');

          return false;
        
        }else if(ATqty == ''){

          $('#ATqty').css('border', '2px solid brown');
          $('#ATprod').css('border', '');

          $('#ATcost').css('border', '');
          alert('Quantity is blank.');

          return false;
        
        }else if(ATcost == ''){

          $('#ATcost').css('border', '2px solid brown');
          $('#ATprod').css('border', '');

          $('#ATqty').css('border', '');
          alert('Cost is blank.');

          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              ATprod: ATprod,
              ATqty: ATqty,
              
              ATcost: ATcost

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Transaction has been saved');
                    window.location ="stock.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });


    //////////////////////////////////////////////////////////////////////////////////////

    $('#addCtg').on('click', function(){

        var Cname = $('#Cname').val();
        var error = $('.error');

        if(Cname == ''){

          $('#Cname').css('border', '2px solid brown');
          error.text('Name is blank.')

          error.show();
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              Cname: Cname
            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(Cname+' has been registered');
                    
                    $('#categModal').modal('toggle');
                    window.location ="product.php";

                }else if(data.trim() === 'exist' ){

                    alert(Cname+' is already registered');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                  $('#Cname').css('border', '2px solid brown');
                  error.text('Name is  invalid.')

                  error.show();
                  return false;

                
                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });





    $('#search-order').keyup(function(){
      var txt = $(this).val();
      if (txt != '') {

        $('#order').html('');
        $.ajax({
          url : "read.php",
          method : "POST",
          data : {order:txt},
          dataType : "text",
          success : function(data)
          {
            $('#order').html(data);

          }

        });

      }
      else{
        $('#order').html('');
        $.ajax({
          url : "read.php",
          method : "POST",
          data : {order:txt},
          dataType : "text",
          success : function(data)
          {
            $('#order').html(data);

          }

        });
      }

    });






    $('#search-ship').keyup(function(){
      var txt = $(this).val();
      if (txt != '') {

        $('#shipping').html('');
        $.ajax({
          url : "read.php",
          method : "POST",
          data : {ship:txt},
          dataType : "text",
          success : function(data)
          {
            $('#shipping').html(data);

          }

        });

      }
      else{
        $('#shipping').html('');
        $.ajax({
          url : "read.php",
          method : "POST",
          data : {ship:txt},
          dataType : "text",
          success : function(data)
          {
            $('#shipping').html(data);

          }

        });
      }

    });





    $('#search-prod').keyup(function(){
      var txt = $(this).val();
      if (txt != ''|| txt != null || txt.length > 0  ) {

        $('#content').html('');
        $.ajax({
          url : "register.php",
          method : "POST",
          data : {find:txt},
          dataType : "text",
          success : function(data)
          {
            $('#content').html(data);

          }

        });

      }


    });



    //////////////////////////////////////////////////////////////////////////////////////

    $('#shipLocConfirm').on('click', function(){

        var shipCost = $('#shipCost').val();
        var shipLoc = $('#shipLoc').val();

        var error = $('.error');

        if(shipCost == ''){

          $('#shipCost').css('border', '2px solid brown');
          $('#shipLoc').css('border', '');

          error.text('Cost is blank.')
          error.show();

          return false;
        
        }else if(shipLoc == ''){

          $('#shipLoc').css('border', '2px solid brown');
          $('#shipCost').css('border', '');

          error.text('Location is not selected.')

          error.show();
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              shipCost: shipCost,
              shipLoc: shipLoc

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Location has been registered');
                    
                    window.location ="shipping_location.php";

                }else if(data.trim() === 'exist' ){

                    alert('Location is already registered');
                    return false;

                
                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });




    //////////////////////////////////////////////////////////////////////////////////////

    $('#EshipLocConfirm').on('click', function(){

        var EshipCost = $('#EshipCost').val();
        var EshipLoc = $('#EshipLoc').val();

        var Elocation = $('#Elocation').val();
        var error = $('.error');

        if(EshipCost == ''){

          $('#EshipCost').css('border', '2px solid brown');
          $('#EshipLoc').css('border', '');

          error.text('Cost is blank.')
          error.show();

          return false;
        
        }else if(EshipLoc == ''){

          $('#EshipLoc').css('border', '2px solid brown');
          $('#EshipCost').css('border', '');

          error.text('Location is not selected.')

          error.show();
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              EshipCost: EshipCost,
              EshipLoc: EshipLoc,

              Elocation: Elocation

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Location has been updated');
                    
                    window.location ="shipping_location.php";

                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });



    $('#registerMe').click(function(){
      $('#registerModal').modal('toggle');
    });

    $('#register').click(function(){
      $('#registerModal').modal('toggle');
    });


    $('#login').click(function(){
      $('#loginModal').modal('toggle');
    });


    $('#contact').click(function(){
      $('#contactModal').modal('toggle');
    });

    $('#contactUs').click(function(){
      $('#contactModal').modal('toggle');
    });



    $('#account').click(function(){
      $('#accountModal').modal('toggle');
    });


    $('#changeProf').click(function(){
      $('#changeProfModal').modal('toggle');

      $('#accountModal').modal('toggle');
    });


    $('#changePass').click(function(){
      $('#changePassModal').modal('toggle');

      $('#accountModal').modal('toggle');
    });









    //////////////////////////////////////////////////////////////////////////////////////

    $('#sendMessage').on('click', function(){

        var message = $('#message').val();
        var error = $('.error');

        if(message == ''){

          $('#message').css('border', '2px solid brown');
          error.text('Message is blank.')
          error.show();

          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              message: message

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Thank you for your request');
                    
                    window.location ="index.php";

                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });
    



    $('#confirm').on('click', function(){

        var fname = $('#efname').val();
        var lname = $('#elname').val();

        var phone = $('#ephone').val();
        var email = $('#Eemail').val();

        var dob = $('#edob').val();
        var gender = $('#egender').val();

        var u = $('#u').val();
        var error = $('.error');

        if(fname == ''){

          $('#efname').css('border', '2px solid brown');
          $('#ephone').css('border', '');

          $('#Eemail').css('border', '');
          $('#edob').css('border', '');

          $('#egender').css('border', '');
          error.text('First name is blank.');

          error.show();
          return false;
        
        }else if(phone == ''){

          $('#ephone').css('border', '2px solid brown');
          $('#efname').css('border', '');

          $('#Eemail').css('border', '');
          $('#edob').css('border', '');

          $('#egender').css('border', '');
                    
          error.text('Phone is blank.');

          error.show();
          return false;
   
        }else if(phone.lenght > 12 ||  phone.lenght < 12   ){

          $('#ephone').css('border', '2px solid brown');
          $('#efname').css('border', '');

          $('#Eemail').css('border', '');
          $('#edob').css('border', '');

          $('#egender').css('border', '');
                    
          error.text('Phone is invalid, Eg: 250789875533');

          error.show();
          return false;
   
        }else if(dob == ''){

          $('#edob').css('border', '2px solid brown');
          $('#efname').css('border', '');

          $('#Eemail').css('border', '');
          $('#ephone').css('border', '');

          $('#egender').css('border', '');
                    
          error.text('Date of birth is blank.');

          error.show();
          return false;
   
        }else if(gender == ''){

          $('#egender').css('border', '2px solid brown');
          $('#efname').css('border', '');

          $('#Eemail').css('border', '');
          $('#ephone').css('border', '');

          $('#edob').css('border', '');
                    
          error.text('Gender is not selected.');

          error.show();
          return false;
   
        }else{  

          $.ajax({

            url: '../guest/register.php',
            method:'post',
            
            data: { 

              fname: fname, 
              lname: lname, 

              phone: phone,
              email: email,

              dob: dob,
              gender: gender,

              u: u



            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Account has been updated');

                    
                    $('#changeProfModal').modal('toggle');

                }else if(data.trim() === 'finvalid' ){

                  $('#efname').css('border', '2px solid brown');
                  error.text('First name is  invalid.')

                  error.show();
                  return false;

                
                }else if(data.trim() === 'linvalid' ){

                  $('#elname').css('border', '2px solid brown');
                  $('#efname').css('border', '');

                  error.text('Last name is  invalid.')

                  error.show();
                  return false;

                
                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });





    $('#change').on('click', function(){

        var cpass = $('#cpass').val();
        var newpass = $('#newpass').val();
        
        var error = $('.error');

        if(cpass == ''){

          $('#cpass').css('border', '2px solid brown');
          $('#newpass').css('border', '');

          error.text('Current password is blank.');

          error.show();
          return false;
        
        }else if(newpass == ''){

          $('#newpass').css('border', '2px solid brown');
          $('#cpass').css('border', '');

          error.text('New password is blank.');

          error.show();
          return false;
        
        }else{  

          $.ajax({

            url: '../guest/register.php',
            method:'post',
            
            data: { 

              cpass: cpass, 
              newpass: newpass

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert('Password has been changed');

                    
                    $('#changePassModal').modal('toggle');

                }else if(data.trim() === 'wrong' ){

                    alert('Current password is wrong');
                    $('#cpass').css('border', '2px solid brown');


                }else{

                    alert(data);
                    return false;

                } 

            }

          });   

        }

    });




        ////////////////////////////////////////////////////////////////////////////////////////////


    $('#addUser').on('click', function(){

        var EditFname = $('#EditFname').val();
        var username = $("#username").val();

        var EditLoc1 = $('#EditLoc1').val();
        var EditPhone = $('#EditPhone').val();

        var EditEmail = $('#EditEmail').val();

        if(EditFname == ''){

          $('#EditFname').css('border', '2px solid brown');

          $('#EditPhone').css('border', '');
          $('#EditEmail').css('border', '');

          alert('Name is required.');
          return false;
        
        }else if(EditPhone == ''){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');
          
          alert('Phone number is required.');
          return false;
        
        }else if(EditPhone.length > 12 || EditPhone.length < 12 ){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');

          alert('Phone number is invalid, Eg: 250789875533');
          return false;
        
        }else if(EditEmail == ''){

          $('#EditEmail').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditPhone').css('border', '');
          
          alert('Email is blank.');
          return false;
        
        }else if(username == ''){

          $('#username').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditPhone').css('border', '');
          $('#EditEmail').css('border', '');
          
          alert('Username is blank.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              username: username, 
              EditFname: EditFname,

              EditPhone: EditPhone,
              EditEmail: EditEmail,

              EditLoc1: EditLoc1

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(EditFname+' has been added');
                    window.location ="index.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                    alert("Name is invalid,  only letters and white space allowed");
                    $('#EditFname').css('border', '2px solid brown');

                    return false;

                
                }else if(data.trim() === 'exist' ){

                    alert(username+" is taken");
                    $('#username').css('border', '2px solid brown');

                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });





        ////////////////////////////////////////////////////////////////////////////////////////////


    $('#addFinance').on('click', function(){

        var EditFname = $('#EditFname').val();
        var username = $("#username").val();

        var EditLoc1 = $('#EditLoc1').val();
        var EditPhone = $('#EditPhone').val();

        var EditEmail = $('#EditEmail').val();

        if(EditFname == ''){

          $('#EditFname').css('border', '2px solid brown');

          $('#EditPhone').css('border', '');
          $('#EditEmail').css('border', '');

          alert('Name is required.');
          return false;
        
        }else if(EditPhone == ''){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');
          
          alert('Phone number is required.');
          return false;
        
        }else if(EditPhone.length > 12 || EditPhone.length < 12 ){

          $('#EditPhone').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditEmail').css('border', '');

          alert('Phone number is invalid, Eg: 250789875533');
          return false;
        
        }else if(EditEmail == ''){

          $('#EditEmail').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditPhone').css('border', '');
          
          alert('Email is blank.');
          return false;
        
        }else if(username == ''){

          $('#username').css('border', '2px solid brown');
          $('#EditFname').css('border', '');

          $('#EditPhone').css('border', '');
          $('#EditEmail').css('border', '');
          
          alert('Username is blank.');
          return false;
        
        }else{  

          $.ajax({

            url: './register.php',
            method:'post',
            
            data: { 

              username: username, 
              EditFname: EditFname,

              EditPhone: EditPhone,
              EditEmail: EditEmail,

              EditLoc1: EditLoc1

            },

            success: function(data){

                if(data.trim() === 'ok' ){

                    alert(EditFname+' has been added');
                    window.location ="index.php";

                }

                else if(data.trim() === 'failed' ){

                    alert('Process failed');
                    return false;

                
                }else if(data.trim() === 'finvalid' ){

                    alert("Name is invalid,  only letters and white space allowed");
                    $('#EditFname').css('border', '2px solid brown');

                    return false;

                
                }else if(data.trim() === 'exist' ){

                    alert(username+" is taken");
                    $('#username').css('border', '2px solid brown');

                    return false;

                
                }else{

                    alert(data);
                    return false;

                }



            }

          });   

        }

    });


});



</script>
