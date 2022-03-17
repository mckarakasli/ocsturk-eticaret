@extends('layouts.backend')
@section('content')
<div class="card p-4">
  <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input class="order_filter" type="radio" name="orderfilter" value="tumu" id="option1" checked> Tüm Siparişler
  </label>
  <label class="btn btn-secondary">
    <input class="order_filter" type="radio" name="orderfilter" value="beklemede" id="option2"> Bekleyen Siparişler
  </label>
  <label class="btn btn-secondary">
    <input class="order_filter" type="radio" name="orderfilter" value="iptaledildi" id="option3"> İptal Edilen Siparişler
  </label>
</div>
    <table class="table">
  <thead>
    <tr>
      <th>Sipariş No</th>
      <th>Sipariş Tarihi</th>
      <th>Müşteri</th>
      <th>Sipariş Tutarı</th>
      <th style="width: 250px">Durum</th>
      <th>İşlemler</th>
      
      <th></th>
    </tr>
  </thead>
  <div class="filter_table">
<tbody id="filter_table">
  <div id="preloader" ><img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" class="img-fluid" alt=""></div>
</tbody>
  </div>
  <tbody  id="standart_table">
      @foreach($orders as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->created_at}}</td>
      <td>{{$data->sirketadi}}</td>
      <td>{{$data->total}}</td>
      <td><select name="durum" id="" class="form-control">
          <option value="">Beklemede</option>
          <option value="">Sipariş Yola çıktı</option>
          <option value="">Teslim edildi</option>
          <option value="">İptal edildi</option>
        </select>
        </td>
    <td>
        <button class="btn btn-primary">Durum Güncelle</button>
        <button orders_id ="{{$data->id}}" type="button" class="btn btn-success orders_detail_button">Sipariş Detay</button>
    
    <button class="btn btn-danger">Kaldır</button>
</td>

    </tr>
    @endforeach
    
  </tbody>
</table>
</div>
 <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
<script>
   $('.orders_detail_button').click(function(){
      id = $(this)[0].getAttribute('orders_id');
      $.ajax({
          type:"GET",
          url:"{{route('orderDetail.getdata')}}",
          data: {id:id},
          success:function(data){
            console.log(data)
           $.each(data, function(index, value){
	        console.log(value.qty);
          $('#firmaunvan').text(value.qty);
});
            

            $('#orderDetailModal').modal('show');
          }
      })
    });
   
      
</script>
<!-- Modal -->
<div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <li>Firma Ünvanı:<h6 id="firmaunvan"></h6></li>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 $('.order_filter').click(function(){
  $('#preloader').show();
  $('#filter_table').empty();
   data = $(this).val();
      $.ajax({
        type:"GET",
        url: "{{route('order.filter')}}",
        data:{data:data},
    
        success:function(data){
          $('#standart_table').hide();
        $.each(data,function(key,value){
          console.log(value);
         console.log(value.durum);
          
          var filterTemplate = '<tr>'
            +'<th scope="row">'+value["id"]+'</th>'
            +'<td>'+value["created_at"]+'</td>'
            +'<td>'+value["sirketadi"]+'</td>'
            +'<td>'+value["total"]+'</td>'
            +'<td><select name="durum" value="hello" id="durumlar" class="form-control">'
            +'<option value="beklemede">Beklemede</option>'
            +'<option value="yolda">Sipariş Yola çıktı</option>'
            +'<option value="teslim edildi">Teslim edildi</option>'
            +'<option value="iptal edildi">İptal edildi</option></select>'
            +'</td><td><button class="btn btn-primary">Durum Güncelle</button>'
            +'<button orders_id ="{{$data->id}}" type="button" class="btn btn-success orders_detail_button">Sipariş Detay</button>'
            +'<button class="btn btn-danger">Kaldır</button></td></tr>'
       
        $('#filter_table').append(filterTemplate);
        $('#durumlar').val(value.durum);

              });
         $('#preloader').hide();
        }
      })
 });
  });
</script>
<style>
  #preloader{
    width: 100%;
    height: 100%;
    text-align: center;
    padding:50px;
    display: none;
    position: absolute;
   
  }
  #preloader img{
    width: 50px
  }
</style>
@endsection


