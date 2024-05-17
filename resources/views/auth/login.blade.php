<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <style>
        #bg1,
#bg2 {
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	-webkit-transition: opacity 1s;
	transition: opacity 1s;
}

#bg1 {
	background: -webkit-linear-gradient(top, rgb(10, 50, 40), rgb(10, 10, 10));
	background: linear-gradient(top, rgb(10, 50, 40), rgb(10, 10, 10));
}

#bg2 {
	opacity: 0;
	background: -webkit-linear-gradient(top, rgb(25, 50, 95), rgb(0, 20, 45));
	background: linear-gradient(top, rgb(25, 50, 95), rgb(0, 20, 45));
}

p {
	font-family: "Helvetica";
	font-size: 18px;
	color: #CCCCCC;
	text-align: center;
	display: inline-block;
	width: 100%;
}

h1 {
	font-family: "Helvetica";
	font-size: 28px;
	color: #EEEEEE;
}

.title {
	position: absolute;
	display: inline-block;
	top: 15%;
	width: 29%;
	right: 35%;
	text-align: center;
	-webkit-transition: opacity 1s, right 1s;
	transition: opacity 1s, right 1s;
}

.form {
	position: absolute;
	display: inline-block;
	font-size: 14px;
	font-family: "Helvetica";
	line-height: 40px;
	color: #CCCCCC;
	top: 35%;
	width: 100%;
	text-align: center;
}

.inputBox {
	position: absolute;
	width: 17%;
	right: 40%;
	opacity: 1;
	padding: 12px 16px;
	font-size: 16px;
	font-family: "Helvetica";
	color: #BBBBBB;
	border-radius: 8px;
	border: solid 2px;
	border-color: #EEEEEE;
	background-color: rgba(0, 0, 0, 0.25);
	-webkit-transition: border-width 0.25s, border-color 0.25s, background-color 0.5s, right 1s, opacity 1s;
	transition: border-width 0.25s, border-color 0.25s, background-color 0.5s, right 1s, opacity 1s;
}

.inputBox:focus {
	outline: none;
	border-color: #3388EE;
	background-color: rgba(0, 0, 0, 0.5);
}

.name {
	position: absolute;
	width: 30%;
	opacity: 1;
	right: 35%;
	-webkit-transition: opacity 1s, right 1s, width 1s;
	transition: opacity 1s, right 1s, width 1s;
}

#name1 {
	top: -10%;
}

#name2 {
	top: 32%;
}

.error {
	color: #FF3399;
	font-size: 14px;
}

.submitButton {
	position: absolute;
	width: 15%;
	right: 42%;
	opacity: 1;
	font-size: 18px;
	font-family: "Helvetica";
	text-align:center;
	color: #EEEEEE;
	padding: 18px 60px;
	border-radius: 16px;
	border: solid 2px;
	border-color: #EEEEEE;
	background-color: rgba(0, 0, 0, 0.1);
	-webkit-transition: color 0.5s, border-color 0.5s, background-color 0.5s, right 1s, opacity 1s;
	transition: color 0.5s, border-color 0.5s, background-color 0.5s, right 1s, opacity 1s;
}

.submitButton:hover {
	color: #3388EE;
	border-color: #3388EE;
	background-color: rgba(0, 0, 0, 0.25);
}

.message {
	position: absolute;
	display: inline-block;
	font-family: "Helvetica";
	font-size: 18px;
	color: #EEEEEE;
	width: 100%;
	text-align: center;
	top: 30%;
	visibility: hidden;
	opacity: 0;
	-webkit-transition: visibility 0s, opacity ease-out 1s, top ease-out 1s;
	transition: visibility 0s, opacity ease-out 1s, top ease-out 1s;
	-webkit-backface-visibility: hidden;
}

.particle {
	opacity: 0;
	position: absolute;
	background-color: rgba(255, 255, 255, 0.5);
	-webkit-animation: particleAnim 3s ease-in-out infinite;
	animation: particleAnim 3s ease-in-out infinite;
	border-radius: 100%;
}

@-webkit-keyframes particleAnim {
	0% {
		opacity: 0;
		transform: translateY(-0%);
	}
	15% {
		opacity: 1;
	}
	100% {
		opacity: 0;
		transform: translateY(-1500%);
	}
}

@keyframes particleAnim {
	0% {
		opacity: 0;
		transform: translateY(-0%);
	}
	25% {
		opacity: 1;
	}
	100% {
		opacity: 0;
		transform: translateY(-1500%);
	}
}
    </style>
   

   </head>
<body>
<title>Test Form</title>

<div id="bg1"></div>
<div id="bg2"></div>

<div id="particleGenerator"></div>

<span class="title" id='theTitle'><h1>Welcome!</h1></span>
	
<span class="message" id="mesOut">Hello there!</span>
	
<div class="form">
<form method="POST" action="{{ route('login') }}">
        @csrf
  <span class="name" id="name1"><p>Email:</p></span><br>
  
  <x-text-input id="email" class="inputBox" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
      <br>
  <span class="error"></span><br>
  <span class="name" id="name2"><p>Password:</p></span><br>

  <x-text-input id="password"  class="inputBox"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        <br>
  <span class="error"></span><br><br>
	
    <x-primary-button class="submitButton" id="theButton" onclick="beginTransition()">
                {{ __('Log in') }}
            </x-primary-button>
	</div>
    </form>

    <script>

function beginTransition() {
	var title = document.getElementById('theTitle');
	var input = document.getElementsByClassName('inputBox');
	var names = document.getElementsByClassName('name');
	var button = document.getElementsByClassName('submitButton');
	var bg2 = document.getElementById('bg2');
	setTimeout(function() {
		title.style.opacity = 0;
		title.style.right = "80%";
	}, 100);
	setTimeout(function() {
		names[0].style.opacity = 0;
		names[0].style.right = "80%";
		bg2.style.opacity = 1;
	}, 200);
	setTimeout(function() {
		input[0].style.opacity = 0;
		input[0].style.right = "80%";
	}, 300);
	setTimeout(function() {
		names[1].style.opacity = 0;
		names[1].style.right = "80%";
	}, 400);
	setTimeout(function() {
		input[1].style.opacity = 0;
		input[1].style.right = "80%";
	}, 500);
	setTimeout(function() {
		button[0].style.opacity = 0;
		button[0].style.right = "80%";
	}, 600);
	setTimeout(function() {
		var mes = document.getElementById('mesOut');
		mes.style.visibility = "visible";
		mes.style.opacity = 1;
		mes.style.top = "40%";
	}, 1000);
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}

function particlesInit() {
	var generator = document.getElementById("particleGenerator");
	var particleCount = 200;
	for (var i = 0; i < particleCount; i++) {
		var size = getRandomInt(2, 6);
		var n = '<div class="particle" style="top:' + getRandomInt(15, 95) + '%; left:' + getRandomInt(5,95) + '%; width:'
		+ size + 'px; height:' + size + 'px; animation-delay:' + (getRandomInt(0,30)/10) + 's; background-color:rgba('
		+ getRandomInt(80, 160) + ',' + getRandomInt(185, 255) + ',' + getRandomInt(160, 255) + ',' + (getRandomInt(2, 8)/10) + ');"></div>';
		console.log("Particle " + i + ": " + n);
		var node = document.createElement("div");
		node.innerHTML = n;
		generator.appendChild(node);
	}
}

particlesInit();
    </script>
</body>

</html>
