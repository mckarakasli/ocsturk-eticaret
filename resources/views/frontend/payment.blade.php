@extends('layouts.frontend')
@section('content')
<div class="page_content card p-3 container">
    <div class="row">
        <div class="col-lg-6">
            <h6>Fatura ve Gönderi Bilgileri</h6>
            <form action="{{route('order')}}" method="post">
            @csrf
           
            <div class="form-group">
                <label for="">Firma Ünvanı</label>
                <input type="text" class="form-control" name="sirketadi" required>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                <label for="">Firma Vergi Dairesi</label>
                <input type="text" class="form-control" name="vergidairesi" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                <label for="">Firma Vergi Numarası</label>
                <input type="text" class="form-control" name="vergino" required>
                    </div>
                </div>
            </div>
             <div class="form-group">
                <label for="">Firma Adresi</label>
                <input type="text" class="form-control" name="adres" required>
            </div>
        </div>
        <div class="col-lg-6">
            <h6>Sipariş Özeti</h6>
            <table class="table">
  <thead>
     
    <tr>
      <th scope="col">Ürün resmi</th>
      <th scope="col">Ürün adı</th>
      <th scope="col">Adet</th>
      <th scope="col">Fiyat</th>
    </tr>
  </thead>
  <tbody>
    
       @foreach(Cart::content() as $data)
    <tr>
      <th><img src="{{asset($data->model->image)}}" class="img-fluid cart_image" alt=""></th>
      <td>{{$data->name}}</td>
      <td>{{$data->qty}}</td> 
      <td>{{$data->qty * $data->price}} ₺</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
<div class="odemesekli">
    <h6>Ödeme yonetimi</h6>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" name="odemesekli[]" value="bankahavalesi" required>
  <label class="form-check-label" for="flexRadioDefault1">
    Banka Havalesi
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  name="odemesekli[]" value="kredikarti" required>
  <label class="form-check-label" for="flexRadioDefault2">
    Kredi Kartı(Iyzico)
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"  name="odemesekli[]" value="tesimataninda" required>
  <label class="form-check-label" for="flexRadioDefault3">
    Teslimat anında(Nakit)/(Kredi Kartı)
  </label>
</div>
        </div>
    </div>
    <button class="btn btn-primary float-right mt-5">Siparişi Tamamla</button>
</div>
 </form>
@endsection