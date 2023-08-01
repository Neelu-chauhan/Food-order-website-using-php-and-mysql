   <?php include('partial-front/menu.php'); ?> 

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="search text-center">
        <div class="container">
            <?php 
            //get the search keyword
            // $search=$_POST['search'];
            $search=mysqli_real_escape_string($con,$_POST['search']); //to prevent the  data base from hacker
            ?>
            <h2>Foods on Your Search <a href="" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
                //$search=burger'
            //sql qery to get food based on search
            $select="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $data=mysqli_query($con,$select);
            $count=mysqli_num_rows($data);
            if($count>0)

            {
                //food availble
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
                    //img name availbe or not
                    if($image_name=="")
                    {
                        //img not availbe
                        echo"<div class='btn-danger'>Image not available.</div>";
                    }
                    else
                    {
                        //imag availble
                        ?>
                    <img src="<?php echo SITEURL; ?>imgs/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" width="70%" class=" img-curve">
                    <?php 
                    }

                    ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php  echo $title;?></h4>
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
                echo "<div class='btn-danger'>Food not Found </div>";
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