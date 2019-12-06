
<html>
<head>
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

body, html, a {
				cursor: url(https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/cur.png) , pointer;
				height: 100%;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
		<link rel="icon" type="image/png" href="https://teamcyberino.stockportdojo.org.uk/HackMarch2018/favicon-32x32.png" sizes="32x32" />
<link href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Style/Button.css" rel="stylesheet">
<link href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Style/Button2.css" rel="stylesheet">
	<title>Enter Email</title>
</head>
	<body>
	<canvas id="canvas">
</canvas>
<center>
<font face="Acme" color="white" size="+4">
<?php

if (empty($_POST["email"])) {
    $emailErr = "";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["email2"])) {
    $email2Err = "";
  } else {
    $email2 = test_input($_POST["email2"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email2Err = "Invalid email format"; 
    }
  }
 ?>
 <p>For security issues, please enter your email twice.</p>
		<form method="post" action="send.php" enctype="multipart/form-data">
		E-Mail: <input type="text" name="email" value="<?php echo $email;?>" style="height:40px;font-size:18pt;">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Retype E-Mail: <input type="text" name="email2" value="<?php echo $email2;?>" style="height:40px;font-size:18pt;">
  <span class="error">* <?php echo $email2Err;?></span>
  <br><br>
		<input type="image" src="button_submit.png" name="submit" value="submit" class="effectscale">
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
