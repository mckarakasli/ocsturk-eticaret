@extends('layouts.frontend')
@section('content')
<div class="page_content padding">
<div class="alert alert-success complated_message">SİPARİŞİNİZ BAŞARIYLA OLUŞTURULMUŞTUR. SİPARİŞ DURUMUNUZU PROFİL SAYFANIZ <a href="">SİPARİŞLERİM</a> BÖLÜMÜNDEN TAKİP EDEBİLİRSİNİZ.</div>
<h6>SİPARİŞ ÖZETİ</h6>
 <div class="cart_container card">
    <table class="table table-striped">
 <thead>
    <tr>
      <th scope="col">Ürün Resmi</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Adet</th>
      <th scope="col">Fiyat</th>
       <th scope="col">Toplam</th>
   
    </tr>
  </thead>
  <tbody>
    @foreach($order->orderDetails as $data)
    <tr>  
      <th scope="row">1</th>
      <td>{{$data->title}}</td>
      <td>{{$data->qty}}</td>
      <td>{{$data->price}}</td>
       <td>{{$data->price * $data->qty}}</td>
      
    </tr>
    @endforeach
</table>
<div class="row">
  <div class="col-lg-4 offset-lg-8 col-md-6 offset-md-6">
   <table class="table">

  <tbody>
    <tr>
      <th >Ara Toplam :</th>
      <td>{{$order->subtotal}}</td>
    </tr>
    <tr>
      <th >Kdv:</th>
      <td>{{$order->tax}}</td>
    </tr>
    <tr>
      <th >Kargo Ücreti:</th>
      <td>0,00 ₺</td>
    </tr>
      <tr>
      <th >Toplam</th>
      <td>{{$order->total}}</td>
    </tr>
    <tr>
      <th >Ödeme şekli</th>
      <td>{{$order->odemesekli}}</td>
    </tr>
       <tr>
      <th >Sipariş Tarihi</th>
      <td>{{$order->created_at}}</td>
    </tr>
   
  </tbody>
</table>

  </div>
</div>
 </div>
</div>

{{Cart::destroy()}}
@endsection