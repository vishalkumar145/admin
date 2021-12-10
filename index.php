<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

include "./templates/top.php";

?>

<?php include "./templates/admin_navbar.php"; ?>


<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <h2 style="display: contents;">Product</h2>

   
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-left: 900px;">
      Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD Product</h5><br><br>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form action="product_data.php" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name">

              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Price" name="start">
              </div>


              <div class="form-group">
                <label for="exampleInputPassword1">Description </label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Description" name="end">
              </div>






              <div class="form-group">
                <label for="exampleInputPassword1">Weight</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Link" name="link">
              </div>




              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>



    </div>

   

   

    <div class="table-responsive" style="margin-top: 30px;">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Weight</th>
            <th scope="col">Edit Data</th>
            <th scope="col">Delete Data</th>


          </tr>
        </thead>
        <tbody>

          <?php
          $conn = new mysqli('localhost', 'root', '', 'admin');
          if ($conn->connect_error) {
            die('Connection Failed :' . $conn->connect_error);
          } else {

            $stmt = "select * from mca";
            $query = mysqli_query($conn, $stmt);
            $nums = mysqli_num_rows($query);
            while ($data = mysqli_fetch_array($query)) {
          ?>
              <tr>
                <td>&#9673;</td>
                <td><?php echo $data['college_name'] ?></td>
                <td><?php echo $data['start'] ?></td>
                <td><?php echo $data['end'] ?></td>
                <td><?php echo $data['link'] ?></td>
                <td>
                  <form action="edit_product_data.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $data['ID']?>">
                  <button type="submit" class="btn btn-primary" name="delete_btn" >Edit</button>
                  </form>
                </td>
                <td>
                  <form action="delete_product_data.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $data['ID']?>">
                  <button type="submit" class="btn btn-danger" name="delete_btn" >Delete</button>
                  </form>
                </td>
                  
              </tr>

          <?php }
          }
          ?>



        </tbody>
      </table>

    </div>
  </div>


</div>


