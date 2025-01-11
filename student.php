<?php
 include("code.php");
 $sobj=new student();
 $nerr="";
 $ferr="";
 $uerr="";
 $paserr="";
 $err="";
 $all="";
 $arr=[];
 $show=$sobj->chaeck_login_data();
if(isset($_POST["sub"]))
{
    if(empty($_POST["name"]) || empty($_POST["fname"]) || empty($_POST["pas"]) || empty($_POST["user"]))
    {
       $all="fill all input filed";   
          
    }
    else
    {
       while($row=$show->fetch_assoc())
       {
            if($row["username"]==$_POST["user"] )
            {
                $uerr="Username  is already taken";
            }
            elseif($row["pasword"]==$_POST["pas"])
            {
                $paserr="pasword is already taken";
            }
            else
            {
                $send=$sobj->addstudent($_POST);
                  if($send){
                    $all="Reocrd Inserted Succfully";
                    
                  }
            }
            
       }
        // $arr=$_POST;
    
    }

}

function validate($Data)
{
    $Data=trim($Data);
    $Data=stripcslashes($Data);
    $Data=htmlspecialchars($Data);
    return $Data;
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
    <title>student</title>
</head>
<body>
     
    <div class="container-fluid text-capitalize fw-bold mt-1">
        <div class="row">
            <div class="col-6 m-auto shadow  p-4" id="student">
            <h3 class="text-center">student registration</h3>
            <form  method="post" class=" mt-2 p-1">
                  <div class="succse">
                        <p><?php echo $all;?></p>
                  </div>

          <div class="form-group mt-2">
            <label >name</label>
            <input type="text " name="name" class="form-control" value="<?php     
               if(isset($_POST["name"]))
               {
                echo $_POST["name"];
               }
            ?>">
            <p> <?php   echo $nerr; ?></p>
           
          </div>
            
          <div class="form-group  mt-2">
             <label>father name</label>
             <input type="text " name="fname"  class="form-control" value="<?php
               if(isset($_POST["fname"]))
               {
                echo $_POST["fname"];
               }
             
             ?>">
              <p>  <?php   echo $ferr; ?></p>
             
          </div>

          <div class="form-group  mt-2">
             <label>username</label>
             <input type="text " name="user"  class="form-control" value="<?php
               if(isset($_POST["user"]))
               {
                echo $_POST["user"];
               }
             ?>">
             <p> <?php   echo $uerr; ?></p>
           
              
          </div>
       
            <div class="form-group  mt-2">

                  <label >password</label>
                  <input type="password"  name="pas"  class="form-control" value="<?php 
                    if(isset($_POST["pas"]))
                    {
                        echo $_POST["pas"];
                    }
                  
                  ?>">
                  <p><?php   echo $paserr; ?></p>
            </div>
         
          <!-- <button type="submit" name="sub" class="btn mt-4">submite </button> -->
          <span  ><button type="submit" name="sub" class="btn mt-3">submite</button></span>
          <button type="reset" class="btn mt-3" name="rest">clear</button>
          <span> <a href="login.php" class="btn mt-3"> login</a></span>
      </form>
            </div>
        </div>
    </div>
    





</body>
</html>