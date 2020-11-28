		
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
.brand::after {
		content: "PHARM";
		position: relative;
		top: -20px;
		right: 7px;
		color: #3CAB81;
		font-size: 12px;
		font-weight: bold;
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
	padding:5px 15px !important;
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
<title>Registratsiya</title>
</head>
 <div class='container' style="padding: 0">
            <div class="login_area">
            	
			
			<div id="form" class="form">
				<form onsubmit="registr()"><input required="required" id="fnomi" class='mt-1' type='text' name='fnomi' placeholder='Фирма номи'><select required="required" onchange="vil_select()" id="vil" style="color: var(--main-color); font-weight: bold" class='mt-1' name='regions'><option value=''>Вилоятни тангланг</option>
						</select>
						<select required="required" style="color: var(--main-color); font-weight: bold" class='mt-1' name='district' id='district'>
						  <option value=''>Шахар / туман тангланг</option>
						  
						</select>
						<input id="manzil" class='mt-1' type='text' name='manzil' placeholder='Манзил' required='required'>
						<input id="tel1" class='mt-1' type='text' name='tel' placeholder='Асосий телефон' required='required'>
						<input id="tel2" class='mt-1' type='number' name='tel' placeholder='Телефон 2'>
						<input id="login" class='mt-1' type='text' name='fnomi' placeholder='Логин' required='required'>
				<input id="parol" class='mt-1' type='password' name='pasword' placeholder='Парол' required='required'>
				<input id="parol1" class='mt-1' type='password' name='pasword' placeholder='Паролни такрорланг' required='required'>
				<div class="error"></div>
				<div class="count_box mt-2">

				<div class="count">
					<center><h6 style="color: var(--main-color)">Компьютер сони</h6></center>
					<div class="count_container mt-1"> 
					<div class="minus" onclick="minus('km')"><i class="fas fa-minus"></i></div>
					<div id="compcount" class="num_container">1</div>
					<div class="plus" onclick="plus('kp')"><i class="fas fa-plus"></i></div>
				</div>
				</div>
				<div class="count"><center><h6 style="color: var(--main-color)">Телефон сони</h6></center>
					<div class="count_container mt-1"> 
					<div class="minus" onclick="minus('tm')"><i class="fas fa-minus"></i></div>
					<div id="telcount" class="num_container">1</div>
					<div class="plus" onclick="plus('tp')"><i class="fas fa-plus"></i></div>
				</div>
				</div>
				</div>
				<center class='mt-2'><button onclick="registr()" class="log_in">Регистрация</button>
					</form><span onclick="kirish()" class="mt-2 block reg">Кириш</span></center>
			</div>
		</div>
           
            <div class='background'>
				<div class='text_back'>
					<img src='../assets/images/online_text.png'></img><br>
					<span class="text">ONLINE PHARMACY</span>
				</div>
				<div class='pharmacy_back'>
					<img src='../assets/images/login_back.png'></img>
				</div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
var kompcount=1;
var telcount=1;
var vils = [];
var shahs = []
function minus(x) {
	
	if (x == 'km') {
		var count = document.getElementById('compcount').innerHTML
		count = parseInt(count)
		count -=1;
		kompcount = count;
		document.getElementById('compcount').innerHTML = count;
		
	}
	if (x == 'tm') {
		var count = document.getElementById('telcount').innerHTML
		count = parseInt(count)
		count -=1;
		document.getElementById('telcount').innerHTML = count;
		telcount = count;
	}
	if (x =='dm') {
		var count = document.getElementById('doricount').innerHTML
		count = parseInt(count)
		count -=1;
		document.getElementById('doricount').innerHTML = count;
		dorisoni = count;
		jami = dorinarxi * dorisoni
		document.getElementById('jami_narxi').innerHTML = jami
	}

}
function plus(x) {
	if (x == 'kp') {
		var count = document.getElementById('compcount').innerHTML
		count = parseInt(count)
		count +=1;
		kompcount = count;
		console.log(kompcount)
		document.getElementById('compcount').innerHTML = count;
		
	}
	if (x == 'tp') {
		var count = document.getElementById('telcount').innerHTML
		count = parseInt(count)
		count +=1;
		document.getElementById('telcount').innerHTML = count;
		telcount = count;
	}
	if (x =='dp') {
		var count = document.getElementById('doricount').innerHTML
		count = parseInt(count)
		count +=1;
		document.getElementById('doricount').innerHTML = count;
		dorisoni = count;
		jami = dorinarxi * dorisoni
		document.getElementById('jami_narxi').innerHTML = jami
	}
}
function registr() {
	event.preventDefault()
	var fnomi = $('#fnomi').val()
	var vil = $('#vil').val()
	var shah = $('#district').val()
	var manzil = $('#manzil').val()
	var tel1 = $('#tel1').val()
	var tel2 = $('#tel2').val()
	var login = $('#login').val()
	var parol = $('#parol').val()
	var parol1 = $('#parol1').val()
	console.log(fnomi,vil,manzil,tel1.length,login,parol,parol1,kompcount,telcount)
	if (parol !== parol1 ) {
		$(".error").html(`<div class="alert alert-danger" role="alert">
  Parol mos tushmadi!
</div>`)
	}else if(fnomi == '' ) {
		$(".error").html(`<div class="alert alert-danger" role="alert">
  Firma nomini kiriting!
</div>`)
	}else if(vil == '' ) {
		$(".error").html(`<div class="alert alert-danger" role="alert">
  Viloyatni tanlang!
</div>`)
	}else if(tel1 == '' || tel1.toString().length < 13 || tel1.toString().indexOf('+998') == -1 ) {
		$(".error").html(`<div class="alert alert-danger" role="alert">
  Telefon raqamni to'g'ri kiriting! +998904074676
</div>`)
	}else if(login == '' || parol=='') {
		$(".error").html(`<div class="alert alert-danger" role="alert">
  login va parolni kiriting!
</div>`)
	}else {
		$('.error').html(`
			    			<div class="alert alert-info" role="alert">
  								Kuting...
							</div>
			    		`)
		 $.post("../sitega/in_reg.php",
			  {
			    nomi: fnomi,
			    manzil: manzil,
			    telefon: "+"+tel1,
			    telefon2: tel2,
			    vil_id: vil,
			    shah_id: shah,
			    login: login,
			    parol: parol,
			    comp_soni: kompcount,
			    tel_soni: telcount
			  },
			  function(data, status){
			  	console.log(data)
			    if (data == 'a') {
			    	console.log("|frims")
			    	$('.error').html(`
			    			<div class="alert alert-danger" role="alert">
  								Bunday firma nomi mavjud
							</div>
			    		`)
			    }else if(data == 'b'){
			    	$('.error').html(`
			    			<div class="alert alert-danger" role="alert">
  								tel nomer bazada mavjud
							</div>
			    		`)
			    }else if(data == 'c') {
			    	$('.error').html(`
			    			<div class="alert alert-danger" role="alert">
  								Login band!
							</div>
			    		`)
			    }else {
			    	var set = setTimeout(function(){
			    		$('.error').html(`
			    			<div class="alert alert-success" role="alert">
  								<i class='fas fa-check-circle'></i> Muvaffaqiyatli
							</div>
			    		`)
			    		window.localStorage.setItem("user", data)
			    		window.location.href='../index.php'
			    	}, 1000)
			    }
			  });
	}
}

function get_vils_and_shahs() {
	$.get("../sitega/gt_viloyat.php", function(data, status){
    		vils = JSON.parse(data)

    		$.get("../sitega/gt_shahar.php", function(data, status){
    		shahs = JSON.parse(data)
    		append_vils()
 	 	});
 	 });
	

}
get_vils_and_shahs()
function append_vils() {

	for (var i = 0; i < vils.length; i++) {
		$('#vil').append(`
			<option ${"value='"+ vils[i].id+"'"}>${vils[i].nomi}</option>
		`)
	}
	
}
function vil_select() {
	var vil_id= $("#vil").val();
	console.log(vil_id)
	var current_shahs = shahs.filter(shah => shah.vil_id == vil_id);
	console.log(current_shahs)
	$("#district").html("")
	for (var i = 0; i < current_shahs.length; i++) {
		
		$("#district").append(`
				<option value="${current_shahs[i].id}">${current_shahs[i].nomi}</option>
			`)
	}
}
function kirish() {
	window.location.href='login.php'
}
</script>