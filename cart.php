<?php
include "db.php";
include "header.php";

echo '<section class="right_bottom_page">
    <h2>Shopping Cart</h2>';

session_start();

$empty_flag = false;

if (!empty($_GET['id'])) {
    

    if (empty($_SESSION['cart'])) {
        // echo "Pushing 1st Element = " . $_GET['id'] . "<br>";

        // Pushing Product ID 1st time if the Session array is empty 
        if ($_GET['action'] != "delete") {
            array_push($_SESSION['cart'], $_GET['id']);

            $total_price = 0;
            // Query
            $product_id = $_GET['id'];
            $query = "SELECT * FROM products WHERE product_id=$product_id";
            $result = mysqli_query($conn, $query);

            $num_rows = mysqli_num_rows($result);

            if ($result) {
                if ($num_rows > 0) {

                    //Get the rows from the table
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<h6 style='margin: 0!important;'>Name: $row[product_name] | Price: $row[unit_price] | Quantity: $row[unit_quantity] | Added in Cart: 1 |  Remaining: $row[in_stock]</h6>";
                        echo "<br>";
                        $total_price+= $row['unit_price'];
                    }
                }
            } else {
                echo "Error creating database: " . mysqli_error($conn);
            }

            echo "<br>";
            
            echo "<h5 style='margin: 0!important; font-weight: 700;'>Sub-total: $$total_price</h5>";
            echo "<br>";
            echo "<br>";
            $url = "cart.php?action=delete&id=999";
            echo '<a href="' . $url . ' " target="view1"><button class="btn btn-danger">Clear All</button></a>';
        }
    } else {
        $flag = false;
        $occurrence = array_count_values($_SESSION['cart']);

        // Checking if the Product ID Exists and it has been selected more than 20 times
        if ($_GET['action'] != "delete") {
            foreach ($occurrence as $key => $value) {
                if ($_GET['id'] == $key && $value == 3) {

                    // If matched checking if it was added 20 times or not -> if yes change the Flag status
                    $flag = true;
                }
            }
        }

        // If flag is not true, means it's not added 20 times yet, so allowing it to push
        // Else do not allow
        if ($flag == false) {
            // echo "Pushing more and different element = " . $_GET['id'] . "<br>";
            if ($_GET['action'] != "delete") {
                array_push($_SESSION['cart'], $_GET['id']);
                
                $total_price = 0;
                $occurrence = array_count_values($_SESSION['cart']);
                
                // Query for multiple products at a time
                foreach ($occurrence as $key => $value) {
                    $product_id = $key;

                    $query = "SELECT * FROM products WHERE product_id=$product_id";
                    $result = mysqli_query($conn, $query);

                    $num_rows = mysqli_num_rows($result);

                    if ($result) {
                        if ($num_rows > 0) {
        
                            //Get the rows from the table
                            while ($row = mysqli_fetch_assoc($result)) {
        
                                echo "<h6 style='margin: 0!important;'>Name: $row[product_name] | Price: $row[unit_price] | Quantity: $row[unit_quantity] | Added in Cart: $value| Remaining: $row[in_stock] </h6>";
                                echo "<br>";
                            
                                $total_price = $total_price + ( $row['unit_price'] * $value );
                            }
                        }
                    } else {
                        echo "Error creating database: " . mysqli_error($conn);
                    }
                }
                echo "<br>";
                echo "<h5 style='margin: 0!important; font-weight: 700;'>Sub-total: $$total_price</h5>";
                echo "<br>";
                
                $url = "cart.php?action=delete&id=999";
                echo '<a href="' . $url . ' " target="view1"><button class="btn btn-danger">Clear All</button></a>';

            } else {
                $_SESSION['cart'] = array();
                echo "<h4 style='margin: 0!important; color:#1c1c1c;'>All the products have been deleted!</h4>";
            }
        } else {
            echo "<h3 style='color:red;'>Sorry too many products!</h3>";

            $occurrence = array_count_values($_SESSION['cart']);
            $total_price = 0;
            // Query for multiple products at a time
            foreach ($occurrence as $key => $value) {
                $product_id = $key;

                $query = "SELECT * FROM products WHERE product_id=$product_id";
                $result = mysqli_query($conn, $query);

                $num_rows = mysqli_num_rows($result);

                if ($result) {
                    if ($num_rows > 0) {
    
                        //Get the rows from the table
                        while ($row = mysqli_fetch_assoc($result)) {
    
                            echo "<h6 style='margin: 0!important;'>Name: $row[product_name] | Price: $row[unit_price] | Quantity: $row[unit_quantity] | Added in Cart: $value| Remaining: $row[in_stock] </h6>";
                            echo "<br>";
                            
                            $total_price = $total_price + ( $row['unit_price'] * $value );
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
            $url = "cart.php?action=delete&id=999";
            echo '<a href="' . $url . ' " target="view1"><button class="btn btn-danger">Clear All</button></a>';
        }
    }
} else {
    //When - Cart and Action both arrays are empty
    if (empty($_SESSION['cart']) && empty($_SESSION['action'])) {
        echo "<h4 style='margin: 0!important; color:#1c1c1c;'>Cart is empty!</h4>";
        $_SESSION['cart'] = array();
    }

    // To keep the products even after refreshing
    if (count($_SESSION['cart']) > 0) {

        $occurrence = array_count_values($_SESSION['cart']);
        $total_price = 0;
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

                        echo "<h6 style='margin: 0!important;'>Name: $row[product_name] | Price: $row[unit_price] | Quantity: $row[unit_quantity] | Added in Cart: $value | Remaining: $row[in_stock] </h6>";
                        echo "<br>";
                    $total_price = $total_price + ( $row['unit_price'] * $value );
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
        $url = "cart.php?action=delete&id=999";
        echo '<a href="' . $url . ' " target="view1"><button class="btn btn-danger">Clear All</button></a>';
    }
}

?>
</section>

<?php
// session_destroy();
include "footer.php";
?>