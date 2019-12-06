<!DOCTYPE html>
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
<title>Submission Completed</title>
</head>
<body>
<canvas id="canvas">
</canvas>
<div class="container">
<font face="Acme" color="white" size="+3">
<center>
<?php 
$email = $_POST["email"]; 
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$pathToFile = $_POST["picture"]; 
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $pathToImage . basename($_FILES["file"]["file"]);

if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg" or $imageFileType == "gif" or $imageFileType == "bmp" or $imageFileType == "") {

if ($_FILES["file"]["size"] < 10000000) {
    
if($email && $password && $confirm_password) {
	
	if($password==$confirm_password) {

// connect to database
$con = mysqli_connect("deebee.hippycentral.org","teamcyberino","Recent-Purple-Belt-Propose-6","hj_danny");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
}

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$filename = random_string(10);

$pathToImage = "/home/teamcyberino/web/teamcyberino.stockportdojo.org.uk/webroot/HackMarch2018/ProfPics/".$filename;
    move_uploaded_file($_FILES['file']['tmp_name'], $pathToImage);

$url = "https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/ProfPics/".$filename;

$result = mysqli_query($con, "INSERT INTO Accounts set email = '$email', password = '$password', confirm_password = '$confirm_password', picture = '$url'");

print ("These are the details you submitted...<br>");

print ("E-Mail: " . $email . "<br>");
print ("Password: ******* <br>");
print ('Profile Picture: <img src="'.$url.'" style="height: 30px"><br>');


// Commit transaction
mysqli_commit($con);

// Close connection
mysqli_close($con);

echo "<br>Successfully stored in database!<br>";

print ("<br><br><br>Thanks for submitting a profile to the database.");

}
else {
	print("Passwords don't match!<br><br>");
	$image_url='https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/CreateAccount/button_back.png';
}

}
else {
	print("Please fill in all required sections.<br><br>");
	$image_url='https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/CreateAccount/button_back.png';
}

}
else {
	echo "Sorry, your file is too large.<br><br>";
	$image_url='https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/CreateAccount/button_back.png';
}

}  else {
	echo "Sorry, only JPG, JPEG, PNG, GIF & BMP files are allowed.<br><br>";
	$image_url='https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/CreateAccount/button_back.png';
}


?>
<a href="SignUp.php"><img src="<?php echo $image_url;?>" class="effectscale"></a>
<br><br>
<a href="login.php"><img src="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/LI.png" class="effectscale"></a>
<span class="tab">
<a href="https://teamcyberino.stockportdojo.org.uk/HackMarch2018/"><img src="button_home.png" class="effectscale"></a>
</span>
</center>
</font>
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