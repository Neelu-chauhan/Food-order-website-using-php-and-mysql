   <?php include('partial-front/menu.php'); ?> 

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
            <section class="menu">
            <div class="container">
            <h2 class="text-center">Explore Foods </h2>
            <?php 
            //geting food from database that are active and featured
            $selectt="SELECT * FROM tbl_food WHERE active='yes'";
            $data=mysqli_query($con,$selectt);
            $count=mysqli_num_rows($data);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($data))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    $price=$row['price'];
                    $description=$row['description']
                    ?>
                     <div class="food_menu1">
                     <div class="food-menu-img">
                        <?php  
                        if($image_name=="")
                        {
                            echo"<div class='btn-error'>Image is not added.</div>";
                        }

                       else {
                            //img not availbe
                            ?>
                     <img src="<?php echo SITEURL; ?>imgs/food/<?php echo $image_name; ?>" alt="pizza" width="70%" class="img-curve">
                     </div>
                     <?php 

                        }
                        ?>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">₹<?php echo $price; ?></p>
                    <p class="food-detail"><?php echo $description; ?></p><br>
                    <a href="<?php echo SITEURL;?>foodorder.php?food_id=<?php echo $id;?>" class="btn btn-primary"> order now</a>
                </div>
            </div>

                    <?php
                }
            }
            else
            {
//food not availble
                echo "<div class='btn-error'>Food not available.</div>";
            }

             ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partial-front/footer.php'); ?> 
    <!-- social Section Starts Here -->
    <!-- footer Section Ends Here -->

</body>
</html>