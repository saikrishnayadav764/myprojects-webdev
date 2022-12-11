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

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mobno = $_REQUEST['mobno'];
$passw = $_REQUEST['passw'];
$role =$_REQUEST['role'];

$sql = "INSERT INTO SIGNUPS(NAME,EMAIL,MBN,PASSW,role) VALUES('$name','$email','$mobno','$passw','$role')";
if(mysqli_query($conn,$sql)){
    echo "Account created succesfully";
}
else{
    echo "error".mysqli_error($conn);
}

mysqli_close($conn);

?>