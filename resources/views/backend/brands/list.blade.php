@extends('layouts.backend')
@section('content')
<div class="page_title card p-4 mx-4">
   
        <h6 class="">Marka Kontrol</h6>
  
</div>
<div class="page_content p-4 mx-4">
    <div class="row">
        <div class="col-lg-4" id="yeni_marka_olustur_panel">
            <div class="section_card card p-3 mt-2">
                <h6>Yeni Marka Oluştur</h6>
                <hr>
                <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
               
                <div class="form-group">
                    <label for=""><b>Marka Adı:</b></label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="row">
                    <div class="form-group">
                    <label for=""><b>Marka Resmi:</b></label>
                    </div>
                      
                    <div class="col-lg-6">
                        <div class="form-group">
                        <div id="preview"></div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                <div class="form-group">
                  
                     <input type="file" name="image" accept="image/*" id="images">
                </div>
                    </div>
                </div>
               
                <button class="btn btn-primary float-right">Kaydet</button>
             </form>
            </div>
        </div>
              <div class="col-lg-4" id="marka_duzenle_panel">
            <div class="section_card card p-3 mt-2">
                <h6>Marka Düzenle</h6>
                <hr>
                <form action="{{route('brands.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
               
                <div class="form-group">
                    <label for=""><b>Marka Adı:</b></label>
                    <input id="brands_title" type="text" class="form-control" name="title" >
                     <input type="text" name="id" id="brands_id" hidden>
                </div>
                <div class="row">
                    <div class="form-group">
                    <label for=""><b>Marka Resmi:</b></label>
                    </div>
                      
                    <div class="col-lg-6">
                        <div class="form-group">
                        <div id="preview">
                            <img id="brands_image" src="" alt="">
                        </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                <div class="form-group">
                  
                     <input type="file" name="image" accept="image/*" id="images">
                </div>
                    </div>
                </div>
               
                <button class="btn btn-primary float-right">Kaydet</button>
             </form>
            </div>
        </div>
          <div class="col-lg-8">
            <div class="section_card card p-3 mt-2">
                 <h6>Markalar Listesi</h6>
               
                <table class="table" style="margin-top: 15px">
  <thead>
    <tr>
      <th scope="col">Marka resmi</th>
      <th scope="col">Marka Adı</th>
      <th scope="col">İşlemler</th>
      
    </tr>
  </thead>
  <tbody>
      @foreach($brands as $data)
    <tr>
      <th scope="row"><img src="{{asset($data->image)}}" class="img-fluid list_image" alt=""></th>
      <td>{{$data->title}}</td>
      <td>
          <button brands_id ="{{$data->id}}" class="btn btn-warning brands_duzenle_button">Düzenle</button>
          <a href="{{route('brands.destroy',$data->id)}}"><button class="btn btn-danger">Sil</button></a>
      </td>
     
    </tr>
    @endforeach
  
  </tbody>
</table>
            </div>
        </div>
    </div>
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
   #marka_duzenle_panel{
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
$('.brands_duzenle_button').click(function(){
    site_url = window.location.hostname;
  id= $(this)[0].getAttribute('brands_id');

       $('#marka_duzenle_panel').show();
         $('#yeni_marka_olustur_panel').hide('');
        $.ajax({
            type:'GET',
            url:"{{ route('brands.getdata') }}",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#brands_title').val(data.title);
                $('#brands_id').val(data.id);
                $('#brands_image').attr('src',site_url +"/" + data.image);
            }
           

        });
});
</script>
@endsection