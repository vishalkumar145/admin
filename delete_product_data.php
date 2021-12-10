<?php
if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    

}

$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else{

    $sql="DELETE FROM mca where ID =$id";
    $query_run=mysqli_query($conn,$sql);
    if($query_run)
    {
        echo  '<script>alert("Data Deleted successfully")
        window.location.href = "index.php";</script>';
    }
    else{
        echo '<script>alert(" Data not  delteed");</script>';
     }

   

    
    
}


?>