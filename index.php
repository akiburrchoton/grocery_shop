<?php include "header.php"; ?>


<div class="main-container">
    <!-- Left Section -->
    <section id="left-fifty">
        <div class="left_title">
            <h1 id="hello">Grocery Shop</h1>
        </div>

        <div class="images">
            <img src="images/categories_level_1.png" id="cat_1" usemap="#category_level_1" />
            <!-- "this.src='/images/beverage_coffee.png'" -->

            <!-- Image Map for Level 1 Category -->
            <map name="category_level_1" id="category_level_1">
                <area shape="rect" coords="0, 145, 90, 210" href="#" id="frozenfood" onmouseover="display_menu_image(this.id)" />
                <area shape="rect" coords="100, 145, 190, 210" href="#" id="freshfood" onmouseover="display_menu_image(this.id)" />
                <area shape="rect" coords="200, 145, 285, 210" href="#" id="beverage" onmouseover="display_menu_image(this.id)" />
                <area shape="rect" coords="300, 145, 385, 210" href="#" id="health" onmouseover="display_menu_image(this.id)" />
                <area shape="rect" coords="398, 145, 485, 210" href="#" id="petfood" onmouseover="display_menu_image(this.id)" />
            </map>

            <!-- Image to show menu -->
            <img src="" id="display_menu_image" usemap="" />

            <!-- Image Map for Frozen Food Category -->
            <map name="frozenfood" id="frozenfood">
                <!-- Hamburger -->
                <a href="single.php?action=single&id=1002" target="view"><area shape="rect" coords="0, 130, 90, 172" id="1002" /></a>

                <!-- Fish Finger 500 G Prawns -->
                <a href="single.php?action=single&id=1000" target="view"><area shape="rect" coords="60, 245, 145, 287" id="1000" /></a>

                <!-- Fish Finger 1000 G Prawns -->
                <a href="single.php?action=single&id=1001" target="view"><area shape="rect" coords="155, 245, 240, 287" id="1001" /></a>

                <!-- Shelled Prawns -->
                <a href="single.php?action=single&action=single&id=1003" target="view"><area shape="rect" coords="190, 130, 280, 172" id="1003" /></a>

                <!-- Tub Ice Cream 1 Litre -->
                <a href="single.php?action=single&id=1004" target="view"><area shape="rect" coords="255, 245, 335, 287" id="1004" /></a>

                <!-- Tub Ice Cream 2 Litre -->
                <a href="single.php?action=single&id=1005" target="view"><area shape="rect" coords="345, 245, 435, 287" id="1005" /></a>

            </map>

            <!-- Image Map for Fresh Food Category -->
            <map name="freshfood" id="freshfood">
                <!-- T'Bone Steak-->
                <a href="single.php?action=single&id=3002" target="view"><area shape="rect" coords="0, 130, 70, 172" id="3002" /></a>

                <!-- Cheddar Cheese 500 G -->
                <a href="single.php?action=single&id=3000" target="view"><area shape="rect" coords="30, 245, 118, 295" id="3000" /></a>

                <!-- Cheddar Cheese 1000 G -->
                <a href="single.php?action=single&id=3001" target="view"><area shape="rect" coords="127, 245, 210, 295" id="3001" /></a>

                <!-- Navel Oranges -->
                <a href="single.php?action=single&id=3003" target="view"><area shape="rect" coords="140, 130, 208, 172" id="3003" /></a>

                <!-- Bananas -->
                <a href="single.php?action=single&id=3004" target="view"><area shape="rect" coords="212, 130, 280, 172" id="3004" /></a>

                <!-- Grapes -->
                <a href="single.php?action=single&id=3006" target="view"><area shape="rect" coords="283, 130, 348, 172" id="3006" /></a>

                <!-- Apples -->
                <a href="single.php?action=single&id=3007" target="view"><area shape="rect" coords="352, 130, 420, 172" id="3007" /></a>

                <!-- Peaches -->
                <a href="single.php?action=single&id=3005" target="view"><area shape="rect" coords="423, 130, 490, 172" id="3005" /></a>

            </map>

            <!-- Image Map for Beverages Category -->
            <map name="beverage" id="beverage">
                <!-- Coffee 200 G -->
                <a href="single.php?action=single&id=4003" target="view"><area shape="rect" coords="20, 240, 85, 290" id="4003" /></a>
                
                <!-- Coffee 500 G -->
                <a href="single.php?action=single&id=4004" target="view"><area shape="rect" coords="88, 240, 155, 290" id="4004" /></a>

                <!-- Earl Grey Team Bags Pack 25 -->
                <a href="single.php?action=single&id=4000" target="view"><area shape="rect" coords="158, 240, 225, 290" id="4000" /></a>
                
                <!-- Earl Grey Team Bags Pack 100 -->
                <a href="single.php?action=single&id=4001" target="view"><area shape="rect" coords="227, 240, 295, 290" id="4001" /></a>
                
                <!-- Earl Grey Team Bags Pack 250 -->
                <a href="single.php?action=single&id=4002" target="view"><area shape="rect" coords="300, 240, 365, 290" id="4002" /></a>

                <!-- Chocolate Bar -->
                <a href="single.php?action=single&id=4005" target="view"><area shape="rect" coords="395, 130, 480, 180" id="4005" /></a>

            </map>


            <!-- Image Map for Home Health Category -->
            <map name="health" id="health">
                <!-- Bath Soap-->
                <a href="single.php?action=single&id=2002" target="view"><area shape="rect" coords="5, 130, 92, 172" id="2002" /></a>

                <!-- Panadol Pack 24 -->
                <a href="single.php?action=single&id=2000" target="view"><area shape="rect" coords="61, 245, 148, 295" id="2000" /></a>

                <!-- Panadol Pack 50  -->
                <a href="single.php?action=single&id=2001" target="view"><area shape="rect" coords="158, 245, 245, 295" id="2001" /></a>

                <!-- Washing Powder -->
                <a href="single.php?action=single&id=2005" target="view"><area shape="rect" coords="200, 130, 285, 172" id="2005" /></a>

                <!-- Garbage Bags Small -->
                <a href="single.php?action=single&id=2003" target="view"><area shape="rect" coords="255, 245, 340, 295" id="2003" /></a>

                <!-- Garbage Bags Large-->
                <a href="single.php?action=single&id=2004" target="view"><area shape="rect" coords="355, 245, 440, 295" id="2004" /></a>


                <!-- Laundry -->
                <a href="single.php?action=single&id=2006" target="view"><area shape="rect" coords="390, 130, 480, 172" id="2006" /></a>

            </map>


            <!-- Image Map for Pet Food Category -->
            <map name="petfood" id="petfood">
                
                <!-- Bird Food -->
                <a href="single.php?action=single&id=5002" target="view"><area shape="rect" coords="100, 130, 190, 172" id="5002" /></a>

                <!-- Cat Food -->
                <a href="single.php?action=single&id=5003" target="view"><area shape="rect" coords="200, 130, 285, 172" id="5003" /></a>

                <!-- Dry Dog Food 1 KG -->
                <a href="single.php?action=single&id=5001" target="view"><area shape="rect" coords="255, 245, 340, 295" id="5001" /></a>

                <!-- Dry Dog Food 5 KG-->
                <a href="single.php?action=single&id=5000" target="view"><area shape="rect" coords="355, 245, 440, 295" id="5000" /></a>


                <!-- Fish Food -->
                <a href="single.php?action=single&id=5004" target="view"><area shape="rect" coords="390, 130, 480, 172" id="5004" /></a>

            </map>

        </div>
    </section>

    <section class="right-fifty">
        <!-- Right Top Section -->
        <div id="right_top_frame">
            <iframe name="view" src="single.php" width="100%" height="100%" frameBorder="0"></iframe>
        </div>

        <!-- Right Bottom Section -->
        <div id="right_bottom_frame">
            <iframe name="view1" src="cart.php" width="100%" height="98%" frameBorder="0"> </iframe>
        </div>
    </section>
</div>


<?php include "footer.php"; ?>