<?php
	require("includes/header.php");
	include 'includes/navbar.php';
?>

<div id="home_page">
  <div class="home_page_container">
    <div class="home_search">
      <div class="brand pb-4">
        <img class="brand" src='assets/images/logo.png'></img>
      </div>
      <form id="search_form">
    <div class="form-inline my-2 my-lg-0">
      <div class="search_container">
        
       <!--  <div class="btn text-white my-2 my-sm-0" onclick="filterOpen()"><i class="fa fa-fw fa-sort-amount-up"></i></div> -->
         <input id="malumot"  type="search" placeholder="Қидирилаётган дори номини киритинг" aria-label="Аспирин">
      <button onclick="get_search()" class="btn text-white  my-2 my-sm-0"><i class="fa fa-fw fa-search"></i></button>
    
      </div>
     
    </div></form>
    </div>
  </div>
</div>
<div id="home">
  <div class="search_container_home mt-2">
  <form id="search_form1" style="margin: 0 auto;">
    <div class="form-   inline my-2 my-lg-0">
      <div class="search_container w-475">
        
        <div class="btn filter text-white my-2 my-sm-0 filter_btn" onclick="filterToggle()"><i class="fa fa-fw fa-sort-amount-up white"></i></div>
         <input class="w-370" id="malumot1"  type="search" placeholder="Қидирилаётган дори номини киритинг" aria-label="Аспирин">
      <button onclick="get_search1()" class="btn text-white  my-2 my-sm-0"><i class="fa fa-fw fa-search"></i></button>
    
      </div>
     
    </div></form>
  </div>
    <div class="filter_area">
      <div class="container">
        <div class="mr-2 d-flex" style="flex-direction: column;">
        <label style="font-size: 16px; color: #09AC69;">Вилоят<!-- тангланг --></label>
        <select style="border: 1.5px solid #09AC69 !important;" class="selectpicker" title="Барчаси" multiple>
          <option value="14">Тошкент шаҳри</option>
          <option value="13">Хоразм вилояти</option>
          <option value="12">Фарғона вилояти</option>
          <option value="8">Самарқанд вилояти</option>
          <option value="1">Қорақалпоғистон Республикаси</option>
          <option value="2">Андижон вилояти</option>
          <option value="4">Жиззах вилояти</option>
          <option value="5">Қашқадарё вилояти</option>
          <option value="6">Навоий вилояти</option>
          <option value="7">Наманган вилояти</option>
          <option value="9">Сурхондарё вилояти</option>
          <option value="10">Сирдарё вилояти</option>
          <option value="11">Тошкент вилояти</option>
          <option value="3">Бухоро вилояти</option>
        </select>
      </div>
      <div id="optom_list" class="mr-2 d-flex" style="flex-direction: column;">
        

          
        
      </div><div class="mr-2"><label style="font-size: 16px; color: #09AC69;">Нархи<!-- тангланг --></label>
      <div class="d-flex" >
      
      <input  id="min" type="number" min='0' style="border: 2px solid #09AC69 !important;" class="form-control  filter_narxi mr-2"  placeholder="дан">
      <input id="max" max="10000000" min='0' type="number" style="border: 2px solid #09AC69 !important;" class="form-control  filter_narxi"  placeholder="гача">
      </div></div>
      <div>
      <label style="font-size: 16px; color: #09AC69;">Тўлов тури<!-- тангланг --></label>
      <div class="filter_radio">
          <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="foiz" id="inlineRadio1" value="1" checked="checked">
  <label class="form-check-label" for="inlineRadio1">100%</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="foiz" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">50%</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="foiz" id="inlineRadio3" value="3">
  <label class="form-check-label" for="inlineRadio3">25%</label>
</div>
      
      </div>
    </div>
      </div>
    </div>
    
<div class="natijalar" style="font-size: 12px;">
			Натижалар: <h6 class="taxmin">Тахминан <span id="soni" style="color: red; font-weight: bold; ">0 </span> та дори </h6> учун натижалар кўрсатилмоқда
		</div>
    <div class="d-flex align-items-center flex-column p-2">
		<div class="table-responsive-sm nat_as">
			<table class="table">
        <thead>
				<tr>
    <th>№</th>
    <th>Оптомчи</th>
    <th>Товар номи</th>
    <th>Нархи</th>
    <th>Фирма</th>
    <th>Манзили</th>
    <th>Телефон</th>
  </tr>
  </thead>
  <tbody id="myTable">
    <div class="absCenter">
    <div class="loaderPill">
        <div class="loaderPill-anim">
            <div class="loaderPill-anim-bounce">
                <div class="loaderPill-anim-flop">
                    <div class="loaderPill-pill"></div>
                </div>
            </div>
        </div>
        <div class="loaderPill-floor">
            <div class="loaderPill-floor-shadow"></div>
        </div>
        <div class="loaderPill-text">Yuklanmoqda...</div>
    </div>
</div>
  </tbody>
			</table>
    </div>
         <nav class="mt-lg-5 mt-sm-0" aria-label="Page navigation example">
  <ul class="pagination">
  
  </ul>
</nav>
</div>
		


 <div class="modal_buyurtma">
    <div class="modal_yopish" onclick="modalClose()"><h5 style="font-weight: 500">Буюртма бериш</h5><i style="display: block;" class="fas fa-times-circle" aria-hidden="true"></i></div>
    <div class="modal_container">
      <div class="info1">

      </div>
      <div class="info2">
        <div class="malumot mt-3">
 
        </div>
        <div class="modal_rasm">
          <img src="assets/images/dori.png">
        </div>
      </div>
      <div class="modal_btn mt-3">
        <div class="modal_chiqish_btn" onclick="modalClose()">Чиқиш</div>
        <div class="modal_buyurtma_btn" onclick="buyurtma_qilish(doriID)">Буюртма</div>
      </div>
    </div>
  </div>
  <div class="body_wrapper" onclick="modalClose()">
    
  </div>
</div>

<div id="korzina">
  <div class="main_container">
    <div class="chap_container">
      <div class="gruppalash">
      <label style="color: var(--main-color)">Группалаш тури</label>
      <select>
        <option>Фойдаланувчилар б</option>
      </select>
      </div>
      <div class="chap_btns mt-3">
        <div class="chap_btn" onclick="del_all_korzina()"><i class="fas fa-trash"> </i> Ўчириш</div>
        <div class="chap_btn" onclick="korzina_send()"><i class="fas fa-paper-plane"> </i> Жўнатиш</div>
        <a target="_blank" ><div class="chap_btn"  onclick="exportToExcel('korzina_list')"><i class="fas fa-file-csv"> </i> Ехсеlга экспорт</div>
      </div></a>
      <div class="chap_table">
        <label style="color: var(--main-color)">Фойдаланувчилар рўйхати</label>
        <table>
          <thead>
          <tr>
            <th>№</th>
            <th>ФИО</th>
            <th>Сони</th>
            <th>Суммаси</th>
          </tr>
        </thead>
          <tbody class="chap_body">
           
           
          </tbody>
        </table>
      </div>
    </div>
    <div class="line"></div>
    <div class="ong_container">
      <div class="ong_table table-responsive-sm">
        <label style="color: var(--main-color)">Буюртма товарлар </label>
        <table id="korzina_list">
          <thead>
          <tr>
            <th>№</th>
            <th>Фирма номи</th>
            <th>Товар номи</th>
            <th>Нархи</th>
            <th>Сони</th>
            <th>Суммаси</th>
            <th>Яроқлилик муддати</th>
            <th>Ўзгартириш</th>
            <th>Ўчириш</th>
          </tr>
          </thead>
          <tbody class="korzina_items" id="korzina_list">
          
               <div class="absCenter ">
    <div class="loaderPill">
        <div class="loaderPill-anim">
            <div class="loaderPill-anim-bounce">
                <div class="loaderPill-anim-flop">
                    <div class="loaderPill-pill"></div>
                </div>
            </div>
        </div>
        <div class="loaderPill-floor">
            <div class="loaderPill-floor-shadow"></div>
        </div>
        <div class="loaderPill-text">Yuklanmoqda...</div>
    </div>
</div>
              
            
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <div class="modal_buyurtma ozgartir">
    <div class="modal_yopish" onclick="modalClose()"><h5 style="font-weight: 500">Буюртма бериш</h5><i style="display: block;" class="fas fa-times-circle" aria-hidden="true"></i></div>
    <div class="modal_container">
      <div class="info1">

      </div>
      <div class="info2">
        <div class="malumot mt-3">
        
          
        </div>

        <div class="modal_rasm">
          <img src="assets/images/dori.png">
        </div>
      </div>
      <div class="modal_btn mt-3">
        <div class="modal_chiqish_btn" onclick="modalClose()">Чиқиш</div>
        <div class="modal_buyurtma_btn" onclick="buyurtma_ozgartir(korzina_ID)">Сақлаш</div>
      </div>
    </div>
  </div>
  <div class="body_wrapper" onclick="modalClose()">
    
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ogohlantirish!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal_body_korzina">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>  
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ogohlantirish!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalsignout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ogohlantirish!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body body_sign">
        ...
      </div>
      <div class="modal-footer footer_sign">
        
      </div>
    </div>
  </div>
</div>
<div id="optomlar">
  <div class="container mt-3 mb-4 table-responsive-sm">
  <center>
    <label style="color: var(--main-color)">Дастурдан фойдаланаётган оптомлар рўйхати </label>
  </center>  
        <table id="optomlar_list">
          <thead>
          <tr>
            <th>Фирма номи</th>
            <th>Вилояти</th>
            <th>Шахри</th>
            <th>Манзили</th>
            <th>Телефон рақами</th>
            <th>Прайс янгилаган</th>
            <th>Юклаш</th>
          </tr>
          </thead>
          <tbody class="optomlar_items">
          
              <div class="absCenter ">
    <div class="loaderPill">
        <div class="loaderPill-anim">
            <div class="loaderPill-anim-bounce">
                <div class="loaderPill-anim-flop">
                    <div class="loaderPill-pill"></div>
                </div>
            </div>
        </div>
        <div class="loaderPill-floor">
            <div class="loaderPill-floor-shadow"></div>
        </div>
        <div class="loaderPill-text">Yuklanmoqda...</div>
    </div>
</div>
              
            
          </tbody>
        </table>
        </div>
</div>
<div id="sozlamalar" class="settings_container" style="display: none;">
  <div class="user_info mt-2" style="width: 500px;">

 <fieldset class="mb-2 f_field">
  <legend class="w-auto">Фирма номи</legend>
  <input id="fnomi" class="sozlama_inputs" type="text" class="border-0" value='Verona' readonly>
 </fieldset>
 <fieldset class="mb-2">
  <legend class="w-auto">Вилоят</legend>
  <select disabled="disabled" onchange="set_shahs()" id="vils_select" class="sozlama_inputs" name="cars" id="cars">
    
</select>
 </fieldset>
 <fieldset class="mb-2">
  <legend class="w-auto">Шахар</legend>
  <select disabled="disabled" id="shahs_select" class="sozlama_inputs" name="cars" id="cars">

</select>
 </fieldset>
 <fieldset class="mb-2">
  <legend class="w-auto">Манзил</legend>
  <input id="manzil" class="sozlama_inputs" type="text" class="border-0" name="firma_nomi" value='Киргули мавзеси' readonly>
 </fieldset>
 <fieldset class="mb-2">
  <legend class="w-auto">Асосий телефон</legend>
  <input id="tel1" class="sozlama_inputs" type="tel" class="border-0" name="firma_nomi" value='90 160-80-90' readonly>
 </fieldset>
 <fieldset class="mb-2">
  <legend class="w-auto">Қўшимча телефон</legend>
  <input id="tel2" class="sozlama_inputs" type="tel" class="border-0" name="firma_nomi" value='33 510-95-95' readonly>
 </fieldset>
       <center id='info_btns' style='width: 100%;'> 
        <div onclick="edit_info()" class="chap_btn" style="display: inline-block; margin-top: 10px; width: 70%;">Ўзгартириш</div>
      </div>

    </center>
      <div class="company_info">
        <h2>Wise Pharm</h2>
        <p>Ушбу дастур "BALANS" vs "IMSOFT" фирмаси томонидан яратилинганб Хизматлар лицензияланган.</p><br>
        <p>Dasturning oylik to'lovi 50.000 so'm<br> to'lov siz xohlagan usulda(naqd, pul o'tkazmalari)</p><br>
        <h5>Aloqa uchun</h5>
        <h5>Tel: +998 93 974 05 50</h5>
        <h5>email: ahmadjonov.ibrohimjon@mail.ru</h5><br><br>

        <h6>Versiya 1.0</h6>  
        <div class="logo_small">
          <img src="assets/images/logo_small.png">
        </div>
      </div>
</div>
<div id="buyurtma">
  <div class="main_container">
    <div class="chap_container">
      <div class="chap_table">
        <label style="color: var(--main-color)">Фойдаланувчилар рўйхати</label>
        <table>
          <thead>
          <tr>
            <th></th>
            <th>№</th>
            <th>Вақти</th>
            <th>Сони</th>
            <th>Суммаси</th>
            <th>ID</th>
          </tr>
        </thead>
          <tbody class="chap_body_buyurtma">
           
           
          </tbody>
        </table>
      </div>
    </div>
    <div class="line"></div>
    <div class="ong_container">
      <div class="ong_table table-responsive-sm">
        <label style="color: var(--main-color)">Буюртмани товарлар </label>
        <table id="tarix_list">
          <thead>
          <tr>
            <th></th>
            <th>№</th>
            <th>Фирма номи</th>
            <th>Товар номи</th>
            <th>Нархи</th>
            <th>Сони</th>
            <th>Суммаси</th>
            <th>Яроқлилик муддати</th>
            <th>Ишлаб чиқарувчи</th>
            <th>Ўлчов бирлиги</th>
            <th>Манзили</th>
            <th>Телефон</th>
          </tr>
          </thead>
          <tbody class="tarix_items" id="korzina_list">
          
               <div class="absCenter ">
    <div class="loaderPill">
        <div class="loaderPill-anim">
            <div class="loaderPill-anim-bounce">
                <div class="loaderPill-anim-flop">
                    <div class="loaderPill-pill"></div>
                </div>
            </div>
        </div>
        <div class="loaderPill-floor">
            <div class="loaderPill-floor-shadow"></div>
        </div>
        <div class="loaderPill-text">Yuklanmoqda...</div>
    </div>
</div>
              
            
          </tbody>
        </table>
      </div>
    </div>
    </div>

<?php
	include 'includes/footer.php';
?>
</div>
<div class="toast " id="toast">
  
</div>

<script type="text/javascript">
  var user = localStorage.getItem('user');
  console.log(user)
  if (userID == null) {
  $(".navbar-nav").css("display", 'none');
  }

  if (userID) {
    $('#home_page').css("display", 'none');
    $("#home").css("display", 'block')
     $('.h_list_con').css("display", 'none');
    $(".navbar-nav").css("display", 'flex')
  }
  
</script>