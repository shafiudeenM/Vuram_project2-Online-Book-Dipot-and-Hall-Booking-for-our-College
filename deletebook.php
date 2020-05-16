<?php 

$O="{$_GET["i"]}";

        Include "db.php";
        $date2= null;

             
             $sql="DELETE FROM hall
             where HID= $O ";
            $db->query($sql);
            

            
?>






<?php

INCLUDE "db.php";
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
    <a href =""  ><button type="button"  style="margin-right: 10px;"  class="btn btn-success"><?php echo $_SESSION["NAME"]?></button></a>
    
    <a href ="logout.php"   ><button type="button"  id="but"  class="btn btn-secondary">LOGOUT</button></a>
    </div>

    </nav>

    
    <div class=container style="float: right;" >
        <h1 id="header" >VIEW ORDERS</h1>

       
 
     
     <?php
         $sql= "  select hall.HID,hall.HALL,hall.ETIME,hall.HID,hall.SESSION,hall.STATUS,hall.COUNT,hall.DEPARTMENT,hall.PURPOSE,hall.ETIME,hall.DELETS,
         hall.TIME,user.UNAME from hall inner join user on hall.UID=user.UID";
          $res=$db->query($sql);

          if($res->num_rows>0)
          {

              echo "<table>
              <tr>
              <th>S.No</th>
              <th>Name</th>
              
              <th>Department</th>
              <th>Year</th>
              
              <th>Requirements</th>
              
              <th>Quantity</th>
              
              <th>Time</th>
              <th>Status</th>
              <th>DELETE</th>
              
              
              </tr>";
              $i=0;
              while($row= $res->fetch_assoc())
              {
                     $i++;
                     echo"<tr>";
                     echo "<td>{$i}</td>";
                     
                     echo "<td>{$row["UNAME"]}</td>";
                     echo "<td>{$row["DEPARTMENT"]}</td>";
                     echo "<td>{$row["SESSION"]}</td>";
                     
                     echo "<td>{$row["COUNT"]}</td>";
                     echo "<td>{$row["PURPOSE"]}</td>";
  
                     echo "<td>{$row["TIME"]}</td>";
                     echo "<td>{$row["STATUS"]}</td>";
                     
                     
                     
                     date_default_timezone_set("Asia/Calcutta");
                       $date_now = date("Y-m-d H:i:s"); // this format is string comparable
                       
                    if ($date_now > $row["ETIME"]) {
                      $a= 'TIME OVER';
                     echo "<td>$a</td>";
                     
                    }
                     else{
                     
                      echo "<td><a href='deletebook.php?i={$row["HID"]}'>{$row["DELETS"]}</a></td>";
                      }
                     echo "</tr>";
              }
             echo" </table>";

          }
          else{
              echo "<p class='sucess' > Bookimg Deleted Sucessfully</p>";
          }
          ?>
          
     

     
     
    </div>




    <div class="wrapper">
        
    <?php include "usersidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  

    



    </body>
</html>