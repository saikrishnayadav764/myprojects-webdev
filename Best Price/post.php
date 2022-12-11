<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "BESTPRICE";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}



    $name = $_REQUEST['yn'];
    $item = $_REQUEST['nm'];
    $price = $_REQUEST['price'];
    $pic = $_REQUEST['pic'];

 

    $sql = "INSERT INTO posts(name,item,pic,price) VALUES('$name','$item','$pic','$price')";

    if(mysqli_query($conn,$sql)){
    echo " created succesfully";
    }
    else{
    echo "error".mysqli_error($conn);
    } 
    


mysqli_close($conn);


?>
<a href="./ui.php">GET BACK</a>