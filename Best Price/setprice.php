<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: black;
        color: red;
    }

    div {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
    <div>
    <form action="" method="post">
        <h2>SELLERNAME</h2>
        <input required type="text" name="seller" id="">
        <h2>ITEMNAME</h2>
        <input required type="text" name="item" id="">
        <h2>YOUR PRICE</h2>
        <input required type="number" name="price" id="">
        <input type="submit" value="SET">
        <h2>
            <?php
            $servername = "localhost:3307";
            $username = "root";
            $password = "";
            $dbname = "BESTPRICE";
            error_reporting(0);
            ini_set('display_errors', 0);
            
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            
            $seller = $_REQUEST["seller"];
            $item = $_REQUEST["item"];
            $price = $_REQUEST["price"];
            
            $sql = "insert into setprices(name,item,price) values('$seller','$item','$price')";
            
            if(mysqli_query($conn,$sql)){
                // echo "price is set";
            }
            else{
                echo "price is not set";
            }
            ?>
        </h2>
        <!-- <input type="button" value="Back" onclick="window.location.href='./check.php'"> -->
    </form>
    </div>
</body>
</html>