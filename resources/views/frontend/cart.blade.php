@extends('layouts.frontend')
@section('content')
<div class="page_content padding">
  <div class="cart_detail_container">
    
    @if(Cart::count()==0)
    <div class="cart_empty_container card">
      <i class="fa-solid fa-circle-exclamation"></i>
      <h6> SEPETİNİZDE ÜRÜN BULUNMAMAKTADIR.</h6>
    </div>
   
    @else
    <div class="cart_container card">
    <table class="table table-striped">
 <thead>
    <tr>
      <th scope="col">Ürün Resmi</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Adet</th>
      <th scope="col">Fiyat</th>
       <th scope="col">Toplam</th>
        <th scope="col">Kaldır</th>
    </tr>
  </thead>
  <tbody>
    @foreach(Cart::content() as $data)
    <tr>  
      <th scope="row">1</th>
      <td>{{$data->name}}</td>
      <td>{{$data->qty}}</td>
      <td>{{$data->price}}</td>
       <td>{{$data->subtotal}}</td>
       <td><button class="btn btn-danger">X</button></td>
    </tr>
    @endforeach
</table>
<div class="row">
  <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6">
   <table class="table">

  <tbody>
    <tr>
      <th >Ara Toplam :</th>
      <td>{{Cart::subtotal()}}</td>
    </tr>
    <tr>
      <th >Kdv:</th>
      <td>{{Cart::tax()}}</td>
    </tr>
    <tr>
      <th >Kargo Ücreti:</th>
      <td>0,00 ₺</td>
    </tr>
      <tr>
      <th >Toplam</th>
      <td>{{Cart::total()}}</td>
    </tr>
   
  </tbody>
</table>
<a href="{{route('payment')}}"><button class="btn btn-success float-end">ÖDEME ADIMINA GEÇ</button></a>
  </div>
</div>
   </div>
@endif
  </div>
   <div class="section_title mt-4">
             <h6 class=""><span class="blackfont">İlginizi</span> Çekebilir</h6>
              
             <div class="line mb-4"></div>
    </div>
   <div class="row">
             @foreach($products as $data)
             <div class="col-xxl-3 col-xl-4 mt-2 col-md-4 col-sm-6 col-6">
                <form action="{{route('addtocart',$data->id)}}" method="post">
                @csrf
                 <div class="home_product_card">
                    <img src="{{asset($data->image)}}" class="img-fluid home_product_image" alt="">
                    <h5>{{$data->title}}</h5>
                    <div class="home_product_price_container d-flex justify-content-end">
                        @if($data->regular_price !=NULL)
                           <h6 class="home_sale_price"><del>{{$data->sale_price}} ₺</del></h6>
                            <h6 class="home_regular_price">{{$data->regular_price}} ₺</h6>
                             @else
                               <h6 class="home_regular_price">{{$data->sale_price}} ₺</h6>
                               @endif
                        
                    </div>
                    <button class="btn add-to-cart-button">SEPETE EKLE</button>
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
                    </form>
                 </div>
             </div>
            @endforeach
<br>
            </div>
          </div>
@endsection