@extends('layouts.frontend')
@section('content')
<div class="page_content padding">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
            <div class="contact_form p-3">
                <div class="section_title">
                    <h6>İletişim Formu</h6>
                </div>
                <div class="row">
                   <div class="col-lg-6">
                     <input type="text" class="form-control" placeholder="Ad-Soyad">
                   </div>
                   <div class="col-lg-6">
                     <input type="text" class="form-control" placeholder="Şirket Adı">
                   </div>
                   <div class="col-lg-6">
                     <input type="email" class="form-control" placeholder="E-Mail adresiniz">
                   </div>
                          <div class="col-lg-6">
                     <input type="phone" class="form-control" placeholder="Telefon Numaranız">
                   </div>
                   <div class="col-lg-12">
                <textarea name="" class="form-control" id=""  rows="10"></textarea> 
                   </div>
                   
                   
                </div>
                <button class="btn btn-primary mt-3 float-end">Gönder</button>
            </div>
        </div>
    </div>
      <div class="col-lg-6">
          <div class="card ">
          <div class="contact_detail p-3">
               <div class="section_title">
                    <h6>Bize Ulaşın</h6>
                </div>
              <ul class="contact_menu">
                  <li class="contact_menu-item"><a href="" class="contact_menu-link">0216 227 27 27</a></li>
                   <li class="contact_menu-item"><a href="" class="contact_menu-link">bilgi@ocsturk.com</a></li>
                    <li class="contact_menu-item"><a href="" class="contact_menu-link">Site mah. 3008 Cad. No:40/A Ümraniye/İstanbul</a></li>
              </ul>
          </div>
          </div>
          <div class="card mt-1">
              <div class="harita p-3">
                      <div class="section_title">
                    <h6>Neredeyiz?</h6>
                </div>
              </div>
            
          </div>
      </div>
    </div>
   
</div>
    
@endsection
<style>
    .contact_form input{
        margin-bottom: 15px;
    }
    .contact_menu{
        padding: 0
    }
    .harita{
        
    }
    .contact_menu li a{
        text-decoration: none;
        font-size: 18px;
        margin-top: 5px;
        color: gray
    }
    .contact_menu li{
        list-style: none
    }
</style>