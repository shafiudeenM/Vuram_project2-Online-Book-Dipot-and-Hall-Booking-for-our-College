<?php
include "db.php ";
session_start();

?>
<!doctype html>
<html>
    <head>
        <title>Login and Registration</title>
        <link rel="stylesheet"  href="css/style.css">
    </head>
    <body>
        <div class="hero">
            
            
            <div class ="form-box">
              
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Admin</button>
                    <button type="button" class="toggle-btn" onclick="register()"> User</button>
                
                </div>
                <div>

                </div>
                <?php
                if(isset($_POST["ALOGIN"]))
                {
                   $sql= "select * from admin where ANAME='{$_POST["aname"]}' 
                     and APASS='{$_POST["apass"]}'";
                     $res=$db->query($sql);
                     if ($res->num_rows>0)
                     {
                         $ro=$res->fetch_assoc();
                         $_SESSION["AID"]=$ro["AID"];
                         
                         $_SESSION["ANAME"]=$ro["ANAME"];
                         header("location:adminhome.php");
            
                     }
                     else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
					
                };
            
            

            ?>
                <form  id="login" class="input-group"   method="post" action= "<?php echo $_SERVER["PHP_SELF"];?>" >
                    <input type="text" class="input-field"  name="aname" placeholder="Enter Adminname" required>
                     <input type="password" class="input-field"  name="apass" placeholder="Enter Password" required>
                    
                    <button type="submit" name="ALOGIN" value="Login" class="submit-btn">Log in</button>
                </form>


                <?php

                if(isset($_POST["ULOGIN"]))
                {
                     $sql=" select  * from user where  UNAME='{$_POST["uname"]}'and UPASS='{$_POST["upass"]}'";
                     $res= $db->query($sql);

                    
                     if($res->num_rows>0)
                     {
                    $row=$res->fetch_assoc();
                    $_SESSION["NAME"]=$row["UNAME"];
                    
                    $_SESSION["ID"]=$row["UID"];
                    
                    //echo"<script>window.open('uhome.php','_self');</script>";    
                    header("location:userhome.php");
                     }
                     else
                     {
                         echo "<div class='error'>Invalid Username or Password</div>";
                     }
                     
                }
                
                
                ?>





                
                <form  id ="register" class="input-group"  method="post" action= "<?php echo $_SERVER["PHP_SELF"];?>" >
                <input type="text" class="input-field"  name="uname" placeholder="Enter Username" required>
                <input type="password" class="input-field" name="upass" placeholder="Enter Password" required>
                    
                    <button type="submit"  name="ULOGIN" class="submit-btn">Log in</button>
                </form>
                
            </div>
             
            <script>
                var x= document.getElementById("login");
                
                var y= document.getElementById("register");
                
                var z= document.getElementById("btn");

                function register()
                {
                    x.style.left="-400px";
                    
                    y.style.left="50px";
                    
                    z.style.left="110px";

                }

                function login()
                {
                    x.style.left="50px";
                    
                    y.style.left="450px";
                    
                    z.style.left="0px";

                }
            </script>


        </div>
    </body>
</html>