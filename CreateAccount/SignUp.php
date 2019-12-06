<!DOCTYPE html>
<html>
<head>
<style>
#canvas{
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

body, html, a {
				cursor: url(https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/cur.png) , pointer;
				height: 100%;
}
</style>
<title>Create Account</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
<link rel="icon" type="image/png" href="https://teamcyberino.stockportdojo.org.uk/HackMarch2018/favicon-32x32.png" sizes="32x32" />
<link href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Style/Button.css" rel="stylesheet">
<link href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Style/Button2.css" rel="stylesheet">
</head>
<body>
<canvas id="canvas">
</canvas>
<div class="container">
<font face="Acme" color="white" size="+3">
<?php
// define variables and set to empty values
$emailErr = $passwordErr = $confirm_passwordErr = $pathToUpload = "";
$email = $password = $confirm_password = $pathToUpload = "";

if (empty($_POST["email"])) {
    $emailErr = "Please enter an E-Mail";
  } else {
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    } else {
		$email = test_input($_POST["email"]);
	}
  }
		
  if (empty($_POST["password"])) {
    $passwordErr = "Please enter a password";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["confirm_password"])) {
    $confirm_passwordErr = "Please confirm your password";
  } else {
	  if ($password==$confirm_password) {
    $confirm_password = test_input($_POST["confirm_password"]);
  } else {
	  $confirm_passwordErr = "Passwords don't match";
	}
  }

  
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<center>
<h1>Create an Account</h1>
<p>* Required Field</p>
<br>
<form method="post" action="Submit.php" enctype="multipart/form-data">  
  E-Mail: <input type="text" name="email" value="<?php echo $email;?>" style="height:30px;font-size:14pt;">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>" style="height:30px;font-size:14pt;">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Repeat Password: <input type="password" name="confirm_password" value="<?php echo $confirm_password;?>" style="height:30px;font-size:14pt;">
  <span class="error">* <?php echo $confirm_passwordErr;?></span>
  <br><br>
  Profile Picture: <input type="file" name="file" id="file" value="<?php echo $pathToUpload;?>">
  <span class="error"><?php echo $pathToUploadErr;?></span>
  <br><br>
  <input type="image" src="button_submit.png" value="Submit" name="submit" class="effectscale">
  </font>
</form>
  <font face="Acme" color="white" size="+4">
            <p>Already have an account?<span class="tab"><a href="login.php"><img src="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/LI.png" style="height: 40px;" class="effectscale"></a></span></p>
			</font>
</center>
</div>
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
$(document).bind("contextmenu",function(e) { 
	e.preventDefault();
 
});
$(document).keydown(function(e){
    if(e.which === 123){
 
       return false;
 
    }
 
});
</script>
</body>
</html>