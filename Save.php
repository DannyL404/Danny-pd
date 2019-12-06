<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
<link rel="icon" type="image/png" href="https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/favicon-32x32.png" sizes="32x32" />
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
		<link rel="icon" type="image/png" href="https://teamcyberino.stockportdojo.org.uk/HackMarch2018/favicon-32x32.png" sizes="32x32" />
<title>Submission Completed</title>
<style>

h1 {
    color: white;
}

p {
    color: white;
}
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
				cursor: url(https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/Media/cur.png) ,pointer;
				height: 100%;
}
</style>
</head>
<body oncontextmenu="return false">
<canvas id="canvas">
</canvas>
<div class="container">
<font color="white" face="Acme" size="+4">
<center>
<?php 

print ("Saved!<br>");

$name = $_POST["name"];
$age = $_POST["age"];
$email = $_POST["email"];
$event = $_POST["event"]; 
$date = $_POST["date"]; 
$other_info = $_POST["other_info"]; 
$red = $_POST["https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/send-text-email.php"];

if($name && $age && $email && $event && $date) {

//print ("Name: " . $name . "<br>");
//print ("D.O.B.: " . $dob . "<br>");
//print ("Job: " . $job . "<br>");
//print ("Company: " . $company . "<br>");
//print ("Gender: " . $gender . "<br>");
//print ("Email: " . $email . "<br>");
//print ("Phone Number: " . $phone_no . "<br>");
//print ("Tag1: " . $tag1 . "<br>");
//print ("Tag2: " . $tag2 . "<br>");
//print ("Tag3: " . $tag3 . "<br>");
//print ("Profile Picture: " . $pathToImage . "<br>");


// connect to database
$con = mysqli_connect("deebee.hippycentral.org","teamcyberino","Recent-Purple-Belt-Propose-6","hj_danny");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
	echo "Connected! <br>";
}

//$filename = random_string(10);

//pathToImage = "/home/teamcyberino/web/ucc.stockportdojo.org.uk/webroot/Media/ProfPic/".$filename.".png";
//    move_uploaded_file($_FILES['file']['tmp_name'], $pathToImage);
	
//function random_string($length) {
//    $key = '';
//    $keys = array_merge(range(0, 9), range('a', 'z'));

//    for ($i = 0; $i < $length; $i++) {
 //       $key .= $keys[array_rand($keys)];
//    }

//    return $key;
//}

//$url = "https://www.ucc.stockportdojo.org.uk/Media/ProfPic/".$filename.".png";

//print("INSERT INTO Ticket_Scanner set Name = '$name', Age = '$age', Email = '$email', Event = '$event', Date = '$date', Other_Info = '$other_info'");

$result = mysqli_query($con, "INSERT INTO Ticket_Scanner set Name = '$name', Age = '$age', Email = '$email', Event = '$event', Date = '$date', Other_Info = '$other_info'");



// Commit transaction
mysqli_commit($con);

// Close connection
mysqli_close($con);

//echo "<br>Hopefully stored in database<br>";
//print ("result " . $result);

print("Ticket Booked");

print("Please wait...<br><br>");

print('<img src="Loading3.gif">');

echo "<meta http-equiv='refresh' content='3; URL=send-text-email.php' />";  

}
else {
	print("Please fill in all required sections.");
}


?>

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

</script>
</body>
</html>
