<?php
session_start();
{
    $_SESSION["id"]=null;
    $_SESSION["pid"]=null;
    
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
    include '../Shared/Assets/links.php';
    ?>
  </head>  
  
  <body class="size-1140">
  	<!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <?php
  if(empty($_SESSION["id"]))
  {
     include '../Shared/header.php';
  }
  else
  {
    include '../Shared/header1.php';
  }
?>
      
    </header>
    
    <!-- MAIN -->
    <main role="main">
    <h1>You had successfully logged out!!!</h1>
    </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>