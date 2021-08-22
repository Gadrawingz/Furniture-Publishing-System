<?php
    
if(isset($_POST['add2cart']) && isset($_GET['id'])){

    $prod = prodData(($_GET['id'])); 

  if(isset($_SESSION['cart'])){

    $item_array_id = array_column($_SESSION['cart'] , 'product_id');

    if(!in_array($prod->tbl_productId, $item_array_id)){

      $count = count($_SESSION['cart']);
      $item_array = array(
       'product_id' => ($prod->tbl_productId),
       'item_name'  => ($prod->tbl_productName),

       'product_price' => ($prod->tbl_productPrice),
       'item_quantity' => ($_POST['quantity'])
      );

      $_SESSION['cart'][$count] = $item_array;

      echo '<script> alert("Furniture has been added ")</script>';
      echo '<script>window.location= "index.php?view_cart"</script>'; 
      exit();
    
    } else {
      echo '<script> alert("Furrniture is already added ")</script>';
      echo '<script>window.location="index.php?view_cart"</script>';

      exit();
    
    }

  }else{

    $item_array = array(
       'product_id' => ($prod->tbl_productId),
       'item_name'  => ($prod->tbl_productName),

       'product_price' => ($prod->tbl_productPrice),
       'item_quantity' => ($_POST['quantity'])
    );
    $_SESSION['cart'][0] = $item_array;
  }

}

if(isset($_GET['action']) &&  isset($_GET['id']) ){

  if($_GET['action'] == 'delete'){

    $prod = prodData(($_GET['id'])); 

    foreach($_SESSION['cart'] as $keys => $value){

    if($value['product_id'] == ($prod->tbl_productId)){

     unset($_SESSION['cart'][$keys]);

     echo '<script> alert("Product has been removed"); </script>';
     echo '<script>window.location="index.php?view_cart"</script>';

    }

   }
  }
}


//insert data in databse
if(isset($_GET['action'])){
  if($_GET['action'] == 'confirm'){

    //check if cart is set
    if(!isset($_SESSION['cart'])){ 

     echo '<script> alert("Please add product to cart"); </script>'; 
     echo '<script>window.location="index.php?view_cart"</script>';
    }
  
    foreach($_SESSION['cart'] as $value){
      
      $date = date("Y/m/d");

      //check if quantities needed in the order are in db
      $Product = prodData($value['product_id']);

      if($Product->tbl_productQty < $value['item_quantity']){

        echo '<script> alert("Quantity is greater than what we have"); </script>';
        unset($_SESSION['cart']);
      
      }else{

          $str = "1234567890";
          $str = str_shuffle($str);

          //generate company code
          $code = substr($str, 0,10);

          add_new_sold_products( $value['product_id'], $_SESSION['custId'],  $value['product_price'],  $value['item_quantity'], $date, $code );

          update_product( number_format($Product->tbl_productQty - $value['item_quantity']), $value['product_id']);

          echo '<script> alert("Order has been successfully set"); </script>';

          unset($_SESSION['cart']);
          echo '<script>window.location= "index.php?view_order"</script>'; 

      }

    }
  
  }
}


?>