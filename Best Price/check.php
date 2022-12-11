

<?php
error_reporting(0);
ini_set('display_errors', 0);
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "BESTPRICE";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("connection failed".mysqli_connect_error());
}

$user = $_REQUEST['user'];
$email = $_REQUEST['email'];

$passw = $_REQUEST['passw'];

$sql = "SELECT NAME from SIGNUPS where EMAIL='$email' AND PASSW='$passw'";
$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    // header("Location: http://localhost:8080/iwp%20website%20-%20Copy/check.php");
    // echo file_get_contents("ui.php");
    include 'ui.php';
}
else{
    echo "no account found";
}

mysqli_close($conn);

?>