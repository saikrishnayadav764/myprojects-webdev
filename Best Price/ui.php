<?php
error_reporting(0);
ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Best Price</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
    <nav id="nav1">
        <div class="nav-wrap">
            <div class="logo">
                <a style="text-decoration: none;cursor: pointer;" onclick="wel()">
                    <h1>Best Price</h1>
                </a>
            </div>
            <div class="nav-r">
                <div>
                    <a style="text-decoration: none;cursor: pointer;" onclick="wel()">
                        <h2>Home</h2>
                    </a>
                </div>
                <div>
                    <a style="text-decoration: none;" href="">
                        <h2>About</h2>
                    </a>
                </div>
                <div>
                    <button onclick="window.location.href='./index.php'" id="logout" class="bt">Signout</button>
                </div>
            </div>
        </div>
    </nav>

    <nav id="nav2" style="display:none">
        <div class="nav-wrap">
            <div class="logo">
                <a style="text-decoration: none;cursor: pointer;" onclick="wel()">
                    <h1>Best Price</h1>
                </a>
            </div>
            <div class="nav-r">
                <div>
                    <a style="text-decoration: none;cursor: pointer;" onclick="wel()">
                        <h2>Home</h2>
                    </a>
                </div>
                <div>
                    <a style="text-decoration: none;" href="">
                        <h2>About</h2>
                    </a>
                </div>
                <div>
                    <button onclick="showp()" class="bt">Login</button>
                </div>
            </div>
        </div>
    </nav>

    <hr>

    <div id="welw">
        <div class="wel-wrap">
            <div class="wel-box">
                <div class="wel">
                    <h1 style="background-color:black">WELCOME TO BEST PRICE</h1>
                </div>
                <div class="buts">
                    <div style="margin-right:30%;">
                        <button id="sell" class="button-29"
                            style="border-radius:11px;border-style: none;background-color: orangered;"
                            onclick="sell()">SELL</button>
                    </div>
                    <div style="margin-left:30%;">
                        <button id="buy" class="button-2" style="border-radius:11px;border-style: none;padding: 28px;"
                            onclick="buy()">BUY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="welw2" style="display:none">
        <div class="wel-wrap">
            <div class="wel-box">
                <div class="wel">
                    <h2>WELCOME TO BEST PRICE</h2>
                </div>
                <div class="buts">
                    <div style="margin-right:30%;">
                        <button disabled id="sell" class="button-29"
                            style="border-radius:11px;border-style: none;background-color: orangered;"
                            onclick="sell()">SELL</button>
                    </div>
                    <div style="margin-left:30%;">
                        <button disabled id="buy" class="button-2"
                            style="border-radius:11px;border-style: none;padding: 28px;" onclick="buy()">BUY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="log" class="login">
        <div style="display: flex;justify-content:center;align-items:center;padding: 0%;">
            <div class="login"
                style="border:2px solid black;padding:6%;display: flex;flex-direction:column;justify-content: center; align-items: center;width:30%;">
                <form action="./check.php" method="post" name="myform">
                    <div>
                        <h2>Name</h2>
                        <input required name="user" placeholder="Enter Name" type="text">
                    </div>
                    <div>
                        <h2>Email</h2>
                        <input required name="email" placeholder="Enter Email" type="text">
                    </div>
                    <div>
                        <h2>Password</h2>
                        <input required name="passw" placeholder="Enter Password" type="text">
                    </div>
                    <div style="margin:5%;">
                        <input type="submit" value="Login" style="padding:10px;">
                        <input value="Back" type="button" onclick="getbackp()" style="padding:10px;">
                    </div>
                </form>
                <div style="display: flex; justify-content: center;align-items:center;">
                    <hr style="height:0;width:20px">
                    <p>or</p>
                    <hr style="height:0;width:20px">
                </div>
                <div>
                    <button onclick="create()">CREATE ACCOUNT</button>
                </div>
            </div>
        </div>
    </div>


    <div id="sup" class="sign">
        <div style="display: flex;justify-content:center;align-items:center;">
            <div class="sigup"
                style="border:2px solid black;padding:6%;display: flex;flex-direction:column;justify-content: center; align-items: center;width:30%;padding: 2%;">
                <form action="./insert.php" method="post" name="myform2">
                    <div>
                        <h2>Name</h2>
                        <input required name="name" placeholder="Enter Name" type="text">
                    </div>
                    <div>
                        <h2>Email</h2>
                        <input required name="email" placeholder="@gmail.com" type="text">
                    </div>
                    <div>
                        <h2>Mobile NO</h2>
                        <input required name="mobno" placeholder="10 digit number" type="text">
                    </div>
                    <div>
                        <h2>Password</h2>
                        <input required name="passw" placeholder="Enter strong password" type="text">
                    </div>
                    <div>
                        <h2>Role</h2>
                        <input required name="role" placeholder="buyer or seller" type="text">
                    </div>
                    <div style="margin-top: 4%;">
                        <input value="Create" type="submit">
                        <input value="Cancel" type="button" onclick="cancel()">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="back1" style="display: none;">
        <div class="sellhead">
            <div class="no">
                <h2>Items Posted</h2>
            </div>
            <div class="post">
                <button onclick="show()" id="postbtn">Post</button>
                <!-- <button id="samp" onclick="replicate()">sample</button> -->
            </div>
            <div class="post">
                <button onclick="window.open('./bprice.php', '_blank');" id="postbtn">SEE BESTPRICE</button>
                <!-- <button id="samp" onclick="replicate()">sample</button> -->
            </div>
        </div>
        <hr style="padding: 0;">
        <hr style="padding: 0;">
        <!-- <div id="poscont"> -->
        <div id="poswrap" class="pos-wrap">
            <div class="pos">
                <div>
                    <h2>Post1</h2>
                </div>
                <div>
                    <img id="" style="width: 15vw; height: 25vh;" src="./pexels-photo-32webp.webp" alt="pic">
                </div>
                <div>
                    <h3>Best price: </h3>
                </div>
            </div>
            <?php
              $db = mysqli_connect("localhost:3307","root","","BESTPRICE");
              $sql = "select name,item,pic,price from posts where name='$user'";
              $result = mysqli_query($db,$sql);
                    while($row = mysqli_fetch_assoc($result)) {
            ?>
                        <div class="pos">
                            <div><h2><?php echo $row['name']?></h2></div>
                            <div><h2><?php echo $row['item']?></h2></div>
                            <div><img style="width:15vw;height:25vh" src="./uploads/<?php echo $row['pic'];?>" alt=""></div>
                            <div><h2><?php echo $row['price']?></h2></div>
                        </div>
                    <?php
                    }
                    ?>
        </div>
    </div>

    <div style="display: none;" id="post" class="position">
        <div style="display: flex;justify-content:center;align-items:center;padding: 1%;">
            <h1>Plss Upload the following</h1>
            <div class="sigup"
                style="border:2px solid black;padding:6%;display: flex;flex-direction:row; justify-content:space-around;width:30%;">
                <div>
                    <button onclick="window.open('./image.html')"><h1>Image</h1></button>
                </div>
                <div>
                    <button onclick="window.open('./details.html')""><h1>Details</h1></button>
                </div>
                <div>
                    <button  onclick="getback()" ><h1>Back</h1></button>
                 </div>
            </div>
        </div>

    </div>




    <div style="display: none;" id="itsurr">
        <div class="sellhead" >
            <div class="no">
                <h2>Items Posted</h2>
            </div>
            <div class="post">
                <button onclick="window.open('./setprice.php','_blank')" id="postbtn">SETPRICE</button>
                <!-- <button id="samp" onclick="replicate()">sample</button> -->
            </div>
        </div>
        <hr>
        <div id="itwrap" class="item-wrap">

            <!-- <div class="item">
                <div>
                    <h1>ITEM1</h1>
                </div>
                <div>
                    <img src="" alt="pic">
                </div>
                <div>
                    <p>SELLER</p>
                </div>
                <div class="price">
                    <input placeholder="price" type="text">
                </div>
                <div>
                    <button>set</button>
                </div>
            </div> -->

            <?php
              $db = mysqli_connect("localhost:3307","root","","BESTPRICE");
              $sql = "select name,item,pic,price from posts";
              $result = mysqli_query($db,$sql);
             while($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="pos">
                     <div><h2><?php echo "SELLER: ".$row['name']?></h2></div>
                     <div><h2><?php echo "ITEM: ".$row['item']?></h2></div>
                     <div><img style="width:15vw;height:25vh" src="./uploads/<?php echo $row['pic'];?>" alt=""></div>
                     <div><h2><?php echo "PRICE: ".$row['price']?></h2></div>
                     </div>
            <?php
                    }
            ?>
        </div>
    </div>



</body>



<script src="./script.js"></script>
<script>
    var welcome = document.getElementById("welw");
    var welcome2 = document.getElementById("welw2");
    var itsurr = document.getElementById("itsurr");
    var sellbtn = document.getElementById("sell");
    var buybtn = document.getElementById("buy");
    var logout = document.getElemenyById("logout");

    logout.addEventListener("click", function () {
        logout.innerHTML = "Login";
        sellbtn.disabled = true;
        buybtn.disabled = true;
    })


        // function sendit() {
        //     let form = document.getElementById("imgform");
        //     form.submit();
        //     alert("Data stored in database!");
        // }


    function signout() {
        document.getElementById("nav1").style.display = "none";
        document.getElementById("nav2").style.display = "block";
        welcome.style.display = "none";
        welcome2.style.display = "block";
    }

    function showp() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        // login.style.display = "block";
        if (login.style.display == "block") {
            login.style.display = "none";
            welcome2.style.display = "block";
            back1.style.display = "block";
            itsurr.style.display = "block";
        }
        else {
            login.style.display = "block";
            welcome2.style.display = "none";
            back1.style.display = "none";
            itsurr.style.display = "none";
        }
        back1.style.display = "none";
        itsurr.style.display = "none";
        back.style.display = "none";

    }
    function getbackp() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        back.style.display = "block";
        login.style.display = "none";
    }
    function create() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        var create = document.getElementById("sup");
        login.style.display = "none";
        back.style.display = "none";
        create.style.display = "block";
    }
    function cancel() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        var create = document.getElementById("sup");
        login.style.display = "block";
        back.style.display = "none";
        create.style.display = "none";
    }
    function buy() {
        welcome.style.display = "none";
        back1.style.display = "none";
        itsurr.style.display = "block";
    }
    function sell() {
        welcome.style.display = "none";
        back1.style.display = "block";
        itsurr.style.display = "none";
    }

    function wel() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        var create = document.getElementById("sup");
        // back.style.display = "block";
        login.style.display = "none";
        welcome.style.display = "block";
        back1.style.display = "none";
        itsurr.style.display = "none";
        create.style.display = "none";
    }
</script>

</html>