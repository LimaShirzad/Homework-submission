<?php

class student{
    private $host_name="localhost";
    private $username="root";
    private $pasword="";
    private $db_name="prjects";
    public $Databaseconnnection;
    // start of connecting Database
    public function __construct()
    {
    $this->Databaseconnnection=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
     if($this->Databaseconnnection->connect_error)
     {
        echo $this->Databaseconnnection->connect_error ;
        exit();
     }
     else
     {
       return $this->Databaseconnnection;
     }
    }
// end of connection

// start of add student
 public function addstudent($Data)
 {
     $name=$Data["name"];
     $fname=$Data["fname"];
     $username=$Data["user"];
     $pasword=$Data["pas"];
      

     $insert_student="INSERT INTO student(s_name,sf_name,username,pasword)VALUES('$name','$fname','$username','$pasword')";
     $run_query=$this->Databaseconnnection->query($insert_student);
     return $run_query;
 }
// end of add student
 public function selectbyid($user,$pas)
 {

    $selct="SELECT s_id FROM student WHERE username='$user' and pasword='$pas'";
    $run=$this->Databaseconnnection->query($selct);
    // $res=$run->fetch_assoc();
    return $run;
 } 

 public function insert_to_submission($s_id,$h_id)
 {
    // $h=string($h_id);  

   $insert="INSERT INTO homwork_submisson(s_id,h_id)VALUES('$s_id','$h_id')";
   $run=$this->Databaseconnnection->query($insert);
   if($run)
   {
    return $run;
   }
 }
 public function insert_to_submission_update($s_id,$h_id,$Data)
 {
    // $file=$Data["file_h"];
    $file=$_FILES["file_h"]["name"];
    $mark=10;
     if($file=="")
     {
        // what shall i wirte here whallah i dont know:(
     }
     else{
    $update_query="UPDATE homwork_submisson SET uplod='$file',mark='$mark' WHERE s_id='$s_id' and h_id='$h_id'";
    $run=$this->Databaseconnnection->query($update_query);
    if($run)
    {
    move_uploaded_file($_FILES['file_h']['tmp_name'],"$file");
    return $run;
    }
     }

 }
 public function fun($Data)
 {
       // $file=$Data["file_h"];
    $file=$_FILES["file_h"]["name"];
    if($file=="")
    {
        // sa wkrm
    }else
    {
        return $file;
    }
 }
 public  function chaeck_login_data()
 {
   $query="SELECT username,pasword FROM student";
   $run=$this->Databaseconnnection->query($query);
   return $run;

 }
//  see your work start
   public function student_work($user,$pas)
    {

           $qury="SELECT * FROM other WHERE username='$user' and pasword='$pas'";
           $run=$this->Databaseconnnection->query($qury);
           return $run;

    }
    public function student_all_info()
    {
        $query="SELECT s_id,h_id FROM homwork_submisson";
        $run=$this->Databaseconnnection->query($query);
        return $run;
       
        
    }
    public function cout_student_mark($user,$pas)
    {
        $query="SELECT SUM(mark) FROM other WHERE username='$user' and pasword='$pas'";
        $run=$this->Databaseconnnection->query($query);
        return $run;
    }
    

// see your work end
}

class homwork
{
    private $host_name="localhost";
    private $username="root";
    private $pasword="";
    private $db_name="prjects";
    public $Databaseconnnection;
    // start of connecting Database
    public function __construct()
    {
    $this->Databaseconnnection=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
     if($this->Databaseconnnection->connect_error)
     {
        echo $this->Databaseconnnection->connect_error ;
        exit();
     }
     else
     {
       return $this->Databaseconnnection;
     }
    }
    public function sendhomwork($Data)
    {
        $title=$Data["heading"];
        $detail=$Data["detail"];
        if($title=="" || $detail=="")
        {
         
        }
        else
        {
            $insert_student="INSERT INTO homwork(h_title,h_detail)VALUES('$title','$detail')";
            $run_query=$this->Databaseconnnection->query($insert_student);
            // $err="Reocrd Inserted succfuly";
            // return $err;
            return $run_query;
        }
        // if(!empty($title) and !empty($detail))
        // if($title=="" || $detail=="")
        // {
        //     $err="Please Enter full deatil";
        //     return $err;
       // }
        // else{
        // $file=$Data["file"];
        // $pasword=$Data["number"];
        

        // }
    }
   
    public function select()
    {
        $sql="SELECT * FROM homwork";
        $run=$this->Databaseconnnection->query($sql);
        return $run;
    }
     
    public function select_spicific_homwork($h_id)
    {
        $sql="SELECT * FROM homwork WHERE h_id='$h_id'";
        $run=$this->Databaseconnnection->query($sql);
     
        return $run;   
    }
    public function update_homwork($Data)
    {
        $hid=$Data["id"];
        $mark=10;
        $file=$_FILES["file_h"]["name"];
        if($file=="")
        {
        //  header("location:show.php");
              
        }
       else{
       
            $update="UPDATE homwork SET h_uplod='$file',mark='$mark' WHERE h_id='$hid'";
            $run=$this->Databaseconnnection->query($update);
       
           if($run)
           {
            
            move_uploaded_file($_FILES['file_h']['tmp_name'],"$file");
            return $run;
           }
        //    $err="Homwork submited succfuly...";
        //    return $err;
        
        }
     
    }

}

class login
{
    private $host_name="localhost";
    private $username="root";
    private $pasword="";
    private $db_name="prjects";
    public $Databaseconnnection;
    // start of connecting Database
    public function __construct()
    {
    $this->Databaseconnnection=new mysqli($this->host_name,$this->username,$this->pasword,$this->db_name);
     if($this->Databaseconnnection->connect_error)
     {
        echo $this->Databaseconnnection->connect_error ;
        exit();
     }
     else
     {
       return $this->Databaseconnnection;
     }
    }
    public function cheaklogin($Data)
    {

        $user=$Data["user"];
        $pas=$Data["pas"];
        if($user=="" || $pas=="")
        {
            // $err="Enter full information";
            // return $err;
        }
        else{

            $sql="SELECT username,pasword FROM student";
            $run=$this->Databaseconnnection->query($sql);
            while($row=$run->fetch_assoc())
            {
           
                if($row["username"]==$user and $row["pasword"]==$pas)
                {
                     header("location:submission.php");
                     return $run;
                }
                
               
              
            }
        }  
    }

       
}









?>