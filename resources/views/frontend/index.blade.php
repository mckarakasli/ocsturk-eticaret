@extends('layouts.frontend')
@section('title')
Profesyonel Kahve hizmetleri
@endsection
@section('content')

<div class="hero_slider" style="background-image:url({{asset('frontend/image/headerback.png')}})">
    <div class="hero_slider_content padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="swiper mySwiper animate__animated animate__fadeInLeftBig">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="text_content_container">
                                 <h6 class="slider_text">ÜRÜN ALIMI SİZDEN, <span class="hero_text_two">KAHVE KÖŞENİZ BİZDEN!</span></h6><br>
                                <small>Profesyonel hizmetlerimizden ve kahve köşesi konseptlerimizden faylanamak için bize ulaşın.</small>
                               <br>
                                <button class="btn btn-primary slider_button">HEMEN TEKLİF AL</button>
                            </div>
                           
                          </div>
                               <div class="swiper-slide">
                            <div class="text_content_container">
                                 <h6 class="slider_text">KAHVE OTOMAT SERVİSLERİ</h6><br>
                                <small>Profesyonel Kahve otomatı servis Hizmetleri</small>
                                </div>
                           
                          </div>
                          <div class="swiper-slide">
                            <div class="text_content_container">
                                 <h6 class="slider_text">KAHVE OTOMAT SERVİSLERİ</h6><br>
                                <small>Profesyonel Kahve otomatı servis Hizmetleri</small>
                                </div>
                           
                          </div>
                            </div>
                            </div>
                              
                
            </div>
            <div class="col-lg-4" id="header_right_col">
                <img src="{{asset('frontend/image/heroimg.png')}}" class="img-fluid hero_slider_right_image animate__animated animate__fadeInRightBig" alt="">
            </div>
        </div>
    </div>
</div>
<section id="isleyis">
    <div class="isleyis_content padding animate__animated animate__fadeInLeftBig">
         <div class="section_title">
             <h6 class=""><span class="blackfont">Ne</span> yapıyoruz ?</h6>
              <p class="section_content">Çalışanlarınızın vazgeçilmez kahve molalarında çay kahve ihtiyaçlarını pratik ve hızlı bir şekilde karşılamalarını sağlıyoruz.</p>
             <div class="line mb-4"></div>
         </div>
         <div class="row">
             <div class="col-lg-4">
                 <div class="neyapiyoruz_card">
                     <i class="fa-solid fa-mug-saucer"></i>
                     <h6>ÜRÜN TEDARİĞİ</h6>
                     <p>Çay,Kahve ihtiyaçlarınız için profesyonel servis ve ürün hizmetleri sağlıyoruz.</p>
                 </div>
             </div>
             <div class="col-lg-4">
                 <div class="neyapiyoruz_card">
                     <i class="fa-solid fa-truck-fast"></i>
                     <h6>ÜCRETSİZ TESLİMAT</h6>
                     <p>Müşterilerimizin siparişlerini en geç 1 iş günü içerisinde ÜCRETSİZ teslim ediyoruz</p>
                 </div>
             </div>
                <div class="col-lg-4">
                 <div class="neyapiyoruz_card">
                    <i class="fa-solid fa-table-list"></i>
                     <h6>KAHVE KÖŞENİZ BİZDEN</h6>
                     <p>Özel standlarımızla şirketinizde ki kahve köşenizi tasarlıyoruz.</p>
                 </div>
             </div>
         </div>
    </div>
   
</section>

<section id="standlarimiz" class="mt-3" style="background-image: url({{asset('frontend/image/background.png')}})">
    <div class="isleyis_content padding">
         <div class="section_title">
             <h6><span class="blackfont">Neler</span> yaptık?</h6>
             <div class="line mb-4"></div>
             <p class="section_content">Hizmet verdiğimiz müşterilimizden görüntüler ve standlarımız yer almaktadır.</p>
         </div>
         <div class="row">
             @foreach($standlars as$data)
             <div class="col-lg-4 col-md-6">
                 <div class="stand_container mt-2">
                     <img src="{{asset($data->image)}}" class="img-fluid" alt="">
                     <h6>{{$data->title}}</h6>
                     <button class="btn btn-primary stand_detail_button">DETAY</button>
                 </div>
                
             </div>
             @endforeach
             
         </div>
    </div>
   
</section>

<section id="urunlerimiz" class="mt-3 mb-3">
    <div class="urunlerimiz_content padding animate__animated animate__fadeInLeftBig">
         <div class="section_title">
             <h6 class=""><span class="blackfont">En çok Tercih edilen</span> Ürünlerimiz</h6>
              <p class="section_content">Müşterilerimiz tarafından en çok talep edilen ürünlerimiz listelenmiştir. Tüm ürünlerimizi görmek için <a class="link_yonlendirme" href=" ">buradan</a> ulaşabilirsiniz.</p>
             <div class="line mb-4"></div>
         </div>
         <div class="row">
             @foreach($products as $data)
             <div class="col-xxl-3 col-xl-4 mt-2 col-md-4 col-sm-6 col-6">
                
               
                 <div class="home_product_card">
                    <img src="{{asset($data->image)}}" class="img-fluid home_product_image" alt="">
                     <a class="link_yonlendirme" href="{{route('productDetail',$data->slug)}}">
                    <h5>{{$data->title}}</h5>
                    </a>
                    <div class="home_product_price_container d-flex justify-content-end">
                        @if($data->regular_price !=NULL)
                           <h6 class="home_sale_price"><del>{{$data->sale_price}} ₺</del></h6>
                            <h6 class="home_regular_price">{{$data->regular_price}} ₺</h6>
                             @else
                               <h6 class="home_regular_price">{{$data->sale_price}} ₺</h6>
                               @endif
                        
                                </div>
                                <button product_id="{{$data->id}}"  class="btn add-to-cart add-to-cart-button">SEPETE EKLE</button>
                                @if($data->stock ==0)
                                <a href="" class="stokta-yok">STOKTA YOK</a>
                                @endif
                                <input id="regular_price" type="text" value="{{$data->regular_price}}" hidden>
                                @if($data->regular_price !=NULL)
                                <div class="indirimde">
                                    <h6>İNDİRİMLİ</h6>
                                </div>
                                @endif
                                @if($data->stock <= 3)
                                <div class="stok-bildirim">
                                    <p>Stokta kalan son {{$data->stock}} ürün</p>
                                </div>
                              
                               
                                @endif
                                
                            </div>
                        </div>
                        @endforeach
               
         </div>
    </div>
   
</section>

    
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.min.js" integrity="sha512-WlN87oHzYKO5YOmINf1+pSkbt4gm+lOro4fiSTCjII4ykJe/ycHKIaa9b2l9OMkbqEA4NxwTXAGFjSXgqEh19w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
       var swiper = new Swiper(".mySwiper", {});
       $(document).ready(function(){
       
     
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $('.add-to-cart').click(function(){
           
            id = $(this)[0].getAttribute('product_id');
            regular_price = $('#regular_price').val();
            qty = 1,
            
         
            $.ajax({
                type:"POST",
                url:"{{ route('addtocart','+id+') }}",
                data:{id:id,qty:qty},
                success:function(data){
                    console.log(data);
                  Swal.fire({
                    title: data.name,
                    text: qty + " adet Ürün Başarıyla sepetinize eklendi",
                    icon: 'success',
                    showCancelButton: true,
                    cancelButtonText: "Alışverişe Devam et",
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#198754',
                    confirmButtonText: 'Sepete Git'
                    
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href="http://127.0.0.1:8000/cart";
                    }else{
                        window.location.reload()
                    }
                    })
           
                 }
            })
        });
          })
</script>


