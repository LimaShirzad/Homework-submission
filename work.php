<?php

session_start();
include("code.php");
$sobj=new student();
$username="";
$pasword="";
$missing_err="";
if(isset($_SESSION["user"],$_SESSION["pas"]))
{
  $username=$_SESSION["user"];
  $pasword=$_SESSION["pas"];

}

else
{
    echo "Cheak your connection";
}

$show=$sobj->cout_student_mark($username,$pasword);
$row=$show->fetch_assoc();
$res=implode(",",$row);


// while($row=$show->fetch_assoc())
// {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
// }
// else{
//     echo "pelas login usesel";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  include("header.php"); ?>
    <br>


     <div class="container-fluid text-capitalize">
        <div class="row">
            <div class="col-7 m-auto shadow p-3" id="work">
                <form >
                <div class="homeork p-3">

<table class="table">
   <tr>
   <th>Assigment</th>
   <th>mark</th>
   <th>result</th>
   </tr>
   <tr>
                    <?php  
                            $student_data=$sobj->student_work($username,$pasword);
                            while($row=$student_data->fetch_assoc())
                            {
                               
                                
                    ?>
                 
                   
                              
                                    <td><?php echo $row["h_title"]; ?></td>
                                    <td> <?php echo $row["mark"]; ?></td>
                                    <td>
                                    <?php  
                                    if($row["mark"]==null)
                                    {
                                        $missing_err="Missing";
                                    
                            ?>
                                <span>
                                    <p style="color:red;">
                                        <?php echo $missing_err;?>
                                        
                                    </p>
                               </span>

                            <?php }else{
                                       $missing_err="Done";
                            ?>
                                 <span>
                                        <p style="color:green;">
                                            <?php echo $missing_err;?>
                                            
                                        </p>
                                </span>

                        
                               

                                    </td>
                                       
                                    </tr>
                                   
                                <?php }?>
                               
                                <?php }?>
                                <tr>
                                        <th colspan="2">total mark</th>
                                        <th><?php echo $res; ?></th>
                                    </tr>
                             </table>


                           
                         
                          

                           
                     </div>


                  
                </form>
            </div>
        </div>
     </div>




</body>
</html>