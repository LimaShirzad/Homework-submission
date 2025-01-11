<?php
session_start();
include("code.php");
$obj=new homwork();
$show=$obj->select();
$sobj=new student();

$username="";
$pasword="";

if(isset($_SESSION["user"],$_SESSION["pas"]))
{
  $username=$_SESSION["user"];
  $pasword=$_SESSION["pas"];

}
else
{
  exit();
}
if(isset($_POST["view"]))
{
  $id=$_POST["id"];
  $_SESSION["id"]=$id;
  header("location:show.php");
}

$r=$sobj->student_all_info();



//

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="fontasowm/all.min.css">
    <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
</head>
<body>
  <?php include("header.php");  ?>

     <br>
      <div class="container-fluid text-capitalize fw-bold mt-1">
        <div class="row">
          <div class="col-11 m-auto shadow p-4" id="sub">
         
               <h3 class="text-center">welcome &nbsp; <?php echo $username; ?></h3>
       <br><br>
             
              <?php
                         
                         while($row=$show->fetch_assoc())
                         {
                           
                     
               ?>
               <form  method="post" class="">
                <!-- start -->
           
            <!-- end -->
                  <div class="show " class="">

                         <h4>#<?php echo $row["h_title"]; ?></h4>
                            
                          <button name="view" class="btn mb-1">view</button>
                     
                          <input type="hidden" name="id" value="<?php echo $row['h_id'] ?>">
                  
                          <!-- <input type="submit" name="view" value> -->
                          
                  </div>
            

           
        
                  </form>
                  <br>
                
                  <?php   }?>
                  
                </div>
               
        </div>
      </div>







   
</body>
</html>