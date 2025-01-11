<?php
session_start();
include("code.php");

$obj=new homwork();

$username="";
$pasword="";
$id="";
if(isset($_SESSION["user"],$_SESSION["pas"],$_SESSION["id"]))
{
  $username=$_SESSION["user"];
  $pasword=$_SESSION["pas"];
  $id=$_SESSION["id"];
  $show=$obj->select_spicific_homwork($id);
}

else
{
    exit();
}

$objstudent=new student();
$ferr="";
$s="";
$s_id=$objstudent->selectbyid($username,$pasword);
// $name=$s_id->fetch_assoc();

while($sh=$s_id->fetch_assoc())
{
    // $name=$sh["s_id"];
    if(isset($_POST["submite"]))
    {
     
              
          $re=$objstudent->fun($_POST);
          if($re)
          {
                $sub=$objstudent->insert_to_submission($sh["s_id"],$_POST["id"]);
                if($sub)
                {
                   $one=$objstudent->insert_to_submission_update($sh["s_id"],$_POST["id"],$_POST);   
                   if($one)
                   {
                    $s="Submite Succfully";
// go to subbmission page

        
                    }
                    }

                    }
                    else
                    {
                    $ferr="Please Chose the file";
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
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="fontasowm/all.min.css">
    <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> -->
    <!-- Include a required theme -->


    <title>show homwork</title>
</head>
<body>



<?php include("header.php");  ?>
    <div class="container-fluid mt-4 fw-bold text-capitalize" >
        <div class="row">
            <div class="col-5 p-4 shadow m-auto">
     <form  method="POST" enctype="multipart/form-data" id="send_homewrok">
                <!-- <div class="all"> -->
                <?php
                while($row=$show->fetch_assoc())
                {
                

                ?>
                <h4>#<?php echo $row["h_title"]; ?></h4>
                <p class="mt-3"><?php  echo $row["h_detail"];  ?></p>
                <input type="file" class="mt-4 form-control" name="file_h" ><br>
                
                <p class="ferr mt-1">   <?php  echo $ferr; ?></p>
                <p class="s mt-1">   <?php  echo $s; ?></p>
             
                <input type="number" name="id" value="<?php echo $row['h_id'];  ?>" hidden><br><br>
               <span> <button type="submit" name="submite" class="btn mt-4"  >submite</button></span>
                       
           

            <?php }?>
            <!-- </div> -->
    </form>
            </div>
        </div>
    </div>
   <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
   <script src="sweetalert2.min.js"></script>
</body>
</html>