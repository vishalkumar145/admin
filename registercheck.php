
<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
  }



$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else{

    $stmt=$conn->prepare("select * from login where email =?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    
    if($result->num_rows>0)
    {
      echo '<script>alert("Email id Already Exists")</script>';
    }
    
    else
    {
      $stmt=$conn->prepare("insert into login(name,email,password)
      values(?,?,?)");
      $stmt->bind_param("sss",$name,$email,$password);
      $stmt->execute();
      echo '<script>alert("Admin Created Successfully")
      window.location.href = "login.php";</script>';
      $stmt->close();
      $conn->close();
     
    }
    
}

?>