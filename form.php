<!DOCTYPE html>
<html>
<head>
<title>Book Ticket</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/favicon-32x32.png" sizes="32x32" />
		<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
<style>
#canvas {
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
z-index: -1;
background-color: #262626;
}
.container{
	z-index: 1;
}

h1 {
    background-color: #00ff00;
}
body, html, a {
				cursor: url(https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/cur.png) , pointer;
				height: 100%;
}
.effectscale:hover {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -o-transform: scale(1.2);
  transform: scale(1.2);
  transition: all 0.1s;
  -webkit-transition: all 0.1s;
  background-color: #262626;
  color: #fff;
  -webkit-transition-duration: 0.5s; /* Safari */
  transition-duration: 0.5s;
}
.effectscale {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  transition: all 0.1s;
  -webkit-transition: all 0.1s;
  background-color: white;
  color: #262626;
  -webkit-transition-duration: 0.5s; /* Safari */
  transition-duration: 0.5s;
}
</style>
</head>
<body>
<canvas id="canvas">
</canvas>
<div class="container">
<center>
<font color="white" face="Acme" size="+3">

<?php
// define variables and set to empty values
$nameErr = $dobErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only Letters and Spaces allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
//  if (empty($_POST["phone_no"])) {
//    $phone_no = "";
//  } else {
//    $phone_no = test_input($_POST["phone_no"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    /*if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; */
    }
 // }

//  if (empty($_POST["comment"])) {
//    $comment = "";
//  } else {
//    $comment = test_input($_POST["comment"]);
//  }

//  if (empty($_POST["gender"])) {
//    $genderErr = "";
//  } else {
//    $gender = test_input($_POST["gender"]);
//  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<h2>Book a Ticket</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="Save.php" enctype="multipart/form-data">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Event: <input type="text" name="event" value="<?php echo $event;?>">
  <span class="error">* <?php echo $eventErr;?></span>
  <br><br>
  Date of Event: <input type="date" placeholder="yyyy-mm-dd" name="date" value="<?php echo $date;?>">
  <span class="error">* <?php echo $dateErr;?></span>
  <br><br>
  Other Information: <input type="text" name="other_info" value="<?php echo $other_info;?>">
  <span class="error"> <?php echo $other_infoErr;?></span>
  <br><br>
  <input type="image" src="button_book-ticket.png" value="Book your Ticket" name="submit" class="effectscale" style="border: none;">
</form>
</font>
</center>
<script>
var Canvas = document.getElementById('canvas');
var ctx = Canvas.getContext('2d');

var resize = function() {
    Canvas.width = Canvas.clientWidth;
    Canvas.height = Canvas.clientHeight;
};
window.addEventListener('resize', resize);
resize();

var elements = [];
var presets = {};

presets.o = function (x, y, s, dx, dy) {
    return {
        x: x,
        y: y,
        r: 12 * s,
        w: 5 * s,
        dx: dx,
        dy: dy,
        draw: function(ctx, t) {
            this.x += this.dx;
            this.y += this.dy;
            
            ctx.beginPath();
            ctx.arc(this.x + + Math.sin((50 + x + (t / 10)) / 100) * 3, this.y + + Math.sin((45 + x + (t / 10)) / 100) * 4, this.r, 0, 2 * Math.PI, false);
            ctx.lineWidth = this.w;
            ctx.strokeStyle = '#818181';
            ctx.stroke();
        }
    }
};

presets.x = function (x, y, s, dx, dy, dr, r) {
    r = r || 0;
    return {
        x: x,
        y: y,
        s: 20 * s,
        w: 5 * s,
        r: r,
        dx: dx,
        dy: dy,
        dr: dr,
        draw: function(ctx, t) {
            this.x += this.dx;
            this.y += this.dy;
            this.r += this.dr;
            
            var _this = this;
            var line = function(x, y, tx, ty, c, o) {
                o = o || 0;
                ctx.beginPath();
                ctx.moveTo(-o + ((_this.s / 2) * x), o + ((_this.s / 2) * y));
                ctx.lineTo(-o + ((_this.s / 2) * tx), o + ((_this.s / 2) * ty));
                ctx.lineWidth = _this.w;
                ctx.strokeStyle = '#818181';
                ctx.stroke();
            };
            
            ctx.save();
            
            ctx.translate(this.x + Math.sin((x + (t / 10)) / 100) * 5, this.y + Math.sin((10 + x + (t / 10)) / 100) * 2);
            ctx.rotate(this.r * Math.PI / 180);
            
            line(-1, -1, 1, 1, '#fff');
            line(1, -1, -1, 1, '#fff');
            
            ctx.restore();
        }
    }
};

for(var x = 0; x < Canvas.width; x++) {
    for(var y = 0; y < Canvas.height; y++) {
        if(Math.round(Math.random() * 8000) == 1) {
            var s = ((Math.random() * 5) + 1) / 10;
            if(Math.round(Math.random()) == 1)
                elements.push(presets.o(x, y, s, 0, 0));
            else
                elements.push(presets.x(x, y, s, 0, 0, ((Math.random() * 3) - 1) / 10, (Math.random() * 360)));
        }
    }
}

setInterval(function() {
    ctx.clearRect(0, 0, Canvas.width, Canvas.height);

    var time = new Date().getTime();
    for (var e in elements)
		elements[e].draw(ctx, time);
}, 10);

</script>
</body>
</html>