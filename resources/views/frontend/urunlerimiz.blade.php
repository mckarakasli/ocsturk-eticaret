@extends('layouts\frontend')
@section('content')
<div class="page_content padding">
<div class="row">
    <div class="col-lg-3">
        <div class="product_filter_card card">
            <h6 class="filter_title">Ürün Kategorileri</h6>
            <hr>
             <ul class="categories_list">
            @foreach($categories_list as $data)
           
                <li class="categories_list_item"><a href="{{route('urunlerimiz',$data->slug)}}">{{$data->title}}</a></li>
                <div class="categories_line"></div>
         
        @endforeach
          </ul>
        </div>
        <div class="product_filter_card card">
            <h6 class="filter_title">Ürün Markaları</h6>
            <hr>
            <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Nescafe
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
            Jacobs
        </label>
        </div>
        </div>
         <div class="product_filter_card card">
            <h6 class="filter_title">Kargo duruma göre</h6>
            <hr>
            <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Aynı Gün Kargo
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
            2-3 iş gününde Kargo
        </label>
        </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
             @foreach($products as $data)
            
             <div class="col-xxl-3 col-xl-4 mt-2 col-md-4 col-sm-6 col-6">
                
                 <div class="home_product_card">
                     
                    <img src="{{asset($data->image)}}" class="img-fluid home_product_image" alt="">
                      <a class="links" href="{{route('productDetail',$data->slug)}}">
                    <h5>{{$data->title}}</h5>
                      </a>
                    <div class="home_product_price_container d-flex justify-content-end">
                        @if($data->regular_price !=NULL)
                           <h6 class="home_sale_price"><del>{{$data->sale_price}} ₺</del></h6>
                            <h6 class="home_regular_price">{{$data->regular_price}} ₺</h6>
                             @else
                             <input id="regular_price" type="text" value="{{$data->regular_price}}" hidden>
                               <h6 class="home_regular_price">{{$data->sale_price}} ₺</h6>
                               @endif
                        
                                </div>
                                <button product_id="{{$data->id}}"  class="btn add-to-cart add-to-cart-button">SEPETE EKLE</button>
                                @if($data->stock ==0)
                                <a href="" class="stokta-yok">STOKTA YOK</a>
                                @endif
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
                </div>
                </div>
    
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.7/swiper-bundle.min.js" integrity="sha512-WlN87oHzYKO5YOmINf1+pSkbt4gm+lOro4fiSTCjII4ykJe/ycHKIaa9b2l9OMkbqEA4NxwTXAGFjSXgqEh19w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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