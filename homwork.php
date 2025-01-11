<?php
include("code.php");
$hobj=new homwork();
$herr="";
$nherr="";
 if(isset($_POST['hsub']))
 {
    $obj=$hobj->sendhomwork($_POST);
    if($obj)
    {
        $herr="Homework send succfully";
    }else
    {
        $nherr="Fill the all input filed";
    }
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontasowm/all.min.css">
    <link rel="stylesheet" href="bootcss/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>homwork</title>
</head>
<body>

            <div class="container-fluid mt-4 text-capitalize fw-bold">
                       <div class="row">
                            <div class="col-5 shadow p-4 m-auto" id="homwork">
                            <form  method="post">
                                    <h1>send homework</h1>
                                    <p class="send"><?php echo $herr;  ?></p>
                                    <p class="no"><?php echo $nherr;  ?></p>
                                   
                                    
                                    
                                        <div class="form-group">
                                            <label >title  </label>
                                            <input type="text" name="heading" class="form-control">
                                        </div>
                              <br>
                                      <div class="form-group">
                                        <label >detail</label>
                                      <textarea cols="40" rows="5" name="detail" placholder="enter homwork information" class="form-control mt-4"></textarea>

                                      </div>
                                    <!-- detail : <input type="text" name="detail"><br><br> -->

                                    <button name="hsub" type="submit" class="btn mt-4">send</button>
                            </form>
                            </div>
                       </div>
            </div>



  
</body>
</html>