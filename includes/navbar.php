<body onload="wait_onload()">
<nav class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand text-white mr-5" href="#">
    <img src="./assets/images/brand.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active home h_p" onclick="openHome()" data-toggle="collapse" data-target="#navbarSupportedContent">
        <a class="nav-link text-white " href="#"><i class="fa fa-fw fa-home"></i> Асосий <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item korzina cursor h_p" onclick="openKorzina()" data-toggle="collapse" data-target="#navbarSupportedContent">
        <a class="nav-link text-white" href='#!'><i class="fa fa-fw fa-shopping-cart korzina_icon"></i> Корзина</a>
      </li>
      <li class="nav-item buyurtma h_p" onclick="openBuyurtma()" data-toggle="collapse" data-target="#navbarSupportedContent">
        <a class="nav-link text-white" href="#"><i class="fa fa-fw fa-shipping-fast"></i> Буюртма</a>
      </li>
      <li class="nav-item optomlar h_p" onclick="openOptomlar()" data-toggle="collapse" data-target="#navbarSupportedContent">
        <a class="nav-link text-white" href="#"><i class="fa fa-fw fa-clipboard-list"></i> Оптомлар</a>
      </li>
      <li class="nav-item settings_container_link h_p" onclick="openSettings()" data-toggle="collapse" data-target="#navbarSupportedContent">
        <a class="nav-link text-white" href="#"><i class="fa fa-fw fa-tools"></i> Созламалар</a>
      </li>
      <li class="nav-item f-right" onclick="sign_out()" data-toggle="modal" data-target="#exampleModalCenter">
        <a class="nav-link text-white" href="#"><i class="fas fa-sign-out-alt"></i> Чиқиш</a>
      </li>
     
    </ul>
    <div class="h_list_con">
    <ul class="h_list">
      <li class="nav-item">
        <a class="nav-link text-white" href="includes/login.php"><i class="fas fa-sign-out-alt"></i> Кириш</a>
      </li>
    </ul>
    </div>
  </div>
  
</nav>
<div class="body_wrapper1">
    
</div>
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