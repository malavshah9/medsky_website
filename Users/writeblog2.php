
<!DOCTYPE html>
<html lang="en-US">
  <head>
  <?php
  session_start();
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
    <?php
    $btitle=$_POST["btitle"];
    $blogdescription=$_POST["editor1"];
    include '../Shared/Classes/classblog.php';
    $conn=new blogs();
    $did=$_SESSION["id"];
    date_default_timezone_set('Asia/Kolkata');
$timestamp = time();
$date_time = date("d-m-Y (D) H:i:s", $timestamp);
$result=$conn->getspecialist($did);
$row=$result->fetch_assoc();
$specid=$row["fk_spec_id"];
$f=0;
    $result=$conn->insert($btitle,$blogdescription,$did,$date_time,$specid);
    if($result==true)
    {
        echo '<h1>Blog Successfully Posted!!!</h1>';
        $f=1;
    }
    else
    {
        echo '<h1>Blog Can`t Successfully Posted!!!</h1>';
        $f=0;
    }
    
    ?>
    
    <div class="margin">
                      <div class="s-12 m-12 l-6">
                        <h2><tr><td></td><td colspan="2"><a href="writeblog1.php" class="submit-form button background-primary border-radius text-white">Click Here to Post another Blog.</a></td></tr></h2>
                      </div>
                    </div>
    </main>
    
    <!-- FOOTER -->
    <?php
            include '../Shared/indexfooter.php';
      ?>
   </body>
</html>