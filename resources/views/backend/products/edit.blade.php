@extends('layouts.backend')
@section('content')
<div class="page_title card p-4 mx-4">
   
        <h6 class="">Ürün ekle</h6>
  
    </div>
   <div class="page_content p-4 mx-4">
        <div class="row">
           
          
            <div class="col-lg-9">
                <div class="card p-3">
                     <form action="{{route('products.update',$products->id)}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
            @csrf
                    <div class="row">
                        <div class="col-lg-6">
                             <div class="form-group">
                            <label for="">Ürün Adı</label>
                            <input type="text" class="form-control" name="title" value="{{$products->title}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                             <div class="form-group">
                            <label for="">Ürün Kodu</label>
                            <input type="text" class="form-control" name="stock_no" value="{{$products->stock_no}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                              <div class="form-group">
                                  <label for="">Ürün açıklaması</label>
                                <textarea name="content" id="" class="form-control" rows="15">{{$products->content}}</textarea>
                         </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="">Stok Miktarı</label>
                            <input type="text" class="form-control" name="stock" value="{{$products->stock}}">
                        </div>
                         <div class="col-lg-3">
                            <label for="">Satış Fiyatı</label>
                            <input type="text" class="form-control" name="sale_price" value="{{$products->sale_price}}">
                        </div>
                         <div class="col-lg-3">
                            <label for="">İndirimli Satış Fiyatı</label>
                            <input type="text" class="form-control" name="regular_price" value="{{$products->regular_price}}">
                        </div>
                       <button type="submit" class="btn btn-success" style="float: right;">Kaydet</button>
                      
                        
                    </div>
                   
                </div>
                </div>
                <div class="col-lg-3">
                    <div class="card p-3">
                        <div class="form-group">
                            <label for="">Ürün Kapak Fotoğrafı</label>
                             <div id="preview"></div>
                             <input type="file" name="image" accept="image/*" id="images" value="{{$products->image}}">
                             <input type="text" value="{{$products->id}}" name="id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="">Ürün Kategorisi</label>
                             <select name="categories_id" class="form-control" id="">
                                 <option disabled selected>Kategori seçiniz.</option>
                                 @foreach($categories as $data)
                                    <option @if($products->categories_id == $data->id) selected @endif value="{{$data->id}}">{{$data->title}}</option>
                                 @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ürün Marka Seçiniz</label>
                             <select name="brands" class="form-control" id="">
                                 <option disabled selected>Kategori seçiniz.</option>
                                 @foreach($brands as $data)
                                    <option @if($products->brands == $data->id) selected @endif value="{{$data->id}}">{{$data->title}}</option>
                                 @endforeach
                             </select>
                        </div>
                       <input type="text" name="price" hidden>
                    </div>
                </div>

                  </form>
            </div>  
            
                              
            </div>
        </div>
<style>
    #preview{
        height: 200px;
    }
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