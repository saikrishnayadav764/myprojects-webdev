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
    <nav>
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
                    <h2>WELCOME TO BEST PRICE</h2>
                </div>
                <div class="buts">
                    <div style="margin-right:30%;">
                        <button disabled class="button-29"
                            style="border-radius:11px;border-style: none;background-color: orangered;"
                            onclick="sell()">SELL</button>
                    </div>
                    <div style="margin-left:30%;">
                        <button disabled class="button-2" style="border-radius:11px;border-style: none;padding: 28px;"
                            onclick="buy()">BUY</button>
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
            <div class="sigup1"
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
                    <img id="" style="width: 15vw; height: 25vh;" src="pexels-photo-32webp.webp" alt="pic">
                </div>
                <div>
                    <h3>Best price: </h3>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <div style="display: none;" id="post" class="position">
        <div style="display: flex;justify-content:center;align-items:center;padding: 1%;">
            <div class="sigup"
                style="border:2px solid black;padding:6%;display: flex;flex-direction:column;justify-content: center; align-items: center;width:30%;">
                <form method="post" action="./post.php" name="myform2">
                    <div>
                        <h2>YOUR NAME</h2>
                        <input id="yn" placeholder="Enter Name" type="text">
                    </div>
                    <div>
                        <h2>ITEM NAME</h2>
                        <input id="nm" placeholder="Enter Name" type="text">
                    </div>
                    <div>
    
                        <h2>Upload Pic</h2>
                        <input name="pic" type="file" id="pic">
                    </div>
                    <div>
                        <h2>YOUR PRICE</h2>
                        <input id="price" placeholder="your price" type="number">
                    </div>
                    <div>
                        <h2>Best Price</h2>
                        <input id="bprice" disabled name="mobno" placeholder="₹" type="number">
                    </div>
                    <div style="margin-top: 4%;">
                        <input value="Post" type="button" onclick="replicate()">
                        <input value="Back" type="button" onclick="getback()">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div style="display: none;" id="itsurr">
        <div id="itwrap" class="item-wrap">
            <div class="item">
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
            </div>
        </div>
    </div>

</body>

<script src="./script.js"></script>
<script>
    var welcome = document.getElementById("welw");
    var itsurr = document.getElementById("itsurr");
    function showp() {
        var login = document.getElementById('log');
        var back = document.getElementById('welw');
        // login.style.display = "block";
        if (login.style.display == "block") {
            login.style.display = "none";
            back.style.display = "block";
            back1.style.display = "block";
            itsurr.style.display = "block";
        }
        else{
            login.style.display = "block";
            back.style.display = "none";
            back1.style.display = "none";
            itsurr.style.display = "none";
        }
        back1.style.display = "none";
        itsurr.style.display = "none";

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