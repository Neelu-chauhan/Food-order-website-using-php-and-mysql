   <?php include('partial-front/menu.php'); ?> 

<?php 
if(isset($_GET['food_id']))
{
    //get the food id and details of selected food
    $food_id=$_GET['food_id'];
    $select="SELECT * FROM tbl_food WHERE id='$food_id'";
    $data=mysqli_query($con,$select);
    $count=mysqli_num_rows($data);
    if($count==1)
    {
        while($row=mysqli_fetch_assoc($data))
        {
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
        }

    }
    else
    {
        //redirect
        header('Location:'.SITEURL.'1.php');
    }
}
else
{
    //redirect to homepage
    header('Location:'.SITEURL.'1.php');
}

?>
 <?php
            //check whether submit button click or not
            if(isset($_POST['submit']))
            {
                //get data from the db
                $food=$_POST['food'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$price * $qty; //total=price*qty
                $order_date=date("Y-m-d h:i:sa");
                $status="ordered"; //ordered,on delivery,cancelled
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                //save the order in db

                $insert="INSERT INTO tbl_order SET food='$food',price='$price',qty='$qty',total='$total',order_date='$order_date',status='$status',customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address'";
                $data=mysqli_query($con,$insert);
                if($data==true)
                {
                    $_SESSION['order']="<div class='btn-success'>Food Order Successfully.</div> ";
                    header('Location:'.SITEURL.'1.php');

                }
                else
                {
                  $_SESSION['order']="<div class='btn-danger'>Failed to order Food .</div> ";
                    header('Location:'.SITEURL.'1.php');
                }





            }

            ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <style type="text/css">
        .bg{
             background-image: url('imgs/orderbg.webp');  
             background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
 

}

            @media screen and (min-width:900px) {
                form>div input {
                    width: 50vw;
                }
                
    </style>
    <section class="text-center bg">
        <div class="container">

            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend><b>Selected Food<b></legend>
                          <!--   <script type="text/javascript">
                                var p=<?php echo $qty; ?>
                                alert(p);
                            </script> -->
                    <div class="food-menu-img">
                        <?php 
                        if($image_name=="")
                        {
                            echo "<div class='btn-danger'>Image not available.</div>";
                        }
                        else
                        {
                        ?>
                        <img src="<?php echo SITEURL; ?>imgs/food/<?php echo $image_name;?>" alt="momo" width="100%" class=" img-curve">

                            <?php
                        }
                        ?>
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price"><?php  echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">


                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. neelu" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9899xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@gamil.com.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
           

        </div>
    </section>


        <!--food menu section end-->
        <!--socail  section start-->
   <?php include('partial-front/footer.php'); ?> 
      
        <!--footer section end-->
   
   
   
   
   
   
   
   
    </body>
</html>



