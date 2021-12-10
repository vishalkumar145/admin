
<?php


    $email=$_POST['email'];
    $password=$_POST['password'];



$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else
{

    $stmt=$conn->prepare("select * from login where email =?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0)
    {
        
        while($data=$result->fetch_assoc())

        {
            if($data['password']==$password && $data['email']==$email)
            {
                session_start();

                $_SESSION['email']=$data['name'];
                
                header('Location:index.php');
            }

            else
            {
                echo '<script>alert("Wrong Email id and password")</script>';
            }
        }
         
    }
    else
    {
  
        echo '<script>alert("Please Register after Login") 
        window.location.href = "index.php";
        </script>';
        
        
        
        
    }

    
    
}


?>
