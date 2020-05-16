<?php 
     
     Include"db.php";

         $O="{$_GET["i"]}";
          
          $sql="update dipot
          SET STATUS = 'Received',ASTATUS='Delivered',DELETS= null 
          where OID= $O ";
         
         

          $db->query($sql);  
               
?>
<?php

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

    
    <div class=container style="float: right;" >
        <h1 id="header" > VIEW ORDERS</h1>

        
 
     
     <?php
         $sql= " select user.UNAME,dipot.OID, dipot.DEPARTMENT,dipot.REQUIREMENT,dipot.YEAR,dipot.ASTATUS,dipot.QUANTITY,dipot.TIME FROM 
          dipot inner join user on dipot.UID=user.UID";
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
              <th>AStatus</th>
              </tr>";
              $i=0;
              while($row= $res->fetch_assoc())
              {
                $i++;
                echo"<tr>";
                echo "<td>{$i}</td>";
                
                echo "<td>{$row["UNAME"]}</td>";
                echo "<td>{$row["DEPARTMENT"]}</td>";
                echo "<td>{$row["YEAR"]}</td>";
                
                echo "<td>{$row["REQUIREMENT"]}</td>";
                echo "<td>{$row["QUANTITY"]}</td>";

                echo "<td>{$row["TIME"]}</td>";
                
                echo "<td><a href='validation.php?i={$row["OID"]}'  >{$row["ASTATUS"]} </a></td>";
               
                //echo  "<td><a href='validation.php?i={$row["OID"]}'>{$row['STATUS']}</a></td>";
               // echo  "<td><a href='validation.php'>{$row["ASTATUS"]}</a></td>";
                echo "</tr>";
                    
                    // echo  "<td><a href='validation.php'>{$row["ASTATUS"]}</a></td>";
                     echo "</tr>";
              }
             echo" </table>";

          }
          else{
              echo "<p class='error' >no student records found</p>";
          }
          ?>

     
     
    </div>




    <div class="wrapper">
        
    <?php include "adminsidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  

    



    </body>
</html>