<?php 
include ('config.php');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:shop.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products | المنتجات </title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        h3{
            font-family: 'Cairo', sans-serif;
            font-weight: bold;
        }
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        .card img{
            width: 100%;
            height: 200px;
        }
        main{
            box-shadow: 1px 1px 10px silver;
            width: 60%;
        }
        .btn {
            border:none;
            padding: 10px;
            width: 40%;
            font-weight: bold;
            font-size: 15px;
            background-color: lightcoral;
            cursor: pointer;
            font-family: 'Cairo', sans-serif;
            margin-bottom: 15px;
        }
        .navbar-brand{
            margin-left:70px ;
            text-decoration:none;
            list-style-type:none;
            color:white;
        }


    </style>
</head>
<body>
       
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p>المستخدم الحالي : <span><?php echo $fetch_user['name']; ?></span> </p>
   <div class="flex">
      <a href="shop.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');" class="delete-btn">تسجيل الخروج</a>
   </div>

</div>
    <ul style='background-color:black;cursor: pointer'> 
        <li>
            <a class="navbar-brand" href="card.php">mycard| عربتي</a>
    </ul>
    <center>
        <h3> المنتجات المتوفره</h3>
    </center>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM prod");
    while($row = mysqli_fetch_array($result)){
        echo "
        <center>
        <main>
            <div class='card' style='width: 15rem;'>
                <img src='$row[image]' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='val.php? id=$row[id]' class='btn' style= text-decoration:none;>اضافة المنتج للعربه</a>
                </div>
            </div>
        </main>
        <center>
        ";
    }
    ?>
</body>
</html>