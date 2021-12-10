<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/admin_navbar.php"); ?>
<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <div class="row">
      <div class="col-10">
        <h2>Customers</h2>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
          
          </tr>
        </thead>
        <tbody id="customer_list">
          
            
              <?php
              $conn = new mysqli('localhost', 'root', '', 'registration');
              if ($conn->connect_error) {
                die('Connection Failed :' . $conn->connect_error);
              } 
              else 
              
              {

                $stmt = "select * from login";
                $query=mysqli_query($conn,$stmt);
                $nums=mysqli_num_rows($query);
                  while ($data=mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                    <td><?php echo $data['id']  ?></td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['email']?></td>

                    </tr>

                    <?php }
                
             
              }
              ?>


            
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>




<?php include_once("./templates/footer.php"); ?>