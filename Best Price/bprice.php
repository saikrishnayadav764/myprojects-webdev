

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
            <h1>ENTER YOUR NAME</h1>
            <input type="text" name="seller" id="">
            <h1>ENTER ITEM NAME</h1>
            <input type="text" name="item" id="">
            <input type="submit" value="GET">
            <h1>
                <?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "BESTPRICE";
error_reporting(0);
ini_set('display_errors', 0);

$conn = mysqli_connect($servername,$username,$password,$dbname);


$values = array();
$seller = $_REQUEST["seller"];
$item = $_REQUEST["item"];
$sql = "select price from setprices where name='$seller'and item='$item'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        // echo $row["price"]."<br>";
        $num = (int)$row["price"];
        array_push($values,$num);
        rsort($values);
    }
    echo "Best Price is ".$values[0];
}
else{
    echo "not found";
}
?>
            </h1>
        <!-- <input type="button" value="Back" onclick="window.location.href='./check.php'"> -->
        </form>
        
    </div>




</body>

</html>