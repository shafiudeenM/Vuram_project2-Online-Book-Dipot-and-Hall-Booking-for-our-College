<?php 
     
     Include"db.php";

         $O="{$_GET["i"]}";
          
          $sql="update suggestion
          SET STATUS = 'Thank you',ASTATUS='Replied',DELETS= null 
          where SUID= $O ";
         
         

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
         $sql= "select user.UNAME,suggestion.SUID,suggestion.SERVICE,suggestion.ASTATUS,
         suggestion.CONTENT,suggestion.TIME,suggestion.STATUS,suggestion.ETIME,suggestion.DELETS
          from suggestion inner join user on suggestion.UID=user.UID";
          $res=$db->query($sql);

          if($res->num_rows>0)
          {

              echo "<table>
              <tr>
              <th>S.No</th>
              <th>Name</th>
              
              <th>Service</th>
              <th>Content</th>
              
              <th>Time</th>
              
              <th>Status</th>
              
             
              </tr>";
              $i=0;
              while($row= $res->fetch_assoc())
              {
                     $i++;
                     echo"<tr>";
                     echo "<td>{$i}</td>";
                     
                     echo "<td>{$row["UNAME"]}</td>";
                     echo "<td>{$row["SERVICE"]}</td>";
                     echo "<td>{$row["CONTENT"]}</td>";
                     
                     echo "<td>{$row["TIME"]}</td>";
                     echo "<td><a href='suggestionyes.php?i={$row["SUID"]}'> {$row["ASTATUS"]}</a></td>";
  
                     
                     
                     
                     
                     echo "</tr>";
              }
             echo" </table>";

          }
          else{
              echo "<p class='error' >no student records found</p>";
          }?>

     
     
    </div>




    <div class="wrapper">
        
    <?php include "adminsidebar.php"; ?>
       
    </div>

    
    <div class="container" id="footer" >
      <?php include "footer.php"; ?>
    </div>

  

    



    </body>
</html>