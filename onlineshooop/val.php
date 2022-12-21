<?php
include('config.php');
$ID=$_GET['id'];
$up = mysqli_query($con,"select * from prod where id=$ID");
$data = mysqli_fetch_array($up);
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
    <title>تأكيد شراء المنتج</title>
    <style>
        button{
            background-color: lightcoral;
            cursor: pointer;
        }
        a{
            text-decoration:underline;
            font-size: 15px;
            color:black;
            font-family: 'Cairo', sans-serif;
            font-weight: bold;
            cursor: pointer
        }
        h2{
            color:black;
        }
        input{
            display:none;
        }
        .main{
            width: 30%;
            padding: 20px;
            box-shadow: 1px 1px 10px silver;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <center>
        <div class="main">
        <form action="insert_card.php" method="post">
            <h2>هل فعلا تريد شراء المنتج؟</h2>
            <input type="text" name="id" value='<?php echo $data['id'] ?>'>
            <input type="text" name="name"  value='<?php echo $data['name'] ?>'>
            <input type="text" name="price" value='<?php echo $data['price'] ?>' >
            <button name="add" type="submit" class='btn'> تأكيد اضافة المنتج للعربه</button>
        <br><br><br>
        <a href="shop.php"> الرجوع لصفحة المنتجات</a>
        </form>
        </div>
    </center>
</body>
</html>