<?php
session_start();
include("code.php");
$lobj=new login();
$err="";
$object="";
$ferr="";
if(isset($_POST["sub"]))
{
    
    $name=$_POST["user"];
    $pas=$_POST["pas"];
    if($name=="" || $pas=="")
    {
        $err="fill all input filed";
      

    }else
    {
        $object=$lobj->cheaklogin($_POST);
        $_SESSION["user"]=$name;
        $_SESSION["pas"]=$pas;
         if(!$object)
        {
        $ferr="Reord not found please rigester";
        
        }
    
    }
   

   
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="fontasowm/all.min.css">
  <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
        
      <div class="container-fluid text-capitalize mt-4 fw-bold ">
            <div class="row w-100">
                <div class="col-4 m-auto">
                        
                    <form  method="post" id="login" class="shadow p-4">
                        <h1 class="text-center">login</h1>
                     <p> <?php echo $err;  ?><br></p>  
                        <p><?php echo $ferr;  ?></p>
                        <div class="form-group">
                            <label >username</label>
                           <input type="text" name="user" class="form-control" placeholder=" Username">
                        </div>

                        <div class="form-group mt-3">

                        <label >pasword</label>
                        
                        <input type="password" name="pas" class="form-control" id="input"   placeholder=" pasword">

            

                     
                        
                        </div>
                        <!-- <button type="submit" name="sub" class="btn mt-3">login</button> -->
                        <span  ><button type="submit" name="sub" class="btn mt-3">login</button></span>

                        <span> <a href="student.php" class="btn mt-3"> rigistration</a></span>
                       
                    </form>
                </div>
            </div>
      </div>

<script src="java.js"></script>



</body>
</html>