   <?php 
   $host="localhost";
   $name="root";
   $password="";
   $con=mysqli_connect($host,$name,$password);
   if($con)
   {
    // echo "connected";
    $db="CREATE DATABASE if not exists food_web1";
    $data=mysqli_query($con,$db);
    $con=mysqli_connect($host,$name,$password,'food_web1');

    if($data)
    {
        // echo "db created";
        $tb="CREATE TABLE if not exists contact(
            id int(30) AUTO_INCREMENT primary key ,
            fullname varchar(100) not null,
            email varchar(30) not null,
            phone int(20) not null,
            query varchar(200) not null
            )
        ";
        $data1=mysqli_query($con,$tb);
        if($data1)
        {
            // echo "table create";
        }
        else
        {
            echo "create to failed";
        }
    }
    else
    {
        echo "create to failed";
    }
   }
   else
   {
    echo "check";
   }

    ?>

   <?php include('partial-front/menu.php'); ?> 
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="1.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
            <style type="text/css">
                @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap');
                .body{
                    background-color: lightblue;
                }
            

            .formBox {
                padding: 15px;
                text-align: center;
                min-height: 50vh;
                min-width: 50vw;
                display: flex;
                flex-direction: column;
                background: #f8f8f885;
                border-radius: 30px;
                backdrop-filter: blur(10px);
/*                background-color: transparent;*/
                margin-left: 20%;
                margin-right: 20%;
                border: 2px solid whitesmoke;
/*                opacity: 0.1;*/


            }

            h2 {
                margin-bottom: -10px;
            }

            p {
                font-weight: 500;
                font-size: 1.1em;
            }
            form {
                padding: 10px;
            }

            form>div {
                padding: 10px;
                position: relative;
                font-size: 1.3em;
            }

            form>div i {
                position: absolute;
                top: 22px;
                margin-left: 10px;
                opacity: 0.6;
            }

            form>div input {
                height: 2em;
                width: 40vw;
                padding-left: 40px;
                font-size: 1em;
                border-radius: 20px;
                outline: none;
                border: 1px solid #b5adad;
                background-color: #f1f1f1;
            }

            div>input:focus {
                border: 1px solid #6f6a6a;

            }

            form>div:hover>i {

                opacity: 1;
                transition: opacity 1s;
            }

            textarea {
                border: none;
                width: 70vw;
                border-radius: 20px;
                padding: 10px;
                outline: none;
                font-size: 1em;
                background-color:whitesmoke;
            }

            .button {
                width: 60%;
                height: 5vh;
                color: #ffffff;
                background: #00d689;
                outline: none;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                font-size: 0.8em;
            }

            @media screen and (min-width:900px) {
                form>div input {
                    width: 50vw;
                }

                textarea {
                    width: 50vw;
                }
}
            </style>
</head>
<body>
    <div class="body">
       <br> <div class="search formBox">
              <h2>Contact Us</h2><br>
            <p>You will hear from us at the earliest!</p><br>
            <form action="" method="POST">
                <div class="nameInp">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Full Name" name="name"required>

                </div>
                <div class="mailInp">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email"required>
                </div>
                <div class="phoneInp">
                    <i class="fa-solid fa-phone"></i>
                    <input type="number" name="phone"  placeholder="Phone" min="100000" max="9999999999" required>
                </div>
                <div class="queryInp">
                    <textarea name="query"  cols="30" rows="5"
                        placeholder="Any comment or your query" required></textarea>
                </div>
                <div class="submitBtn">
                    <input type="submit" name="submit" value="Send" align="center" class="button">
                </div>
            </form>
        </div><br>
    </div>
        <?php 
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $query=$_POST['query'];

            $insert="INSERT INTO `contact`(fullname, email,phone,query) VALUES ('$name','$email','$phone','$query')";
            $data=mysqli_query($con,$insert);
            if($data)
            {
                // echo "data insert successfully";
                // header('Location:'.SITEURL.'contact.php');
            }
            else
            {
                echo"try again";
            }


        }

         ?>
        
    </body>
    
       <?php include('partial-front/footer.php'); ?> 
