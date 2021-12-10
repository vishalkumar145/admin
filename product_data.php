<?php

if(isset($_POST['name']) && isset($_POST['link']) && isset($_POST['start'])  && isset($_POST['end']))
{
    $name=$_POST['name'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $link=$_POST['link'];
    
  }



$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else{

  
      $stmt=$conn->prepare("insert into mca(college_name,start,end,link)
      values(?,?,?,?)");
      $stmt->bind_param("ssss",$name,$start,$end,$link);
      $stmt->execute();
      echo  '<script>alert("Data Added Successfully")
      window.location.href = "index.php";</script>';
      
      
      $stmt->close();
      $conn->close();
    
    
}

?>