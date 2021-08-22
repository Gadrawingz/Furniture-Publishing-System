<?php  
  session_start();  
  session_destroy();
  echo "<script>window.location='home/signin.php?customer'</script>";

?>

  
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <meta http-equiv="refresh" content="1; url=./home/"/>
  </head>
  <body>

    <img src="../img/loading29.gif" class="img-load" alt="" />

<style type="text/css">
  body { background: #ff099; }
  .img-load {
    position: fixed;
    top: 0px;
    bottom: 0px;
    right: 0px;
    left: 0px;
    margin: auto;
    width: 41px;
  }
</style>
  </body>
</html>
