
<html lang="en">
  <head>
    <!-- equired meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/c48dba1433.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700&subset=cyrillic');
html,body {
	font-family: Roboto;
	margin: 0;
	padding: 0;
}
:root {
	--main-color:mediumseagreen;
  --secondary-color: red;
  --text-color: #1BB274;
}
	.container {
	margin: 0 auto;
	max-width: 100%;
	display: flex;
	justify-content: space-between;
	align-items: center;
	height: 100vh;
}
.login_area {
	margin-left: 9%;
	width: 30%;
}
.text_back {
	margin-top: 20%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;	
}
.pharmacy_back {
	margin-top: 5%;
	display: block;
}
.background {
	width: 55%;
	height: 100vh;
	background-image: url("../assets/images/back_sloy.png");
	background-size: cover;
	background-repeat: no-repeat;
	background-size: all;
}
.d-none {
	display: none;
}
.form {
	font-family: 'Roboto', sans-serif;
}
.mt-1 {
	margin-top: 5px;
}
.mt-2 {
	margin-top: 15px;
}
.block {
	display: block;
}
.mt-3 {
	margin-top: 20px;
} 
.form input {
	padding: 12px 5px;
	width: 100%;
	font-size: 16px;
	border:none;
	/* border-bottom: 3px solid transparent; */
  background-color: #F2F2F2;
  /* border-radius: 10px;
   */
}
input::placeholder {
  color: var(--text-color) !important;
  font-weight: 500;
}
.input-container {
	display: flex;
	width: 100%;
	align-items: center;
	border-radius: 10px;
	box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
  
  /* Style the form icons */
  .icon {
	padding: 16px 1px;
	background: #F2F2F2;
	color: var(--text-color);
	min-width: 50px;
	text-align: center;
  }
  
  /* Style the input fields */
  .input-field {
	width: 100%;
	padding: 10px;
	outline: none;
  }

.form select {
	padding: 10px 15px;
	width: 100%;
	font-size: 14px;
	border:none;
	color: grey;
	border-bottom: 3px solid transparent;
	background-color: #F2F2F2;
}
.form select:focus {
		outline: none;
	border-bottom: 3px solid #3CAB81; 
}
.form input:focus {
	outline: none;
	/* border-bottom: 3px solid #3CAB81;  */
}
.log_in {
	padding: 10px 50px;
	background-color: var(--main-color);
	outline: none;
border: 1px solid var(--main-color);
	border-radius: 10px;
	color: white;
	font-size: 16px;
	cursor: pointer;
	font-weight: 600;
	letter-spacing: 1px;
	font-family: 'Montserrat', sans-serif;
	box-sizing: border-box;
}
.log_in:hover {
	background-color: white;
	color: var(--main-color);
	border: 1px solid var(--main-color);
	box-sizing: border-box !important;
}
.reg {
	font-size: 12px;
	cursor: pointer;
	color: var(--main-color);
}
.reg:hover {
	transform: scale(1.1);
}
@media screen and (max-width: 600px) {
	.background {
		display: none;
	}
	.container {
		background-color: #d9f4ea;
		justify-content: center;
	}
	.login_area {
		width: 90%;
		margin: 5%;
	}
}
.count_container {
	display: flex;

}
.count {
	max-width: 200px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
.minus, .plus {
	width: 30px;
	text-align: center;
	display: flex;
	justify-content: center;
	cursor: pointer;
	align-items: center;
	height: 30px;
	color: white;
	border-radius: 50%;
	background-color: var(--main-color);
}
.num_container {
	width: 40px;
	text-align: center;
	margin: 5px;
	border-bottom: 2px solid var(--main-color);
}
.count_box {
	display: flex;
	justify-content: space-around;
}
.text {
	font-size: 15px;
	line-height: 20px;
	letter-spacing: 1.135em;
	color: #0DC177;
}
</style>
<title>Login</title>
</head>
 <div class='container' style="padding: 0;">
            <div class="login_area">
            	<div class="error"></div>
			<center><div class="brand pb-2">
				<img class="brand" src='../assets/images/logo.png'></img>
			</div>
			</center>
			<div id="form" class="form">
				<form onsubmit="kirish_login()">
			<div class="input-container mt-2">
				<i class="fa fa-user icon "></i>
				<input id="login1" class=" input-field" type="text" name="login" placeholder="Логин" required="required">
			</div>
			<div class="input-container mt-3">
				<i class="fa fa-key icon "></i>
				<input id="password1" class="input-field" type="password" name="pasword" placeholder="Парол" required="required" >
			</div>
            

				<center class='mt-4'><button onclick="kirish_login()" class="log_in">Кириш</button>
				</form>
					
				<span onclick="registr()" class="mt-2 block reg">Регистрация</span></center>
			</div>
		</div>
           
            <div class='background'><center>
				<div class='text_back'>
					<img src='../assets/images/online_text.png'></img><br>
					<span class="text">ONLINE PHARMACY</span>
				</div></center>
				<div class='pharmacy_back'>
					<img src='../assets/images/login_back.png'></img>
				</div>
            </div>
        </div>
<script type="text/javascript">
	function kirish_login() {
		event.preventDefault()
	var login = document.getElementById('login1').value;
	var parol = document.getElementById('password1').value;
	$('.error').html(`<div class="alert alert-info" role="alert">
 	Kuting...
</div>
`);
	if (login == "" || parol=='') {
		$('.error').html(`<div class="alert alert-warning" role="alert">
  Formani to'ldiring!
</div>
`);
	}else {

$.post("../sitega/in_login.php",
  {
    login: login,
    parol: parol
  },
  function(data, status){
    console.log(data)
    if (data !=='xato') {
    	$('.error').html(`<div class="alert alert-success" role="alert">
  								<i class='fas fa-check-circle'></i> Muvaffaqiyatli
							</div>
		`);
    	console.log(data)
    	window.localStorage.setItem("user", data);
    	window.location.href='../index.php';
    }else {
    	$('.error').html(`<div class="alert alert-warning" role="alert">
  Parol yoki login xato!
</div>
`);
    }
  });
	}

	 
}
function registr() {
	window.location.href='signup.php'
}
console.log(window.localStorage.getItem("user"))
</script>
<?php
	include '../includes/footer.php';
?>