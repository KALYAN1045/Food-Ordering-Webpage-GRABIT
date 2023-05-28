<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?> 


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
:root{
  --red:#ff3838;
}

*{
  font-family: 'Nunito', sans-serif;
  margin:0; padding:0;
  box-sizing: border-box;
  outline: none; border:none;
  text-decoration: none;
  text-transform: capitalize;
  transition:all .2s linear;
}

*::selection{
  background:var(--red);
  color:#fff;
}

html{
  font-size: 62.5%;
  overflow-x: hidden;
  scroll-behavior: smooth;
  scroll-padding-top: 6rem;
}

body{
  background:#f7f7f7;
}

section{
  padding:2rem 9%;
}

.heading{
  text-align: center;
  font-size: 3.5rem;
  padding:1rem;
  color:#666;
}

.heading span{
  color:var(--red);
}

.btn{
  display: inline-block;
  padding:.8rem 3rem;
  border:.2rem solid var(--red);
  color:var(--red);
  cursor: pointer;
  font-size: 1.7rem;
  border-radius: .5rem;
  position: relative;
  overflow: hidden;
  z-index: 0;
  margin-top: 1rem;
}

.btn::before{
  content: '';
  position: absolute;
  top:0; right: 0;
  width:0%;
  height:100%;
  background:var(--red);
  transition: .3s linear;
  z-index: -1;
}

.btn:hover::before{
  width:100%;
  left: 0;
}

.btn:hover{
  color:#fff;
}

header{
  position: fixed;
  top:0; left: 0; right:0;
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background:#fff;
  padding:2rem 9%;
  box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
}

header .logo{
  font-size: 2.5rem;
  font-weight: bolder;
  color:#666;
  text-decoration: none;
}
.logo:hover{
	color:#666
}

header .logo i{
  padding-right: .5rem;
  color:var(--red);
}

header .navbar a{
  font-size: 2rem;
  margin-left: 2rem;
  color:#666;
}

header .navbar a:hover{
  color:var(--red);
}

#menu-bar{
  font-size: 3rem;
  cursor: pointer;
  color:#666;
  border:.1rem solid #666;
  border-radius: .3rem;
  padding:.5rem 1.5rem;
  display: none;
}

.home{
  display: flex;
  flex-wrap: wrap;
  gap:1.5rem;
  min-height: 100vh;
  align-items: center;
  background:url(./images/home-bg.jpg) no-repeat;
  background-size: cover;
  background-position: center;
}

.home .content{
  flex:1 1 40rem;
  padding-top: 6.5rem;
}

.home .image{
  flex:1 1 40rem;
}

.home .image img{
  width:100%;
  padding:1rem;
  animation:float 3s linear infinite;
}

@keyframes float{
  0%, 100%{
    transform: translateY(0rem);
  }
  50%{
    transform: translateY(3rem);
  }
}

.home .content h3{
  font-size: 5rem;
  color:#333;
}

.home .content p{
  font-size: 1.7rem;
  color:#666;
  padding:1rem 0;
}
.form-container{
	background: #fff;
	width:300px;
	height:400px;
	position:relative;
	text-align:center;
	padding:20px 0;
	margin:auto;
	box-shadow: 0 0 20px 0px rgba(0,0,0,.1);
}
.form-container .head{
	font-weight:bold;
	padding:0 10px;
	color:#555;
	cursor:pointer;
	width:100px;
	display:inline-block;
	font-size: large;
}
.form-btn{
	display:inline-block;
}
.form-container form{
	max-width:300px;
	padding:0 20px;
	position:absolute;
	top:100px;
}
form input{
	width:100%;
	height:40px;
	margin:10px 0;
	padding:0 10px;
	border:1px solid #ccc;
	border-radius: 10px;
}
form .btn{
	width:100%;
	cursor:ponter;
	margin:10px 0;
}
form a{
	font-size: medium;
}
	</style>
</head>
<body>
	<!-- header section starts  -->

<header>

    <a href="#" class="logo"><i class="fas fa-utensils"></i>GRAB IT</a>

    <div id="menu-bar" class="fas fa-bars"></div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
		<div class="col-2">
			<div class="form-container">
				<div class="form-btn">
					<span class="head">Register</span>
				</div>
				<form method="post">
					<input type="text" name="user_name"placeholder="Username">
					<br>
					<input type="password" name="password"placeholder="Password">
					<button type="submit" value="Login" class="btn">Sign up</button>
					<a href="login.php">Click to Login</a>
				</form>
			</div>
		</div>
    </div>

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>
</body>
</html>