<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عربتي|منتجاتي</title>
    <style>
       h3{
        font-family:'cairo', sans-serif;
        font-weight:bold;
       }
       main{
        width: 50%;
        margin-top: 30px;
       }
       table{
        box-shadow: 1px 1px  10px silver;
        
       }
       .btn{
            color: white;
            background-color: red;
            cursor: pointer;
            padding-left: 5px;
            padding-right:5px;
            text-decoration: none;
        
       }
       thead{
        background-color: #3498DB;
        color: white;
       }
       table, th, td{
        border:1px solid black;
        border-collapse: collapse;
       }
       td{
        text-align:center;
       }
       th, td{
        border:none;
       }
       
    </style>
</head>
<body>
    <center>
    <h3>
        منتجاتك المحجوزه
    </h3>
    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM addcard");
    while($row = mysqli_fetch_array($result)){
      echo "
        <main>
        <table class='table' width='500' align='center' border='1'>
               <thead >
                   <tr>
                      <th scope ='col'>product name</th>
                      <th scope ='col'>product price</th>
                      <th scope ='col'>Delete product</th>
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td><a href='del_card.php? id=$row[id]' class='btn'>ازاله</td>
                    </tr>
                </tbody>
            </table>
        </main>
    
      ";}
    
    ?>
    </center>
    <center>
        <a href="shop.php" style="font-size:15px; ">الرجوع لصفحة المنتجات</a>
    </center>
</body>
</html>