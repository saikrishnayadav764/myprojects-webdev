var postbtn = document.getElementById("postbtn");
var postform = document.getElementById("post");
// var back = document.getElementById("back");
// var itemname = document.getElementById("nm");
var price = document.getElementById("price");
// var bestprice = document.getElementById("bprice").value;
var image = document.createElement("img");
image.src = document.getElementById("fileToUpload");
var itemwrap = document.getElementById("itwrap");
var seller = document.getElementById("yn");
var mynum = 0;
var setprices=[];

// var itemwrap = document.getElementById("itwrap");
// var post2 = document.createElement("div");
// var div11 = document.createElement("div");
// var div22 = document.createElement("div");
// var div33 = document.createElement("div");
// var h11 = document.createElement("h1");
// var img2 = document.createElement("img");
// var p = document.createElement("p");


// function loadfile(event) {
//     image.src = URL.createObjectURL(event.target.files[0]);
// }

function replicate() {
    // var poscont = document.getElementById("poscont");
    // var poswrap = document.createElement("div");
    var itemname = document.getElementById("nm");
    var poswrap = document.getElementById("poswrap");
    var bestprice = document.getElementById("bprice");
    var itemwrap = document.getElementById("itwrap");

    var post = document.createElement("div");
    var div1 = document.createElement("div");
    var div2 = document.createElement("div");
    var div3 = document.createElement("div");
    var div4 = document.createElement("div");
    var h1 = document.createElement("h1");
    var img = document.createElement("img");
    var p = document.createElement("p");
    var h3 = document.createElement("h3");
    // h3.innerText = "BestPrice: ";
    // poswrap.appendChild(post);
    // poswrap.className = "pos-wrap";
    post.appendChild(div1);
    post.appendChild(div2);
    post.appendChild(div3);
    post.appendChild(div4);
    post.style.backgroundColor = "blue";
    post.className = "pos";
    div1.appendChild(h1);
    h1.innerText = itemname.value;
    div2.appendChild(img);
    img.src = image.src;
    img.style.width = "15vw";
    img.style.height = "25vh";
    div3.appendChild(h3);
    p.innerText = "seller";
    poswrap.appendChild(post);
    postform.style.display = "none";
    back1.style.display = "block";

    
    
    var post2 = document.createElement("div");
    var form = document.createElement("form");
    form.name = "myform3";
    var div11 = document.createElement("div");
    var div22 = document.createElement("div");
    var div33 = document.createElement("div");
    var div44 = document.createElement("div");
    var div55 = document.createElement("div");
    var div66 = document.createElement("div");
    
    var h11 = document.createElement("h1");
    var img2 = document.createElement("img");
    var p = document.createElement("p");
    var p2 = document.createElement("p");
    var input = document.createElement("input");
    input.type = "number";
    var buttn = document.createElement("input");
    buttn.type = "submit";
    post2.appendChild(div11);
    post2.appendChild(div22);
    post2.appendChild(div33);
    post2.appendChild(div44);
    post2.appendChild(div55);
    post2.appendChild(div66);
    post2.style.backgroundColor = "blue";
    post2.className = "pos";
    div11.appendChild(h11);
    h11.innerText = itemname.value;
    div22.appendChild(img2);
    img2.src = image.src;
    img2.style.width = "15vw";
    img2.style.height = "25vh";
    div33.appendChild(p);
    p.innerHTML = "SELLER NAME: " + seller.value.toString();
    div44.appendChild(p2);
    p2.innerText = "SELLER PRICE: " + price.value.toString();
    div55.appendChild(input);
    input.placeholder = "your price";
    div66.appendChild(buttn);
    buttn.value = "set";
    buttn.addEventListener("click",function(){
        setprices.push(input.value);
        setprices.reverse();
        bestprice.value = setprices[0];
        h3.innerText = "Bestprice: "  + bestprice.value.toString();
    })
    // mynum = input.value;
    itemwrap.appendChild(post2);
}

function show() {
    postform.style.display = "block";
    back1.style.display = "none";
}

function getback() {
    postform.style.display = "none";
    back1.style.display = "block";
}

function addtosetprices(){
    setprices.push(mynum);
}


