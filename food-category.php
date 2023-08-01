   <?php include('partial-front/menu.php'); ?> 

   <?php
   //check whether id is pass or not
   if(isset($_GET['category_id']))
   {
    //category id is set and get the id 
    $category_id=$_GET['category_id'];
    //get category id based on category id
    $select="SELECT title FROM tbl_category WHERE id='$category_id'";
    $data=mysqli_query($con,$select);
    //get the value from the database
    $row=mysqli_fetch_assoc($data);
    //get the title
    $category_title = $row['title'];
   }
   else
   {
    //category not pass
    //redirect 
    header('Location:'.SITEURL.'1.php');
   }

   ?>
    
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //get food based on select category
            $selectt="SELECT * FROM tbl_food WHERE category_id='$category_id'";
            $data=mysqli_query($con,$selectt);
            $count=mysqli_num_rows($data);
            if($count>0)
            {
                //availble
                while($row=mysqli_fetch_assoc($data))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];

                    ?>
                    <div class="food_menu1">
                <div class="food-menu-img">
                    <?php 
                    if($image_name=="")
                    {
                        //img not availble
                        echo "<div class='btn-danger'>Image not available.</div>";
                    }
                    else
                    {
                        ?>

                    <img src="<?php echo SITEURL; ?>imgs/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" width="100%" class="img-curve">
                        <?php
                    }

                    ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">₹<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

              <a href="<?php echo SITEURL;?>foodorder.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                    <?php
                }
            }
            else
            {
                //not availbe
                echo "<div class='btn-danger'>Food is not available.</div>";
            }

            ?>

            
           

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php include('partial-front/footer.php'); ?> 
    
    <!-- footer Section Ends Here -->

</body>
</html>