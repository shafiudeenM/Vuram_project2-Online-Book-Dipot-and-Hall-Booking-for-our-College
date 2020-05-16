<h1 id="header" > DIPOT </h1>


        


<?php
      if(isset($_POST["submit"]))
      {
        
            $sql="insert into dipot (DEPARTMENT, REQUIREMENT, YEAR, QUANTITY, TIME,UID,STATUS,ASTATUS,ETIME,DELETS,UNAME)
            values('{$_POST["Dep"]}','{$_POST["Req"]}','{$_POST["Year"]}','{$_POST["quantity"]}',now(),{$_SESSION["ID"]},'sended','New Order',NOW() + INTERVAL 5 MINUTE,'DELETE?','{$_SESSION["NAME"]}')";
            
           if($db->query($sql))
           
            {
                echo "<p class='sucess' >ORDERED</p>";
             }
           else{
            echo "<p class='error' >DATABASE FAILURE</p>";
           }

      
      
       }
       
       ?>

         <form action="dipotorder.php" method="post">

         <div id="main">                
             <ul>
           <li>
             <select  name="Dep"  class="form-control rounded-pill form-control-lg" required>
             <option value="">Select</option>
             <option value="CIVIL">CIVIL</option>
             <option value="MECH">MECH</option>
             <option value="EEE">EEE</option>
             <option value="ECE">ECE</option>
             <option value="CSE">CSE </option> 
             </select>
             </li>

             <li>
          
              <select   name="Req"  class="form-control rounded-pill form-control-lg" required>
              <option value="">Select</option>
             <option value="PS">PS Books</option>
             <option value="Records">Record Note</option>
             <option value="Graph">Graph sheets</option>
             <option value="File">File</option>
         </select>
         </li>

         <li>    
         <select   name="Year"  class="form-control rounded-pill form-control-lg" required>
         <option value="">Select</option>
             <option value="I">I-1</option>
             <option value="I">I-2</option>
             <option value="II">II-3</option>
             <option value="II">II-4</option>
             <option value="III-5">III-5</option>
             <option value="III-6">III-6</option>
             <option value="IV-7">IV-7</option>
             <option value="IV-8">IV-8 </option>
         </select>
         </li>
             

         <li>
         <input type="text" class="form-control rounded-pill form-control-lg"  name="quantity"placeholder="Quantity" required>
         </li>
        
       
         </ul>
         </div>
        
         <div class="text-center">
         <button type="submit"   id= "reg" name="submit">BOOK NOW</button>
         </div>

         </form>
