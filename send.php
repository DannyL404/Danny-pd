
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
	<title>Email Sent</title>
</head>
<body>
<canvas id="canvas">
</canvas>
<center>
<font face="Acme" color="white" size="+4">
<?php
$to = $_POST['email'];
$to2 = $_POST['email2'];
$subject = 'Test';
$from = 'einnefnam@gmail.com';

if($to==$to2) {
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
//$headers .= 'From: '.$from."\r\n".
    //'Reply-To: '.$from."\r\n" ;
    //'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi! </h1>';
$message .= '<p style="color:#273679;font-size:18px;">Please click here to get your ticket!</p>';
$message .= '<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.urlencode($to).'&choe=UTF-8" title="Link to Google.com" />';
$message .= '<p style="color:#273679;font-size:18px;">'.date('l jS \of F Y h:i:s A').'</p>';
$message .= '</body></html>';
 
// Sending email
//if(mail($to, $subject, $message, $headers)){
if(mail($to, $subject.date('l jS \of F Y h:i:s A'), $message, $headers)){
    echo 'Your mail has been sent successfully to ';
    echo $to;
} else{
    echo 'Unable to send email. Please try again.';
}

}
else {
	print("E-Mails don't match!<br><br>");
	$image_url='https://www.teamcyberino.stockportdojo.org.uk/HackMarch2018/CreateAccount/button_back.png';
}
?>
<a href="send-text-email.php"><img src="<?php echo $image_url;?>" class="effectscale"></a>
<br><br>
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