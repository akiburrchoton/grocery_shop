<?php
include "db.php";
include "header.php";

echo '<section id="right_bottom_page" class="right_bottom_page">
    <h2 style="margin-bottom: 30px;">Shopping Cart</h2>';

session_start();

if (isset($_GET['id'])) {

    if (isset($_SESSION['cart'])) {
        // Pushing Product ID in the Session array and showing at a time 
        if ($_GET['action'] == "addtocart") {
            $total_price = 0;

            $product_id = $_GET['id'];
            $product_quantity = $_GET['quantity'];

            if ($product_quantity > 20) {
                echo "<h3 style='color:red;'>Sorry, you cannot add the same product more than 20 times!</h3>";
            } else if ($product_quantity > 0) {
                for ($i = 0; $i < $product_quantity; $i++) {
                    array_push($_SESSION['cart'], $product_id);
                }
            }

            $occurrence = array_count_values($_SESSION['cart']);
            $total_price = 0;
            // Query for all products

?>
            <table class="table table-bordered table-dark"">
                <thead>
                    <th>Product Name </th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </thead>
            
            <?php
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
                    <table class=" table table-bordered table-dark"">
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
                } else {
                    echo "Error creating database: " . mysqli_error($conn);
                }
            }

            echo "<br>";

            echo "<h5 style='margin: 0!important; font-weight: 700;'>Sub-total: $$total_price</h5>";
            echo "<br>";
            // echo "<br>";
            // $url = "cart.php?action=delete&id=999&quantity=0";
            // echo '<a href="' . $url . ' " target="view1"><button class="btn btn-danger">Clear All</button></a>';
            $delete_url = "cart.php?action=delete&id=999&quantity=0";
            $checkout_url = "single.php?action=checkout&id=999";    
?>

            <!-- Clear Button -->
            <a href="<?php echo $delete_url; ?>" target="view1"><button class="btn btn-danger">Clear All</button></a>

            <!-- Checkout Button -->
            <a href="<?php echo $checkout_url; ?>" target="view"><button id="cart_checkout" class="btn btn-primary">Checkout</button></a>

<?php



        } else {
            // Empty Session and delete all products
            $_SESSION['cart'] = array();
            echo "<h4 style='margin: 0!important; color:#1c1c1c;'>All the products have been deleted!</h4>";
        }
    }
} else {
    // When Cart and Action both arrays are empty
    if (empty($_SESSION['cart'])) {
        echo "<h4 style='margin: 0!important; color:#1c1c1c;'>Cart is empty!</h4>";

        // Decalaring Session array for the first time
        $_SESSION['cart'] = array();
    } else { // To keep the products even after refreshing

        $occurrence = array_count_values($_SESSION['cart']);
        $total_price = 0;


?>
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
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }
        }
        echo "<br>";
        echo "<h5 style='margin: 0!important; font-weight: 700;'>Sub-total: $$total_price</h5>";
        echo "<br>";
        echo "<br>";
        $delete_url = "cart.php?action=delete&id=999&quantity=0";
        $checkout_url = "single.php?action=checkout&id=999";

?>
<!-- Clear Button -->
<a href="<?php echo $delete_url; ?>" target="view1"><button class="btn btn-danger">Clear All</button></a>

<!-- Checkout Button -->
<a href="<?php echo $checkout_url; ?>" target="view"><button id="cart_checkout" class="btn btn-primary">Checkout</button></a>

<?php
    }
}

?>
</section>

<?php
// session_destroy();
include "footer.php";
?>