@extends('layouts.frontend')
@section('content')

    <div class="page_content padding">
        <div class="breadcrumbs card">
            <ul class="breadcrumbs_menu">
                <li class="breadcrumbs_menu-item"><a class="breadcrumbs_menu-link" href="">Ana sayfa<span class="ayrac">></span></a></li>
                 <li class="breadcrumbs_menu-item"><a class="breadcrumbs_menu-link" href="">{{$products->categories->title}}</a><span class="ayrac">></span></li>
                  <li class="breadcrumbs_menu-item"><a class="breadcrumbs_menu-link last" href="">{{$products->title}}</a></li>

            </ul>

        </div>
        <div class="row mt-2 product_content_row">
            <div class="col-lg-6">
                <img src="{{asset($products->image)}}" class="img-fluid product_detail_image" alt="">
            </div>
            <div class="col-lg-6">
               
                <h6 class="product_detail_title mt-3">{{$products->title}}</h6>
                <div class="badge bg-primary">{{$products->categories->title}}</div>
                <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos architecto quas, et ullam incidunt distinctio soluta. Incidunt suscipit adipisci vero, eligendi, minus, esse inventore quae reprehenderit quod autem consequuntur eveniet!</p>
                @if($products->regular_price !=NULL)
                <h6 class="home_sale_price"><del>{{$products->sale_price}} ₺</del></h6>
                 <h6 class="home_regular_price">{{$products->regular_price}} ₺</h6>
                  @else
                    <h6 class="home_regular_price">{{$products->sale_price}} ₺</h6>
                    <input regular_price={{$products->regular_price}} type="text" hidden>
                    @endif
                    <input type="text" name="stock" id="stock" value="{{$products->stock}}" id="" hidden>
                <div class="counterContainer d-flex">
                    <span class="counterbutton" id="negative_counter"><h6>-</h6></span>
                    <h6 class="counter_input"><input class="counterdetail" type="text" value="1"></h6>
                    <span class="counterbutton" id="positive_counter"><h6>+</h6></span>
                   <button product_id="{{$products->id}}"   class="btn btn-success add-to-cart">SEPETE EKLE</button>
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        
        var qty = 1;
        $('.counterdetail').val(qty);
        var stock = $('#stock').val();
        $('#negative_counter').click(function(){
            if(qty > 1){
                  qty --;
            $('.counterdetail').val(qty);
            }
          });
           $('#positive_counter').click(function(){
            if( qty < stock){
                  qty ++;
            $('.counterdetail').val(qty);
            }else{
           Swal.fire({
                    title: 'Limite ulaşıldı',
                    text: "Sakin ol şampiyon",
                    icon: 'inco',
                    showCancelButton: true,
                    showConfirmButton:false,
                    cancelButtonText: "Pardon Reis",
                    cancelButtonColor: '#198754',
             
                    })
                
            }
          });
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        $('.add-to-cart').click(function(){
            id = $(this)[0].getAttribute('product_id');
            regular_price = $(this)[0].getAttribute('regular_price');
            qty = $('.counterdetail').val();
            
         
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
        
    });
</script>