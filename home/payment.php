<?php  
  if ($_GET['add_payment']){
    $info = orderData($_GET['add_payment']);   
    if(!isset($info)){
      exit('<h1 class="text-danger"> Wrong Operation</h1>');
    }    

    $product = prodData($info->tbl_productId);  

    if(isset($_POST['pay'])) {      
      $method = ($_POST['method']);
      $status = 0; 
      $currentDate = date("Y-m-d");

      $order = $info->tbl_orderId;
      @$target_dir = "../img/";

      $file = basename($_FILES["slip"]["name"]);
      @$target_file = $target_dir . basename($_FILES["slip"]["name"]);

      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      $curentStatus = 1;

      if((strtolower($imageFileType)!= 'jpg') && (strtolower($imageFileType)!='png') && (strtolower($imageFileType)!='jpeg')){
        echo '<script> alert("Only use JPG, JPEG or PNG!")</script>';
        echo '<script>window.location= "index.php?add_payment='.urlencode($order).'"></script>'; 
        exit();        
      }
      
      $sql = $con->prepare("SELECT * FROM tbl_paid_order WHERE (tbl_orderId = ?) AND (tbl_paid_orderStatus = ?) " );
      $sql->bindParam(1, $order);
      $sql->bindParam(2, $curentStatus);

      $sql->execute();
      if($sql->rowCount() > 0){
        echo '<script> alert("Order is already paid")</script>';
        echo '<script>window.location= "index.php?add_payment='.urlencode($order).'"</script>'; 
        exit();

      } else {
        $date = date('Y-m-d');
        $sql = $con->prepare("INSERT INTO tbl_paid_order(tbl_paymentId, tbl_orderId, tbl_paid_orderSlip, tbl_paid_orderStatus, tbl_paid_orderDate) VALUES (?,?, ?,?,?)");

        $sql->bindParam(1, $method);
        $sql->bindParam(2, $order);
        $sql->bindParam(3, $file);
        $sql->bindParam(4, $status);
        $sql->bindParam(5, $currentDate);

        if($sql->execute()){

          //move file to the server
          move_uploaded_file($_FILES["slip"]["tmp_name"], $target_file);
          echo '<script> alert(" Your payment slip is sent to IPRC South Finance for confirmation")</script>';


          // Send message to customer!
          require_once'../connect/pdoquery.php';
          $obj3 = new FurnitureQuery;

          $stmt4= $obj3->customerData($_SESSION['custId']);
          $pyrow= $stmt4->FETCH(PDO::FETCH_ASSOC);
          $cNames= $pyrow['tbl_customerFname']." ".$pyrow['tbl_customerLname'];
          $cPhone= $pyrow['tbl_customerTel'];
          
          $obj3->sendMessageForPayment($cPhone, $cNames, $currentDate);
          //exit();

          echo '<script>window.location= "index.php?view_order"</script>';
        }
        else{ 
          echo '<script> alert("Process failed")</script>';
          echo '<script>window.location= "index.php?view_order"</script>'; 
          exit();
        }
      } 
    }}
    ?>