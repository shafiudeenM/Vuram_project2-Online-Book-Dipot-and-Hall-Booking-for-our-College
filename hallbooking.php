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

    
     <div class=container   style="float: right;" >

     <h1 id="header" > HALL BOOKING </h1>


        


<?php






      if(isset($_POST["submit"]))
              {

                $record1 = $_POST["Hall"];
               $record = $_POST["Session"];
  


                $query = mysqli_query($db, "SELECT * FROM hall  WHERE HALL = '".$record1. "' AND SESSION= '".$record. "'  ");
if(mysqli_num_rows($query) > 0){
    echo "<div class='error'> CHANGE HALL or SESSION </div>";
}
else{
  $sql="INSERT INTO hall( HALL, UID, SESSION, COUNT, DEPARTMENT, PURPOSE, TIME,STATUS,ETIME,DELETS,UNAME)
  values('{$_POST["Hall"]}',{$_SESSION["ID"]},'{$_POST["Session"]}','{$_POST["Count"]}','{$_POST["Dep"]}','{$_POST["Purpose"]}',now(),'sended',NOW() + INTERVAL 5 MINUTE,'DELETE?','{$_SESSION["NAME"]}')";
 
    if ($db->query($sql) === TRUE) {
      echo "<div class='sucess'> BOOKED </div>";
    } 
  }
}








 
  
 
?>





         <form action="hallbooking.php" method="post">

          <div >                
             <ul>
           <li style = "margin-right:80%;margin-top: 50px;list-style: none;">
             <select  name="Dep"  class="form-control rounded-pill form-control-lg" required>
             <option value="">Department</option>
             <option value="CIVIL">CIVIL</option>
             <option value="MECH">MECH</option>
             <option value="EEE">EEE</option>
             <option value="ECE">ECE</option>
             <option value="CSE">CSE </option> 
             </select>
             </li>

             <li style = "margin-right:80%;margin-top: 20px;list-style: none;" >
          
              <select   name="Hall"  class="form-control rounded-pill form-control-lg" required>
              <option value=""> Hall</option>
             <option value="MECH SEMINAR HALL">MECH SEMINAR HALL</option>
             <option value="ELECTRICAL SEMINAR HALL">ELECTRICAL SEMINAR HALL</option>
             <option value="NEW SEMINAR HALL">NEW SEMINAR HALL</option>
             <option value="NPT SEMINAR HALL">NPT SEMINAR HALL 1</option>  
             <option value="NPT SEMINAR HALL">NPT SEMINAR HALL 12</option>
         </select>
         </li>

         <li style = "margin-right:80%;margin-top: 20px;list-style: none;">    
         <select   name="Count"  class="form-control rounded-pill form-control-lg" required>
         <option value="">Count</option>
             <option value="50+">50+</option>
             <option value="100+">100+</option>
             <option value="150+">150+</option>
             <option value="200+">200+</option>
         </select>
         </li>

         <li style = "margin-right:80%;margin-top: 20px;list-style: none;">    
         <select   name="Session"  class="form-control rounded-pill form-control-lg" required>
         <option value="">Session</option>
             <option value="10am-1pm">10am-1pm</option>
             <option value="2:00am-4:30am">2:00am-4:30am</option>
         </select>
         </li>
             

         <li style = "margin-right:50%;margin-top: 20px;list-style: none;">
           <textarea class="form-control" placeholder="Purpose" name="Purpose"  rows="3"></textarea>
         
         </li>
        
       
         </ul>
         </div>
        
         <div class="text-center">
         <button  style = "margin-right:90%; margin-top:20px;"type="submit"   id= "reg" name="submit">BOOK </button>
         </div>

         </form>

     
       
    </div>
 
     
    <div class="wrapper">
        
       <?php include "usersidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  </body>
</html>