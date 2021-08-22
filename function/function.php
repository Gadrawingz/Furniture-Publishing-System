<?php

  function modelData($model){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_model  WHERE  tbl_modelId= ?  LIMIT 1");
    $data->bindParam(1, $model);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }
  

  function prodData($product){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_product  WHERE  tbl_productId= ?  LIMIT 1");
    $data->bindParam(1, $product);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }
  

  function productView($prod) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_picture WHERE  tbl_productId =? ORDER BY tbl_pictureId DESC ");

    $data->bindParam(1, $prod);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function roleName($name){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_role WHERE  tbl_roleName =?  LIMIT 1");
    $data->bindParam(1, $name);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }


  function roleData($role){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_role  WHERE  tbl_roleId= ?  LIMIT 1");
    $data->bindParam(1, $role);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }



  function checkPaidOrderData($order, $status){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_paid_order WHERE  (tbl_orderId = ?) AND (tbl_paid_orderStatus = ?)  LIMIT 1");
    $data->bindParam(1, $order);
    $data->bindParam(2, $status);

    $data->execute();    
    return $data->rowCount();

  }


  function paymentMethod($status) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_payment  WHERE tbl_paymentStatus =? ORDER BY tbl_paymentId DESC ");

    $data->bindParam(1, $status);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;
  }

  function onePaymentMethod($payId) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_payment WHERE tbl_paymentId ='$payId' ");
    $data->execute();   
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;
  }










  function loadPaidOrder() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_paid_order ORDER BY tbl_paid_orderId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }

  function loadPaidOrderReport($from, $to) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_paid_order WHERE  (tbl_paid_orderDate BETWEEN ? AND  ?  ) ORDER BY tbl_paid_orderId DESC ");

    $data->bindParam(1, $from);
    $data->bindParam(2, $to);

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }


  function paymentOrderData($payId){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_paid_order  WHERE  tbl_paid_orderId = ?  LIMIT 1");
    $data->bindParam(1, $payId);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }

  //end of in use



  function prodCateg($status) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_category WHERE tbl_categoryStatus = ? ORDER BY tbl_categoryName ASC ");

    $data->bindParam(1, $status);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }

    function prodModel($status) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_model WHERE tbl_modelStatus = ? ORDER BY tbl_modelName ASC ");

    $data->bindParam(1, $status);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function product() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_product ORDER BY tbl_productId DESC ");
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function productForCateg($catg) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_product WHERE tbl_categoryId =?  ORDER BY tbl_productId DESC ");

    $data->bindParam(1, $catg);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function order($customer) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_order WHERE tbl_customerId =?  ORDER BY tbl_orderId DESC ");

    $data->bindParam(1, $customer);
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function viewOrderStaff() {

    global $con;
    $data = $con->prepare("SELECT * FROM `tbl_paid_order` WHERE `tbl_paid_orderStatus`='0' ");
    $data->execute();
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function loadOrder() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_order ORDER BY tbl_orderId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }


  function searchOrder($order) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_order WHERE tbl_orderToken = ?   ORDER BY tbl_orderId DESC LIMIT 1 ");
    
    $data->bindParam(1, $order); 
    $data->execute();

    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }







  function user() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_admin  ORDER BY tbl_adminId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }


  function hod() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_hod  ORDER BY tbl_hodId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }


  function finance() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_finance  ORDER BY tbl_financeId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }


  function customer() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_customer  ORDER BY tbl_customerId DESC ");

    $data->execute();       
    $res = $data->fetchAll(PDO::FETCH_OBJ);

    return $res;

  }




  function orderData($order){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_order  WHERE  tbl_orderId = ?  LIMIT 1");
    $data->bindParam(1, $order);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }






  function category($categ){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_category  WHERE  tbl_categoryId = ?  LIMIT 1");
    $data->bindParam(1, $categ);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }





  function add_new_sold_products($prodId, $customerId, $amount, $qty, $date, $code ){

    global $con;
    $stmt = $con->prepare("INSERT INTO tbl_order ( tbl_customerId, tbl_productId, tbl_orderDate, tbl_orderQty, tbl_orderAmt, tbl_orderStatus) VALUES(?,?,?, ?,?,?) ");

    $status = 1;
    $stmt->bindParam(1, $customerId);
    $stmt->bindParam(2, $prodId  );

    $stmt->bindParam(3, $date );
    $stmt->bindParam(4, $qty);

    $stmt->bindParam(5, $amount);
    $stmt->bindParam(6, $status);


    if( $stmt->execute() ){
      return true;
    }else{

      return  false;
    }

  }


  function update_product($soldQty, $proId){

    global $con;
    $stmt = $con->prepare("UPDATE tbl_product  SET tbl_productQty = ? WHERE  tbl_productId = ? ");
    
    $stmt->bindParam(1, $soldQty);
    $stmt->bindParam(2, $proId);

    if(  $stmt->execute()){
      return true;
    }else{
      return false;
    }
  }



  function checkShipOrderData($order){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_shipping  WHERE  tbl_orderId = ?  LIMIT 1");
    $data->bindParam(1, $order);
    $data->execute();
        
    //if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $data->rowCount();
    //}

  }


  function userData($user){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_admin  WHERE  tbl_adminId = ?  LIMIT 1");
    $data->bindParam(1, $user);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }

  function HodData($hod){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_hod  WHERE tbl_hodId = ?  LIMIT 1");
    $data->bindParam(1, $hod);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }



  function financeData($finance){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_finance  WHERE  tbl_financeId = ?  LIMIT 1");
    $data->bindParam(1, $finance);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }



  function customerData($customer){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_customer  WHERE  tbl_customerId = ?  LIMIT 1");
    $data->bindParam(1, $customer);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }





  function Role() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_role ORDER BY tbl_roleId DESC ");
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }








  function stock() {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_stock ORDER BY tbl_stockId DESC ");
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }


  function stockData($trans){

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_stock  WHERE  tbl_stockId = ?  LIMIT 1");
    $data->bindParam(1, $trans);
    $data->execute();
        
    if ($res = $data->fetch(PDO::FETCH_OBJ)) {
      return $res;
    }

  }





  function findMe($search) {

    global $con;
    $data = $con->prepare("SELECT * FROM tbl_product WHERE tbl_productName LIKE '%".$search."%' ORDER BY tbl_productId DESC ");
    $data->execute();
       
    $res = $data->fetchAll(PDO::FETCH_OBJ);
    return $res;

  }

