<?php

include "db.php";
session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo"<script>window.open('login.php?mes=Access Denied...','_self');</script>";
		
  }
  
  


?>



<html>
    <head>
        <title>MCET</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="css/style.css">


    </head>
    <body>
             
      <nav class="navbar navbar-light bg-light">
     <a class="navbar-brand" href="#">
      <img src="images/m.png" width="130" height="50"  style="margin-left: 25px;"  class="d-inline-block align-top" alt="">
     
     </a>
     <div >  
     <a href =""   ><button type="button"  style="margin-right: 10px;"  class="btn btn-success"><?php echo $_SESSION["NAME"];?></button></a>
    
     <a href ="logout.php"   ><button type="button"  id="but"  class="btn btn-secondary">LOGOUT</button></a>
     </div>

     </nav>

     <div class="text-center">

     <div class=container   style="float: right;" >
    
     <h1 id="header" ><?php echo "Welcome"." ". $_SESSION["NAME"];?> </h1>
         <div class="card" style="margin-left:150px;width: 35rem; height:8px">
  <img src="images/front.jpg" class="card-img-top" alt="...">
  <div class="card text-center">
  <div class="card-header">
  Online Book Dipot & Hall Booking System
  </div>
  <div class="card-body">
    <h5 class="card-title">Information</h5>
    <p class="card-text">Can't Delete order once admin approved (or) Time Expired(+5 min)</p>
    <p class="card-text">Except your suggestion other details will not share to other users</p>
    <p class="card-text">Hall will be allocate according to the availability</p>
   
  </div>
  </div>     
</div>
    </div>
 
     
    <div class="wrapper">
        
       <?php include "usersidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  </body>
</html>