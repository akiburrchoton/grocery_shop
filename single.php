<?php
include "db.php"; 
include "header.php"; 
?>

  <section class="right_top_page">
    <h2>Product Details</h2>
  <?php
    if(empty($_GET['id'])){
      echo "<h5 style='margin: 0!important; color:#fff;'>There is no products selected yet!</h5>";
      echo "<br>";
    }else{
      $product_id = $_GET['id'];

      $query = "SELECT * FROM products WHERE product_id=$product_id";
      $result = mysqli_query($conn, $query);

      $num_rows = mysqli_num_rows($result);


      if ($result) {
        if ($num_rows > 0) {
          
          //Get the rows from the table
          while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<h4 style='margin: 0!important; color:#fff;'>Name: $row[product_name]</h4>";
            echo "<br>";
            echo "<h5 style='margin: 0!important; color:#fff;'>Price: $row[unit_price]</h5>";
            echo "<br>";
            echo "<h5 style='margin: 0!important; color:#fff;'>Quantity: $row[unit_quantity]</h5>";
            echo "<br>";
            echo "<h5 style='margin: 0!important; color:#fff;'>Remaining: $row[in_stock]</h5>";
            $url ="cart.php?action=addtocart&id=" . $row['product_id'];
            
            echo "<br>";
            echo '<a href="' . $url . ' " target="view1"><button class="btn btn-light">Add to Cart</button></a>';

            // Add to cart feature by using Session
            // https://www.google.com/search?q=how+to+store+products+in+cart+using+session+php&rlz=1C1ONGR_en-GBAU984AU984&oq=how+to+store+products+in+cart+using+session+&aqs=chrome.1.69i57j33i22i29i30l2.17211j0j4&sourceid=chrome&ie=UTF-8#kpvalbx=_1qJRYvutCvCM4-EPnOGl4Ao12
          }
        }
      } else {
        echo "Error creating database: " . mysqli_error($conn);
      }
    }
  
  
  ?>
  </section>



<?php
  mysqli_close($conn);

  include "footer.php"; 
?>