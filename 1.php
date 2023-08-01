<?php include('partial-front/menu.php'); ?>
        <!--search section-->

        
        <section class="search text-center">
            <div class="container">
                <form action="<?php echo SITEURL; ?>food-search.php " method="POST">
                    <input type="search" name="search" placeholder="search food">
                    <input type="submit" name="submit" value="search" class="btn btn-primary" >
                    
                </form>
        
        </div>

        </section>
        <!--search section end-->
        <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        ?>
        <!--categories section start-->
        <section class="categories" >
            <div class="container">
                <h2 class="text-center">Explore Foods</h2>
                <?php 
                //display category from db
                $select="SELECT * FROM tbl_category WHERE active='yes' AND Featured='yes'";
                $data=mysqli_query($con,$select);
                $count=mysqli_num_rows($data);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($data))
                    {
                        //get value id title img name ;
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                          <a href="<?php echo SITEURL;?>food-category.php?category_id=<?php echo $id;?>">
               <div class="box1 float-container">
                <?php
                //check whether img is availble or not
                if($image_name=="")
                {
                    //display mssg
                    echo"<div class='btn-error'>Image not available.</div>";
                }
                else
                {

                 ?>
               <img src="<?php echo SITEURL; ?>imgs/category/<?php echo $image_name; ?>" alt="pizza" width="100%" class="img-curve">
                 <?php
                }
                ?>
               <h3 class="float-text text-white"><?php echo $title; ?></h3>
               </div>
               </a>



                        <?php

                    }
                }
                else
                {
                    //categories not availble
                    echo "<div class='btn-error'>Category not Added";
                }



                 ?>
                 
                    <div class="clearfix"></div>
              
        </section>
    
        <!--categories section end-->
        
        <!--FOod menu section start-->
        <section class="menu">
            <div class="container">
            <h2 class="text-center">Explore Foods </h2>
            <?php 
            //geting food from database that are active and featured
            $selectt="SELECT * FROM tbl_food WHERE active='yes' AND Featured='yes' LIMIT 4";
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
            <div class="see text-center"><b><a href="<?php echo SITEURL; ?>foods.php">See More</b></div>

        </section>
        <!--food menu section end-->
   <?php include('partial-front/footer.php'); ?> 
   
   
   
    </body>
</html>