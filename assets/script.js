/*  */
var userID = localStorage.getItem("user");



  function wait_onload() {
   
    $('absCenter').fadeOut();
    $(".body_wrapper1").fadeOut()
    $('.selectpicker').selectpicker();
    optomlarList()
    get_search2()
  }
    


var prays_list;
var dorinarxi;
var jami;
var dorisoni = 1;
var doriID;
var korzina_ID
let korzina_list;
let buyurtma_list
function filterOpen() {
  $(".filter_container").toggle();

}

/*  filter options */



function get_search(page = 1) {
    $("#home_page").css("display", 'none')
    $("#home").fadeIn()
    $('.absCenter').fadeIn()
    var min = $('#min').val();
    var foiz = $("input[name='foiz']:checked").val()
    var vil = $('#region :selected').val()
    var max = $('#max').val();
    if (foiz == undefined) {
            foiz = 1
    }
    if (isNaN(vil)) {
        vil = '0';
    }
    if (isNaN(min) || min == '') {
        min = '0'
    }
    if (isNaN(max) || max == '') {
        max = '0'
    }
	var malumot = $('#malumot').val();
  $("#malumot1").val(malumot);
	$.get(`./sitega/get_srch.php?malumot=${malumot}&page=${page}&vil=${vil}&foiz=${foiz}&min=${min}&max=${max}`,
  function(data, status){
    
    if (data == 'no') {
      console.log(data)
        $('#myTable').html("")
        $('#soni').html("")
        $('.nat_as').append(`
                <center><div class="alert alert-warning alert-dismissible fade show">
    <strong>Xato!</strong> Bunday ma'lumot topilmadi.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div></center>
            `)
        $(".pagination").fadeOut()
    }
    
    
 
    if (data != 'no') {
        $(".alert").fadeOut()
        $('#soni').html("")
    $("#myTable").fadeOut();
    $("#myTable").html("")
        data = JSON.parse(data)
        prays_list = data[1];
        var soni = data[0].soni;
        malumot = lat_to_cyr(malumot);
        data = data[1].map(function(obj) {
          var newObj = {}
          newObj.optomchi = obj.optomchi.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
          newObj.tovar = obj.tovar.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
          newObj.firma_nomi = obj.firma_nomi.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
           newObj.narxi = obj.narxi
           newObj.vil = obj.vil
           newObj.telefon = obj.telefon
           newObj.id = obj.id
           return newObj
        })
        $('#soni').html(soni);
        $("#myTable").fadeIn();
    	for (var i = 0; i < data.length; i++) {
    		$('#myTable').append(`<tr ${!user ? "data-toggle=\"modal\" data-target=\"#exampleModalsignout\"": null} onclick='openModal(${data[i].id})'>
    				  	<td>${i+((page - 1) * 20) + 1}</td>
    <td>${data[i].optomchi}</td>
    <td>${data[i].tovar}</td>
    <td style='text-align: right; min-width: 60px'><b>${Math.floor(data[i].narxi).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")}</b></td>
    <td>${data[i].firma_nomi}</td>
    <td>${data[i].vil}</td>
    <td>${data[i].telefon}</td>
    </tr>
    			`)
    	}
        
         $("html, body").animate({ scrollTop: '10px' }, "slow");

        pagination(page, soni);
    }
    $('.filter_container').fadeOut()
        $('.absCenter').fadeOut()
  });
}


function get_search2(page = 1) {
    $('.absCenter').fadeIn()
    var min = $('#min').val();
    var foiz = $("input[name='foiz']:checked").val()
    var vil = $('#region :selected').val()
    var max = $('#max').val();
    if (foiz == undefined) {
            foiz = 1
    }
    if (isNaN(vil)) {
        vil = '0';
    }
    if (isNaN(min) || min == '') {
        min = '0'
    }
    if (isNaN(max) || max == '') {
        max = '0'
    }
  var malumot = $('#malumot').val();
  $("#malumot1").val(malumot);
  $.get(`./sitega/get_srch.php?malumot=${malumot}&page=${page}&vil=${vil}&foiz=${foiz}&min=${min}&max=${max}`,
  function(data, status){
    
    if (data == 'no') {
      console.log(data)
        $('#myTable').html("")
        $('#soni').html("")
        $('.nat_as').append(`
                <center><div class="alert alert-warning alert-dismissible fade show">
    <strong>Xato!</strong> Bunday ma'lumot topilmadi.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div></center>
            `)
        $(".pagination").fadeOut()
    }
    
    
 
    if (data != 'no') {
        $(".alert").fadeOut()
        $('#soni').html("")
    $("#myTable").fadeOut();
    $("#myTable").html("")
        data = JSON.parse(data)
        prays_list = data[1];
        var soni = data[0].soni;
        $('#soni').html(soni);
        $("#myTable").fadeIn();
      for (var i = 0; i < data[1].length; i++) {
        $('#myTable').append(`<tr ${!user ? "data-toggle=\"modal\" data-target=\"#exampleModalsignout\"": null} onclick='openModal(${data[1][i].id})'>
                <td>${i+((page - 1) * 20) + 1}</td>
    <td>${data[1][i].optomchi}</td>
    <td>${data[1][i].tovar}</td>
    <td style='text-align: right; min-width: 60px'><b>${Math.floor(data[1][i].narxi).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")}</b></td>
    <td>${data[1][i].firma_nomi}</td>
    <td>${data[1][i].vil}</td>
    <td>${data[1][i].telefon}</td>
    </tr>
          `)
      }
        

        pagination(page, soni);
    }
    $('.filter_container').fadeOut()
        $('.absCenter').fadeOut()
  });
}

function get_search1(page = 1) {
  var optom
  var vil
  var optomlar = $(".selectpicker1").val()
  var vils = $(".selectpicker").val() 
  console.log(vils.length)
  if (vils.length > 0) {
     vil = vils.join(",")
  }else {
      vil = 0;
  }
  if (optomlar.length > 0) {
     optom = optomlar.join(",")
  }else {
      optom = 0;
  }
  event.preventDefault()
    $('.absCenter').fadeIn()
    var min = $('#min').val();
    var foiz = $("input[name='foiz']:checked").val()
    var max = $('#max').val();
    if (foiz == undefined) {
            foiz = 1
    }
    if (isNaN(min) || min == '') {
        min = '0'
    }
    if (isNaN(max) || max == '') {
        max = '0'
    }
  var malumot = $('#malumot1').val();
  $.get(`./sitega/get_srch.php?malumot=${malumot}&page=${page}&vil=${vil}&foiz=${foiz}&min=${min}&max=${max}&optom_id=${optom}`,
  function(data, status){
    if (data == 'no' || data == 'o' || data == '{') {
        $('#myTable').html("")
        $('#soni').html("")
        $('.nat_as').append(`
                <center><div class="alert alert-warning alert-dismissible fade show">
    <strong>Xato!</strong> Bunday ma'lumot topilmadi.
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div></center>
            `)
        $(".pagination").fadeOut()
    }
    
    
 
    if (data != 'no') {

        $(".alert").fadeOut()
        $('#soni').html("")
    $("#myTable").fadeOut();
    $("#myTable").html("")
        data = JSON.parse(data)

        prays_list = data[1];
        var soni = data[0].soni;
        malumot = lat_to_cyr(malumot);
        data = data[1].map(function(obj) {
          var newObj = {}
          newObj.optomchi = obj.optomchi.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
          newObj.tovar = obj.tovar.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
          newObj.firma_nomi = obj.firma_nomi.replace(new RegExp(malumot,'i'),"<b class='orange'>"+malumot+"</b>")
           newObj.narxi = obj.narxi
           newObj.vil = obj.vil
           newObj.telefon = obj.telefon
           newObj.id = obj.id
           return newObj
        })
        $('#soni').html(soni);
        $("#myTable").fadeIn();
      for (var i = 0; i < data.length; i++) {
        $('#myTable').append(`<tr ${!user ? "data-toggle=\"modal\" data-target=\"#exampleModalsignout\"": null} onclick='openModal(${data[i].id})'>
                <td>${i+((page - 1) * 20) + 1}</td>
    <td>${data[i].optomchi}</td>
    <td>${data[i].tovar}</td>
    <td style='text-align: right; min-width: 60px'><b>${Math.floor(data[i].narxi).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")}</b></td>
    <td>${data[i].firma_nomi}</td>
    <td>${data[i].vil}</td>
    <td>${data[i].telefon}</td>
    </tr>
          `)
      }
        
         $("html, body").animate({ scrollTop: '10px' }, "slow");

        pagination(page, soni);
    }
    $('.filter_container').fadeOut()
        $('.absCenter').fadeOut()
  });
}

/* Pagination */

function nextPage(x) {
    get_search1(x);
}

function pagination(page, soni) {
    var page_numbers = Math.ceil(soni / 20);
    var start;
    var end = page + 3;
    if (page == 1) {
        start = 1;
    }
    if (page == 2) {
        start = page - 1;
    }
    if (page == 3) {
        start = page - 2;
    }
    if (page > 3) {
        start = page - 3;
    }

    if (end > page_numbers) {
        end=page_numbers;
    }
    if (end < page_numbers) {
        end = page + 3;
    }
    $(".pagination").html("")
    $('.pagination').append(`<li class="page-item rounded" onclick="nextPage(1)">
      <a class="page-link" href='#!' aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>`)

    for (var i = start; i < end +1; i++) {
        $('.pagination').append(`
                  
    <li style='cursor: pointer' class="page-item rounded ${page == i ? 'active' : ''} ml-2" onclick="nextPage(${i})" ><a class="page-link">${i}</a></li>

            `)
    }
    $('.pagination').append(`<li class="page-item ml-2" onclick="nextPage(${page_numbers})">
             <a class="page-link" style='background-color: var(--main-color);' href="#!" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a></li>
        `)

    $('.pagination').fadeIn();


}

// function sotib_olish(x) {
//     var dori = prays_list.filter(pray => pray.id == x)
//     console.log(dori[0])
//     openModal()
// }
function modalClose() {
    $('.body_wrapper').fadeOut()
    $('.modal_buyurtma').fadeOut();
    $('.ozgartir').fadeOut();
}
function openModal(x) {
      if (user) {

                  var dori = prays_list.filter(pray => pray.id == x)
    
    doriID = x;

    $('.info1').html(`
             <h3 style="color: var(--main-color)">${dori[0].tovar}</h3>
        <h5>Ишлаб чиқарувчи: <span style="color: var(--main-color)"> ${dori[0].firma_nomi}</span></h5>
        <h5>Оптомчи: <span style="color: var(--main-color)">${dori[0].optomchi}</span></h5>
        <h5>Манзил: <span style="color: var(--main-color)">${dori[0].vil}</span></h5>
        `)
    $('.malumot').html(`
            <h6>Яроқлилик муддати: <span style="color: orange">${dori[0].time}</span></h6>
          <h6>Қўшиоган вақти: <span style="color: orange">${dori[0].time}</span></h6>
          <h6>Ўлчов тури: <span style="color: orange">${dori[0].turi}</span></h6>
          <h6>Нархи: <span style="color: orange" id="dorinarxi">${dori[0].narxi} </span>cўм</h6>
          <div class="count mt-3"><center><h6 style="color: var(--main-color)">Буюртма сони</h6></center>
          
          <div class="count_container mt-1"> 
          <div class="minus" onclick="minus('dm')"><i class="fas fa-minus" aria-hidden="true"></i></div>
          <div  ><input style='-moz-appearance: textfield !important;, -webkit-appearance: none !important;' onchange='count_jami()' max='10' min='1' style='outline: none !important;' class="num_container" id="doricount" type="number" value=1></div>
          <div class="plus" onclick="plus('dp')"><i class="fas fa-plus" aria-hidden="true"></i></div>
        </div>
        <div class="buyurtma_soni mt-2"><h5>Жами: <span id="jami_narxi" style="color: orange">${dori[0].narxi}</span> cўм</h5></div>
        </div>
        `)
    $('.body_wrapper').fadeIn()
    $('.modal_buyurtma').fadeIn();
    dorinarxi = document.getElementById('dorinarxi').innerHTML;
    dorinarxi = parseInt(dorinarxi * 1)    
      }else {
        modalClose();
        not_signed()
      }
    
}



/* korzina */
function openKorzina() {
    $('.nav-item').removeClass('active');
    $('.korzina').addClass('active')
    $('#home').fadeOut(1)
    $('#optomlar').fadeOut(1)
    $('#buyurtma').fadeOut(1)
    $('.settings_container').fadeOut(1)
    $('#korzina').fadeIn(1000);
    get_korzina_info()
    console.log("koisend")
}
function openHome() {
    $('.nav-item').removeClass('active');
    $('.home').addClass('active')
    $('#korzina').fadeOut(1)
    $('#optomlar').fadeOut(1)
    $('#buyurtma').fadeOut(1)
    $('.settings_container').fadeOut(1)
    $('#home').fadeIn(1000);
}
function openSettings() {
    get_user_info()
    $('.nav-item').removeClass('active');
    $('.settings_container_link').addClass('active')
    $('#korzina').fadeOut(1)
    $('#home').fadeOut(1)
    $('#buyurtma').fadeOut(1)
    $('#optomlar').fadeOut(1)
    $('.settings_container').fadeIn()
}
function openOptomlar() {
    $('.nav-item').removeClass('active');
    $('.optomlar').addClass('active')
    $('#korzina').fadeOut(1)
    $('#home').fadeOut(1)
    $('#buyurtma').fadeOut(1)
    $('.settings_container').fadeOut(1)
    $('#optomlar').fadeIn()
}
function openBuyurtma() {
    get_tarix()
    get_tarix_items()
    $('.nav-item').removeClass('active');
    $('.buyurtma').addClass('active')
    $('#korzina').fadeOut(1)
    $('#home').fadeOut(1)
    $('.settings_container').fadeOut(1)
    $('#optomlar').fadeOut(1)
    $('#buyurtma').fadeIn()
}
function get_korzina_info() {
    $('.absCenter').fadeIn()
    get_korzina_users();
    $('.korzina_items').html(" ")
    $.get(`./sitega/get_korzina_info.php?us_id=${userID}`,
  function(data, status){
    if (data != 'no') {
      
       var data = JSON.parse(data);
       korzina_list = data;
       
       $('.absCenter').fadeOut()
       for (var i = 0; i < data.length; i++) {
        console.log(data[i].narxi)
           $('.korzina_items').append(`  <tr>
                <td>${i+1}</td>
              <td>${data[i].firma_nomi}</td>
              <td>${data[i].tovar}</td>
              <td>${Math.floor(data[i].narxi).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")}</td>
              <td>${data[i].soni}</td>
              <td>${data[i].summasi}</td>
              <td>${data[i].muddati}</td>
              <td class='kor_icon'><i onclick='edit_item(${data[i].id})' class="fas fa-edit"></i></td>
              <td class='kor_icon'><i data-toggle="modal" data-target="#exampleModalCenter" onclick='delete_item(${data[i].id})' class="fas fa-trash-alt"></i></td></tr>
            `)
       }
        
    }else {
      $('.absCenter').fadeOut()
    }
});
}

function buyurtma_qilish(id) {
    $('.body_wrapper').fadeOut()
    $('.modal_buyurtma').fadeOut()
    
    var dori = prays_list.filter(pray => pray.id == id)
     $.post("./sitega/in_korzina.php",
      {
        user_id: userID,
        tovar_id: id,
        nomi: dori[0].tovar,
        firamasi: dori[0].firma_nomi,
        narxi: dori[0].narxi,
        soni: dorisoni,
        srok: dori[0].time
      },
      function(data, status){
         toast('kor')
      });
}

function delete_item(x) {
    console.log(x)
        $('.modal-body').html(`
                <h3 style='color: red'><i class='fas fa-minus-circle'> </i> Rad etilsinmi?</h3>
            `)
        $('.modal-footer').html(`
                <button type="button" class="btn btn-secondary" onclick='del_korzina(${x})' data-dismiss="modal">Ha</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Yo'q</button>
            `)
}
function malum_korzina(tel_id) {
   $('.chap_body tr').removeClass("active")
    $('.malumbir'+tel_id).toggleClass("active")
    if (tel_id == 999999999) {
      var filter_korzina = korzina_list.filter(kor => kor.tel_id == '')
    }else {
      var filter_korzina = korzina_list.filter(kor => kor.tel_id == tel_id)
    }
    $('.korzina_items').fadeOut()
    $('.korzina_items').html("")
    for (var i = 0; i < filter_korzina.length; i++) {
           $('.korzina_items').append(`  <tr>
                <td>${i+1}</td>
              <td>${filter_korzina[i].firma_nomi}</td>
              <td>${filter_korzina[i].tovar}</td>
              <td>${Math.floor(filter_korzina[i].narxi).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")}</td>
              <td>${filter_korzina[i].soni}</td>
              <td>${filter_korzina[i].summasi}</td>
              <td>${filter_korzina[i].muddati}</td>
              <td><div class="chap_btn text-center" onclick='edit_item(${filter_korzina[i].id})'><i class="fas fa-edit"></i></div></td>
              <td><div data-toggle="modal" data-target="#exampleModalCenter" class="chap_btn text-center delete" onclick='delete_item(${filter_korzina[i].id})'><i class="fas fa-trash-alt"></i></div></td></tr>
            `)
       }
       $('.korzina_items').fadeIn()
     
}
function sign_out() { 
        $('.modal-body').html(`
                <h3 style='color: red'><i class="fas fa-sign-in-alt"></i> Saytni tark etasizmi?</h3>
            `)
        $('.modal-footer').html(`
                <button type="button" class="btn btn-danger" onclick='chiqish()' data-dismiss="modal">Ha</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Yo'q</button>
            `)
}
function chiqish() {
  window.localStorage.removeItem("user")
  window.location.href='index.php'
}
function kirish() {
  window.location.href='includes/login.php'
}
function not_signed() {
  console.log("kir")
  $('.body_sign').html(`
                <h3 class='text-success'><i class='fas fa-sign-in-alt'> </i> Iltimos oldin tizimga kiring</h3>
            `)
        $('.footer_sign').html(`
                <button type="button" class="btn btn-secondary" onclick='kirish()' data-dismiss="modal">Kirish</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Yo'q</button>
            `)
}
function del_korzina(id){
    $.post("./sitega/del_korzina.php",
      {
        id: id,
        
      },
      function(data, status){
        toast('ochir')
       get_korzina_info()
      });
}
function get_korzina_users() {
   $('.chap_body').html("")
     $.post("./sitega/get_korzina.php",
      {
        us_id: userID
        
      },
      function(data, status){
        if (data !='no') {
          data = JSON.parse(data)
      
       for (var i = 0; i < data.length; i++) {
        if (data[i].tel_id) {
          var tel_id = data[i].tel_id
        }else {
          tel_id = '999999999'
        }
            $('.chap_body').append(`
                     <tr id='korzina_user' class=${"malumbir"+tel_id} onclick='malum_korzina(${tel_id})'>
              <td>${i+1}</td>
              <td>${data[i].fio}</td>
              <td>${data[i].soni}</td>
              <td>${data[i].summasi}</td>
            </tr>
                `)
       }
        }
        if (data == 'no') {
          $('.absCenter').fadeOut()
        }
       
      });

}

function exportToExcel(){
    $("#korzina_list").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "pricelar ro'yxati", //do not include extension
    fileext: ".xls" // file extension
  }); 
}

function toast(x) {
      if (x == "ochir") {
        $("#toast").html(`
        
    <div class="toast-header" style="color: var(--main-color)">
      Bildirishnoma
    </div>
    <div class="toast-body">
      <h6 ><i class='fas fa-check'> </i> Savadchadan o'chirldi</h6>
    </div>
  
      `)
      }else if(x == 'kor') {
        $("#toast").html(`
        
    <div class="toast-header" style="color: var(--main-color)">
      Bildirishnoma
    </div>
    <div class="toast-body">
      <h6 ><i class='fas fa-check'> </i> Savadchaga saqlandi</h6>
    </div>
  
      `)
      }else if(x == 'ozg') {
        $("#toast").html(`
        
    <div class="toast-header" style="color: var(--main-color)">
      Bildirishnoma
    </div>
    <div class="toast-body">
      <h6 ><i class='fas fa-check'> </i> O'zgarishlar saqlandi.</h6>
    </div>
  
      `)
      }
    
    $('.toast').toast('show');
}
function edit_item(id) {
    var dori = korzina_list.filter(pray => pray.id == id)
    korzina_ID = id;

    $('.info1').html(`
             <h3 style="color: var(--main-color)">${dori[0].tovar}</h3>
        <h5>Ишлаб чиқарувчи: <span style="color: var(--main-color)"> ${dori[0].firma_nomi}</span></h5>
        
        `)
    $('.malumot').html(`
            
          
          <h6>Нархи: <span style="color: orange" id="dorinarxi">${dori[0].narxi} </span>cўм</h6>
          <div class="count mt-3"><center><h6 style="color: var(--main-color)">Буюртма сони</h6></center>
          
          <div class="count_container mt-1"> 
          <div class="minus" onclick="minus('korm')"><i class="fas fa-minus" aria-hidden="true"></i></div>
          <div id="korzinacount" class="num_container">${dori[0].soni}</div>
          <div class="plus" onclick="plus('korp')"><i class="fas fa-plus" aria-hidden="true"></i></div>

        </div>
        <div class="buyurtma_soni mt-2"><h5>Жами: <span id="jami_kor" class='jami_kor' style="color: orange">${dori[0].narxi}</span> cўм</h5></div>
        </div>
        `)
    $('.body_wrapper').fadeIn()
    $('.ozgartir').fadeIn();
    dorinarxi = document.getElementById('dorinarxi').innerHTML;
    dorinarxi = parseInt(dorinarxi)
}
function buyurtma_ozgartir(x){
  var doricount = $('.num_container').html();
  doricount = parseInt(doricount);

     $.post("./sitega/up_korzina.php",
      {
        ozg_id: x,
        soni: doricount
      },
      function(data, status){
        modalClose()
        $('.toast-body').html(`
                <h6 ><i class='fas fa-trash-alt'> </i> Savadchadan o'chirildi</h6>
          `)
         toast()
         get_korzina_info()
      });
  
}

function minus(x) {
    var kompcount;
    
    var telcount;
    if (x == 'km') {
        var count = document.getElementById('compcount').innerHTML
        count = parseInt(count)
        count -=1;
        document.getElementById('compcount').innerHTML = count;
        kompcount = count;
    }
    if (x == 'tm') {
        var count = document.getElementById('telcount').innerHTML
        count = parseInt(count)
        count -=1;
        document.getElementById('telcount').innerHTML = count;
        telcount = count;
    }
    if (x =='dm') {
        var count = document.getElementById('doricount').value
        count = parseInt(count)
        count -=1;
        document.getElementById('doricount').value = count;
        dorisoni = count;
        jami = dorinarxi * dorisoni
        jami = Math.floor(jami).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        document.getElementById('jami_narxi').innerHTML = jami
    }
    if (x =='korm') {
        var count = document.getElementById('korzinacount').innerHTML
        count = parseInt(count)
        count -=1;
        $('.num_container').html(count)
        dorisoni = count;
        jami = dorinarxi * dorisoni
        jami = Math.floor(jami).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        $('.jami_kor').html(jami);
    }

}
function plus(x) {
    if (x == 'kp') {
        var count = document.getElementById('compcount').innerHTML
        count = parseInt(count)
        count +=1;
        document.getElementById('compcount').innerHTML = count;
        kompcount = count;
    }
    if (x == 'tp') {
        var count = document.getElementById('telcount').innerHTML
        count = parseInt(count)
        count +=1;
        document.getElementById('telcount').innerHTML = count;
        telcount = count;
    }
    if (x =='dp') {
        var count = document.getElementById('doricount').value
        count = parseInt(count)
        count +=1;
        document.getElementById('doricount').value = count;
        dorisoni = count;        jami = dorinarxi * dorisoni
        jami = Math.floor(jami).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        document.getElementById('jami_narxi').innerHTML = jami
        
    }
     if (x =='korp') {
        var count = document.getElementById('korzinacount').innerHTML
        count = parseInt(count)
        count +=1;

        $('.num_container').html(count)
        dorisoni = count;
        jami = dorinarxi * dorisoni
        jami = Math.floor(jami).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
        $('.jami_kor').html(jami)
    }
}
function count_jami() {
  dorisoni = document.getElementById("doricount").value
  jami = dorinarxi * dorisoni
  jami = Math.floor(jami).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ")
  document.getElementById('jami_narxi').innerHTML = jami
}
$( "#search_form" ).submit(function( event ) {
  event.preventDefault();
});

function log_out() {
  window.localStorage.removeItem("user");
  window.location.reload()
}
function optomlarList() {
  if ($(".optomlar_items").html() == "" ){
  
  }
  $.post("./sitega/get_users.php",
      {
        us_id: userID
      },
      function(data, status){
        data = JSON.parse(data);
        $(".optomlar_items").html("")
        var optomlar=""
        for (var i = 0; i < data.length; i++) {
                  var optom = `<option ${"value='"+data[i].id+"'"}>${data[i].nomi}</option>`
                  optomlar += optom

            $(".optomlar_items").append(`
              <tr>
                <td>${data[i].nomi}</td>
                <td>${data[i].vil}</td>
                <td>${data[i].shah}</td>
                <td>${data[i].manzil}</td>
                <td>${data[i].tel1} ${data[i].tel2}</td>
                <td>${data[i].vaqti}</td>
                ${data[i].file_nomi ? "<td><a target='_blank' href='../apteka_price/optomlar/files/"+data[i].file_nomi+"'><i style='font-size: 16px; color: var(--main-color);' class=\"fas fa-file-download\"></i></a></td>" : '<td></td>'}
              </tr>
          `)
        }
        $("#optom_list").html(`<label style="font-size: 16px; color: #09AC69;">Оптом<!-- тангланг --></label>
        <select style="border: 1.5px solid #09AC69 !important;"  class="selectpicker1" title="Барчаси" multiple>${optomlar}</select>`)
        $('.selectpicker1').selectpicker();

        $(".absCenter").fadeOut()
        
      });
}

/* tarix */
function get_tarix() {
  $.post("./sitega/get_tarix.php",
      {
        us_id: userID
      },
      function(data, status){
        if (data != 'no') {
        data = JSON.parse(data);

        
        $(".chap_body_buyurtma").html("")
        for (var i = 0; i < data.length; i++) {
            var color, icon
            switch(data[i].holati){
              case '2': 
              color= "style='color:red;'";
              icon = "class='fas fa-times-circle'";
              break;
              case '1': 
               color= "style='color:mediumseagreen;'";
              icon = "class='fas fa-check-double'";
              break;
              case '0': 
               color= "style='color: mediumseagreen;'";
              icon = "class='fas fa-dot-circle'";
              break;
            }
            $(".chap_body_buyurtma").append(`
              <tr ${"class='buy"+data[i].id+"'"} onclick="malum_buyurtma(${data[i].id})">
                ${"<td "+color+"><i "+icon+"></i></td>"}
                <td>${i+1}</td>
                <td>${data[i].vaqti}</td>
                <td>${data[i].soni}</td>
                <td>${data[i].summasi}</td>
                <td>${data[i].id}</td>
              </tr>
          `)
        }
        }
        
        
      });
}

function get_tarix_items() {
  $(".absCenter").fadeIn()
  $.post("./sitega/get_tarix_info.php",
      {
        us_id: userID
      },
      function(data, status){
        if (data != 'no') {
        data = JSON.parse(data);
        buyurtma_list = data
        
        $(".tarix_items").html("")
        console.log(data)
        for (var i = 0; i < data.length; i++) {
          var color, icon
            switch(data[i].holati){
              case '2': 
              color= "style='color:red;'";
              icon = "class='fas fa-times-circle'";
              break;
              case '1': 
               color= "style='color:mediumseagreen;'";
              icon = "class='fas fa-check-double'";
              break;
              case '0': 
               color= "style='color: mediumseagreen;'";
              icon = "class='fas fa-dot-circle'";
              break;
            }
            $(".tarix_items").append(`
              <tr>
               ${"<td "+color+"><i "+icon+"></i></td>"}
                <td>${i+1}</td>
                <td>${data[i].firma_nomi}</td>
                <td>${data[i].nomi}</td>
                <td>${data[i].narxi}</td>
                <td>${data[i].soni}</td>
                <td>${data[i].summasi}</td>
                <td>${data[i].srok}</td>
                <td>${data[i].firmasi}</td>
                <td>${data[i].turi}</td>
                <td>${data[i].manzil}</td>
                <td>${data[i].tel1} ${data[i].tel2}</td>
              </tr>
          `)
        }
        }
        $(".absCenter").fadeOut()
        
        
      });
}

function korzina_send() {
  $(".absCenter").fadeIn()
   $.post("./sitega/in_zakaz.php",
      {
        user_id: userID
      },
      function(data, status){
        if (data=='ok') {
          openKorzina()
      }

    });
}

function del_all_korzina() {
  $(".absCenter").fadeIn()
   $.post("./sitega/del_all_korzina.php",
      {
        us_id: userID
      },
      function(data, status){
        if (data=='ok') {
          openKorzina()
      }

    });
}
function filterToggle() {
  $(".filter_area").fadeToggle()
  $(".filter").toggleClass("filter_btn")
  $(".fa-sort-amount-up").toggleClass("white")
}
function malum_buyurtma(id) {
     $('.chap_body_buyurtma tr').removeClass("active")
    $('.buy'+id).toggleClass("active")
    console.log(id)
      var data = buyurtma_list.filter(kor => kor.zakaz_raqam == id)
       console.log(data)
    $('.tarix_items').fadeOut()
    $('.tarix_items').html("")
   for (var i = 0; i < data.length; i++) {
          var color, icon
            switch(data[i].holati){
              case '2': 
              color= "style='color:red;'";
              icon = "class='fas fa-times-circle'";
              break;
              case '1': 
               color= "style='color:mediumseagreen;'";
              icon = "class='fas fa-check-double'";
              break;
              case '0': 
               color= "style='color: mediumseagreen;'";
              icon = "class='fas fa-dot-circle'";
              break;
            }
            $(".tarix_items").append(`
              <tr>
               ${"<td "+color+"><i "+icon+"></i></td>"}
                <td>${i+1}</td>
                <td>${data[i].firma_nomi}</td>
                <td>${data[i].nomi}</td>
                <td>${data[i].narxi}</td>
                <td>${data[i].soni}</td>
                <td>${data[i].summasi}</td>
                <td>${data[i].srok}</td>
                <td>${data[i].firmasi}</td>
                <td>${data[i].turi}</td>
                <td>${data[i].manzil}</td>
                <td>${data[i].tel1} ${data[i].tel2}</td>
              </tr>
          `)
        }
        $('.tarix_items').fadeIn()

}
function edit_info() {
   $("#info_btns").html(`
        <div onclick="save_info()" class="chap_btn" style="display: inline-block; margin-top: 10px; background-color: orange; width: 70%;">Сақлаш</div>
      </div>
    `)
  $("fieldset").css("border", "border: 2px solid rgb(9, 175, 107)")
  $(".sozlama_inputs").removeAttr("readonly")
  $("#vils_select").removeAttr("disabled")
  $("#shahs_select").removeAttr("disabled")
 
   $(".sozlama_inputs").first().focus()
   $(".f_field").css("border", '2px solid #09AF6B')
}
var all_vils 
var all_shahs

function get_user_info() {
  $(".absCenter").fadeIn()
  get_vils_and_shahs()
 
  
}

function get_vils_and_shahs() {
  $.get("./sitega/gt_viloyat.php", function(data, status){
        all_vils = JSON.parse(data)
        console.log(all_vils)
        $.get("./sitega/gt_shahar.php", function(data, status){
        all_shahs = JSON.parse(data)
            $.post("./sitega/get_user_info.php",
            {
              us_id: userID
            },
            function(data, status){
              data = JSON.parse(data);
              console.log(data)
                $("#fnomi").val(data[0].nomi)
                $("#manzil").val(data[0].manzil) 
                btel1 = data[0].tel1.replace(/\D+/g, '')
     .replace(/(\d{3})(\d{2})(\d{3})(\d{2})(\d{2})/, '($1) $2 $3-$4-$5');
     btel2 = data[0].tel2.replace(/\D+/g, '')
     .replace(/(\d{3})(\d{2})(\d{3})(\d{2})(\d{2})/, '($1) $2 $3-$4-$5');
                
                $("#tel1").val(btel1)

                $("#tel2").val(btel2)
                $("#vils_select").html("")
                for (var i = 0; i < all_vils.length; i++) {
                    $("#vils_select").append(`
                          <option ${data[0].vil_id==all_vils[i].id ? "selected" : null} value="${all_vils[i].id}">${all_vils[i].nomi}</option>
                      `)
                 }
                 set_shahs(data[0].vil_id, data[0].shah_id)
                 $(".absCenter").fadeOut()
              });
     });
   });
}
function set_shahs(id=null, shah_id = null) {

if (id == null) {
  id = $('#vils_select').val()
}

  var current_shahs = all_shahs.filter(shah => shah.vil_id == id);
  console.log(current_shahs)
  $("#shahs_select").html("")
   for (var i = 0; i < current_shahs.length; i++) {
            $("#shahs_select").append(`
              <option ${shah_id==current_shahs[i].id ? "selected" : null} value="${current_shahs[i].id}">${current_shahs[i].nomi}</option>
             `)
                 }

}

function save_info() {
  $(".absCenter").fadeIn()
  var fnomi = $("#fnomi").val();
  var vil_id=$("#vils_select").val()
  var shah_id = $("#shahs_select").val()
  var manzil = $("#manzil").val()
  var tel1 = $('#tel1').val().replace(/\D/g, "")
  var tel2 = $('#tel2').val().replace(/\D/g, "")
  console.log(fnomi,vil_id,shah_id,manzil,tel1,tel2)
  $.post("./sitega/up_reg.php",
  {
    nomi: fnomi,
    manzil: manzil,
    telefon: tel1,
    telefon2: tel2,
    vil_id: vil_id,
    shah_id: vil_id,
    user_id: userID
  },
  function(data, status){
    $(".absCenter").fadeOut()
    if (data == "ok") {
        toast("ozg")
    }
  });
  $("#info_btns").html(`
        <div onclick="edit_info()" class="chap_btn" style="display: inline-block; margin-top: 10px; width: 70%;">Ўзгартириш</div>
      </div>
    `)
  $("fieldset").css("border", "1.5px solid #BDBDBD")
  $(".sozlama_inputs").attr("readonly", 'readonly')
  $("#vils_select").attr("disabled", 'disabled')
  $("#shahs_select").attr("disabled", 'disabled')
}
/* simple functions */
function lat_to_cyr(entered_text) {
  entered_text = entered_text.replace(/a/g,'а');
  entered_text = entered_text.replace(/b/g,'б');
  entered_text = entered_text.replace(/c/g,'к');
  entered_text = entered_text.replace(/d/g,'д');
  entered_text = entered_text.replace(/e/g,'е');
  entered_text = entered_text.replace(/f/g,'ф');
  entered_text = entered_text.replace(/g/g,'г');
  entered_text = entered_text.replace(/h/g,'х');
  entered_text = entered_text.replace(/i/g,'и');
  entered_text = entered_text.replace(/j/g,'ж');
  entered_text = entered_text.replace(/k/g,'к');
  entered_text = entered_text.replace(/l/g,'л');
  entered_text = entered_text.replace(/m/g,'м');
  entered_text = entered_text.replace(/n/g,'н');
  entered_text = entered_text.replace(/o/g,'о');
  entered_text = entered_text.replace(/p/g,'п');
  entered_text = entered_text.replace(/q/g,'қ');
  entered_text = entered_text.replace(/r/g,'р');
  entered_text = entered_text.replace(/s/g,'с');
  entered_text = entered_text.replace(/t/g,'т');
  entered_text = entered_text.replace(/u/g,'у');
  entered_text = entered_text.replace(/v/g,'в');
  entered_text = entered_text.replace(/x/g,'х');
  entered_text = entered_text.replace(/y/g,'й');
  entered_text = entered_text.replace(/z/g,'з');
  entered_text = entered_text.replace(/o'/g,'ў');
  entered_text = entered_text.replace(/sh/g,'ш');
  entered_text = entered_text.replace(/ch/g,'ч');

  entered_text = entered_text.replace(/A/g,'А');
  entered_text = entered_text.replace(/B/g,'Б');
  entered_text = entered_text.replace(/C/g,'Ц');
  entered_text = entered_text.replace(/D/g,'Д');
  entered_text = entered_text.replace(/E/g,'Е');
  entered_text = entered_text.replace(/F/g,'Ф');
  entered_text = entered_text.replace(/G/g,'Г');
  entered_text = entered_text.replace(/H/g,'Х');
  entered_text = entered_text.replace(/I/g,'И');
  entered_text = entered_text.replace(/J/g,'Ј');
  entered_text = entered_text.replace(/K/g,'К');
  entered_text = entered_text.replace(/L/g,'Л');
  entered_text = entered_text.replace(/M/g,'М');
  entered_text = entered_text.replace(/N/g,'Н');
  entered_text = entered_text.replace(/O/g,'О');
  entered_text = entered_text.replace(/P/g,'П');
  entered_text = entered_text.replace(/Q/g,'Қ');
  entered_text = entered_text.replace(/R/g,'Р');
  entered_text = entered_text.replace(/S/g,'С');
  entered_text = entered_text.replace(/T/g,'Т');
  entered_text = entered_text.replace(/U/g,'У');
  entered_text = entered_text.replace(/V/g,'В');
  entered_text = entered_text.replace(/X/g,'Х');
  entered_text = entered_text.replace(/Y/g,'Й');
  entered_text = entered_text.replace(/Z/g,'З');
  entered_text = entered_text.replace(/Sh/g,'Ш');
  entered_text = entered_text.replace(/Ch/g,'Ч');

  return entered_text
}