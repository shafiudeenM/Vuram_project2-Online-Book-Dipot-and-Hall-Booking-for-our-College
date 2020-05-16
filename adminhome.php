<?php

include "db.php";
session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('login.php?mes=Access Denied...','_self');</script>";
		
  }
  function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows; 
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
     <a href =""  ><button type="button"  style="margin-right: 10px;"  class="btn btn-success"><?php echo $_SESSION["ANAME"]?></button></a>
    
    <a href ="logout.php"   ><button type="button"  id="but"  class="btn btn-secondary">LOGOUT</button></a>
    </div>

    </nav>

    
    <div class=container style="float: right;" >
        <h1 id="header" >Welcome Admin </h1>
        



     
     
     <div class="container " id="top" >
         <div class="row" style="margin-top: 36px;">
             <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 110px;border-radius: 50%;width: 200px;height: 150px;background:orange">
                    <div class="card-body">
                    <div class="text-center">
                      <h5 class="card-title "style="margin-top:15px">HALL ORDER</h5>
                      
                      <a href="hallorders.php" class="btn btn-success"><?php echo countRecord("select * from hall",$db);?></a>
                      </div>
                    </div>
                  </div>
             </div>

             <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 110px;border-radius: 50%;width: 200px;height: 150px;background:orange;">
                    <div class="card-body">
                    <div class="text-center" >
                      <h5 class="card-title "style="margin-top:15px">DIPOT ORDERS</h5>
                      <a href="order.php"  class="btn btn-success" ><?php echo countRecord("select * from dipot",$db);?></a>
                    </div>
                    </div>
                  </div>
             </div>

             <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 110px;border-radius: 50%;width: 200px;height: 150px;background:orange;">
                    <div class="card-body">
                    <div class="text-center">
                      <h5 class="card-title"style="margin-top:15px">SUGGESTION</h5>
                      <a href="usuggestion.php" class="btn btn-success"><?php echo countRecord("select * from suggestion",$db);?></a>
                    </div>
                    </div>
                  </div>
             </div>

             
             <div class="col-md-3">
                <div class="card" style="width: 16rem; height: 110px;border-radius: 50%;width: 200px;height: 150px;background:orange;">
                    <div class="card-body">
                    <div class="text-center" >
                      <h5 class="card-title "style="margin-top:15px">USERS</h5>
                      <a href="newuser.php"  class="btn btn-success" ><?php echo countRecord("select * from user",$db);?></a>
                    </div>
                    </div>
                  </div>
             </div>
         </div>
     </div>
    </div>
    <div class="wrapper">
        
       <?php include "adminsidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  

    



    </body>
</html>