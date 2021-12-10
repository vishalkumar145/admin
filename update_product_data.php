<?php

if(isset($_POST['update_btn'])){
    $id=$_POST['edit_id'];
    $name=$_POST['edit_name'];
    $start=$_POST['edit_start_date'];
    $end=$_POST['edit_end_date'];
    $link=$_POST['edit_link'];
  }



$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else{

    $query="UPDATE mca SET college_name='$name', start='$start',end='$end', link='$link' WHERE ID='$id'";
    $query_run=mysqli_query($conn,$query);
    
    if($query_run)
    {
        echo '<script>alert("Update Data Successfully")
      window.location.href = "index.php";</script>';
    }
    else
    {
     
      echo '<script>alert("Data not update")
      window.location.href = "index.php";</script>';
      
     
    }
    
}

?>