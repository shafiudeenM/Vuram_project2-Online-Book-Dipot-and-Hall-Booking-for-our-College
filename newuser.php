<?php

include "db.php";
session_start();
	if(!isset($_SESSION["AID"]))
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
     <a href =""  ><button type="button"  style="margin-right: 10px;"  class="btn btn-success"><?php echo $_SESSION["ANAME"]?></button></a>
    
    <a href ="logout.php"   ><button type="button"  id="but"  class="btn btn-secondary">LOGOUT</button></a>
    </div>

    </nav>



    <?php
             if(isset($_POST["submit"]))
             {
                $sql="insert into user(UNAME,UPASS)
                 values('{$_POST["name"]}','{$_POST["pass"]}')";

                 if($db->query($sql))
                 {
                      echo "<div class='sucess'> Added </div>";
                 }
                 else
                 {
                     echo "<div class='error'> Unable to Add</div>";
                 }
             }
    
    
    
    ?>

    
    <div class=container style="float: right;" >
        <h1 id="header" >New User </h1>
        <form action="newuser.php"  method="post">

        <div id="nu">           
            <ul>

            <li>
         <input type="text" class="form-control rounded-pill form-control-lg"  name="name"placeholder="New Usernmae" required>
         </li>

         <li>
         <input type="text" class="form-control rounded-pill form-control-lg"  name="pass"placeholder="New password" required>
         </li>
</ul>
<div class="text-center">
         <button type="submit"   id= "reg" name="submit">ADD</button>
         </div>
 
         </div>


        </form>

        
 
     
     
     </div>
    <div class="wrapper">
        
       <?php include "adminsidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  

    



    </body>
</html>