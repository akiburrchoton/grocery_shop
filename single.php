<?php
include "db.php"; 
include "header.php"; 
session_start();
?>

  <section class="right_top_page">
  <?php
    if(empty($_GET['id'])){
      echo "<h3 style='margin: 0!important; color:#fff;'>No product selected yet!</h3>";
      echo "<br>";
    }else{
      if($_GET['action'] == 'single'){
        echo "<h2>Product Details</h2>";
        $product_id = $_GET['id'];
        $query = "SELECT * FROM products WHERE product_id=$product_id";
        $result = mysqli_query($conn, $query);
  
        $num_rows = mysqli_num_rows($result);
  
  
        if ($result) {
          if ($num_rows > 0) {
    
            //Get the rows from the table
            while ($row = mysqli_fetch_assoc($result)) {
              $url ="cart.php?action=addtocart&id=" . $row['product_id'];
    ?>      
              <table class="table table-bordered table-dark table_single_prod">
                <thead>
                  <th >Product Name </th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>In Stock</th>
                </thead>
  
                <tbody>
                  <tr>
                  <td><?php echo $row['product_name'];?></td>
                  <td><?php echo $row['unit_price'];?></td>
                  <td><?php echo $row['unit_quantity'];?></td>
                  <td><?php echo $row['in_stock'];?></td>
                  </tr>
                </tbody>
                
              </table>
              
              <form action="cart.php" method="get" target="view1">
                <label for="quantity" style='margin-bottom:15px;  color:#fff;'><strong>Quantity </strong></label>
                <input type="number" id="quantity" name="quantity" min="1" max="20" value="1">(Max 20)
                <input type="hidden" id="action" name="action" value="addtocart">
                <input type="hidden" id="id" name="id" value="<?php echo $row['product_id']; ?>">
                <br>
                <input class="btn btn-light" type="submit" value="Add to Cart">
              </form>
  
    <?php
            }
          }
        } else {
          echo "Error creating database: " . mysqli_error($conn);
        }
      }elseif ($_GET['action'] == 'checkout'){
          // var_dump($_SESSION['cart']);
  ?>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form target="view" method="get" action="single.php">
            <input type="hidden" id="action" name="action" value="checkoutsubmit">
                <input type="hidden" id="id" name="id" value="999">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="fName">Fullname</label>
                        <input type="text" class="form-control" id="fullName" placeholder="John Doe" value="" required="">
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required="">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                
                
                <button class="btn btn-primary btn-lg btn-block" type="submit">Purchase</button>
            </form>
        </div>
  
  
  <?php  
      }elseif ($_GET['action'] == 'checkoutsubmit'){
        $occurrence = array_count_values($_SESSION['cart']);
        $total_price = 0;
  ?>     
        <h3 style="margin-bottom: 10px; color:aquamarine">Your Purchase is done successfully.</h3>
        <h5 style="margin-bottom: 30px; color:aquamarine">Thank you for the purchase!</h5>
        <h4>Your Products List</h4>
        <table class="table table-bordered table-dark">
            <thead>
                <th>Product Name </th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </thead>
        </table>
        
        <?php

          // Query for all products after refreshing
          foreach ($occurrence as $key => $value) {
              $product_id = $key;

              $query = "SELECT * FROM products WHERE product_id=$product_id";
              $result = mysqli_query($conn, $query);

              $num_rows = mysqli_num_rows($result);

              if ($result) {
                  if ($num_rows > 0) {

                      //Get the rows from the table
                      while ($row = mysqli_fetch_assoc($result)) {
        ?>


        <table class=" table table-bordered table-dark">
            <tbody>
                <tr>
                    <td width="31%"><?php echo $row['product_name']; ?></td>
                    <td width="14%"><?php echo "$" . $row['unit_price']; ?></td>
                    <td width="21%"><?php echo $value; ?></td>
                    <td width="24%"><?php
                                    $tot_price = $value * $row['unit_price'];
                                    echo "$" . $tot_price; ?></td>
                </tr>
            </tbody>
        </table>

<?php
        $total_price = $total_price + ($row['unit_price'] * $value);
          }
        }
      }
    }
      echo "<h6 style='margin-top: 20px!important; font-weight: 700;'>Sub-total: $$total_price</h6>";
        session_destroy();
      }
    } // END IF
  ?>
  </section>



<?php
  mysqli_close($conn);

  include "footer.php"; 
?>