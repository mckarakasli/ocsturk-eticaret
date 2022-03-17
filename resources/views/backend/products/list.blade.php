@extends('layouts.backend')
@section('content')
<div class="page_title card p-4 mx-4">
   <div class="row">
       <div class="col-lg-6">
        <h6 class="">Ürünler</h6>
       </div>
       <div class="col-lg-6 " style="text-align: right">
           <a href="{{route('products.create')}}"><button class="btn btn-primary">Yeni Ürün ekle</button></a>
       </div>
   </div>
        
  
</div>
                <div class="page_content p-4 mx-4">
                            
                                <table class="table" style="margin-top: 15px">
                <thead>
                    <tr>
                    <th scope="col">Ürün resmi</th>
                    <th scope="col">Ürün Adı</th>
                    <th scope="col">Ürün Fiyatı</th>
                    <th scope="col">Satış Fiyatı</th>
                     <th scope="col">İşlemler</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $data)
                    <tr>
                    <th scope="row"><img src="{{asset($data->image)}}" class="img-fluid list_image" alt=""></th>
                    <td>{{$data->title}}</td>
                     <td>{{$data->sale_price}}</td>
                     <td>{{$data->regular_price}}</td>

                    <td>
                        <a href="{{route('products.edit',$data->id)}}"><button  class="btn btn-warning categories_duzenle_button">Düzenle</button></a>
                        <a href="{{route('products.destroy',$data->id)}}"><button class="btn btn-danger">Sil</button></a>
                    </td>
                    
                    </tr>
                    @endforeach
                
                </tbody>
                </table>
            </div>
        </div>
<style>
    .list_image{
        width: 150px;
    }
   .page_title h6{
       font-size: 25px
   }
   .section_card{
       box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.171);
   }
   #kategori_duzenle_panel{
       display: none
   }
   
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
  <script>

   const images = document.getElementById('images'),
      preview = document.getElementById('preview');

images.addEventListener('change', function() {
    preview.innerHTML = '';
	[...this.files].map(file => {
		const reader = new FileReader();
		reader.addEventListener('load', function(){
			const image = new Image();
			image.height = 100;
			image.title = file.name;
			image.src = this.result;
			preview.appendChild(image);
		});
		reader.readAsDataURL(file);
	})
});

</script>
@endsection