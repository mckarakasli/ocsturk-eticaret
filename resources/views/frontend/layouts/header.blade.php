<header>
 
    <div class="header_content container-fluid padding">
        <div class="row">
            <div class="col-lg-3 col-6">
                <a href="{{route('homePanel')}}">
                <div class="logo_container">
                <img src="{{asset('frontend/image/ocsturklogoson.png')}}" class="img-fluid header_logo" alt="">
                    </div>
                    </a>
            </div>
           <div class="col-xl-6 col-lg-6 col-md-5" id="web_search_container">
               <input type="text" class="form-control header_search_container" placeholder="Site içi arama yapın... Örn: Filtre Kahve">
               <div class="popularCategories d-flex">
                     <small><b>Hızlı Arama</b></small>
                      @foreach($categories as $data)
                     <div class="cat_item">{{$data->title}}</div>
                    
                     @endforeach
               </div>
              
           </div>
           <div class="col-lg-3 col-md-6 col-6">
               <div class="header_info_panel d-flex">
                <div class="header_info_icon d-flex login-button" id="user_icon">
                    <img src="{{asset('frontend/image/user.png')}}" alt="">
                    @if(!Auth::check())
                  <h6 class="">Giriş yap</h6>
                  @else
                  <li class="user_panel_container"><h6 class="login_user_name_text">{{Auth::user()->name}}</h6>
                        <ul class="user_panel_dropdown">
                            <li class="user_panel_dropdown_item"><a class="user_panel_dropdown_link" href="">Profilim</a></li>
                             <li class="user_panel_dropdown_item"><a class="user_panel_dropdown_link" href="">Siparişlerim</a></li>
                           <li class="user_panel_dropdown_item"><a class="user_panel_dropdown_link" href="">Çıkış yap</a></li>

                        </ul>
                    </li>
                  @endif
               </div>
                <a style="text-decoration: none" href="{{route('cart')}}">
                <div class="header_info_icon d-flex" id="cart_icon">
                   
                   <img src="{{asset('frontend/image/shopping-cart.png')}}" class="cart_icon"  alt="">
                   <h6>Sepetim</h6>
                   <div class="badge bg-primary">{{Cart::count()}}</div>
                  
               </div>
                </a>
             </div>
           </div>
            <div class="col-12 mt-3" id="mobil_search_container">
               <input type="text" class="form-control header_search_container" placeholder="Site içi arama yapın... Örn: Filtre Kahve">
               <div class="popularCategories d-flex">
                     <small><b>Hızlı Arama</b></small>
                     @foreach($categories as $data)
                     <div class="cat_item">{{$data->title}}</div>
                    
                     @endforeach
               </div>
              
           </div>   
        </div>
    </div>
    <div class="menubar">
        <div class="menubar_content padding d-flex justify-content-between">
            <i id="header_menu_button" class="fa-solid fa-bars"></i>
          <ul class="headermenu">
              <li class="headermenu-item"><a class="headermenu-link" href="{{route('homePanel')}}">Anasayfa</a></li>
              <li class="headermenu-item"><a class="headermenu-link" href="{{route('hakkimizda')}}">Hakkımızda</a></li>
              <li class="headermenu-item"><a class="headermenu-link" href="{{route('standlarimiz')}}">Standlarımız</a></li>
              <li class="headermenu-item"><a class="headermenu-link" href="{{route('urunlerimiz')}}">Ürünlerimiz</a></li>
              <li class="headermenu-item"><a class="headermenu-link" href="{{route('iletisim')}}">İletişim</a></li>
          </ul>
          <div class="socialIcons d-flex">
              <h6>Bizi Takip Edin!</h6>
               <i class="fa-brands fa-facebook-square"></i>
               <i class="fa-brands fa-twitter-square"></i>
               <i class="fa-brands fa-instagram"></i>
          </div>
         
        </div>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  
    $('.user_panel_container').hover(function(){
        $('.user_panel_dropdown').show();
    },function(){
         $('.user_panel_dropdown').hide();
    });
</script>





