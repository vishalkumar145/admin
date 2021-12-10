<?php session_start(); ?>
<?php include "./templates/admin_navbar.php"; 
    include "./templates/top.php";
    include "./templates/sidebar.php";?>
<?php
if(isset($_POST['edit_id']))
{
    $id=$_POST['edit_id'];

}

$conn=new mysqli('localhost','root','','admin');
if($conn->connect_error)
{
die('Connection Failed :'.$conn->connect_error);
}
else{

    $sql="SELECT * FROM mca where ID =$id";
    $query_run=mysqli_query($conn,$sql);
    foreach($query_run as $row)
    {
        ?>
<form action="update_product_data.php" method="POST">

       <input type="hidden" name="edit_id" value="<?php echo $row['ID']?>"> 
    <div class="form-group">
        <label for="exampleInputEmail1">Collage Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Collage Name" name="edit_name" value="<?php echo $row['college_name'];?>">

    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Registration Start Date </label>
        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Registration Start" name="edit_start_date" value="<?php echo $row['start'];?>">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1">Registration End Date </label>
        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Registration End" name="edit_end_date" value="<?php echo $row['end'];?>">
    </div>






    <div class="form-group">
        <label for="exampleInputPassword1">Form Link</label>
        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Link" name="edit_link" value="<?php echo $row['link'];?>">
    </div>




    <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-primary" name="update_btn"> Update</button>
    </div>
</form>
  <?php  }
  
}

?>