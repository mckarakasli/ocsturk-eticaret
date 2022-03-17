@extends('layouts.frontend')
@section('content')
    <div class="page_content padding">
       <div class="logincard card">
           <div class="row">
               <div class="col-lg-6">
                   RESİM
               </div>
               <div class="col-lg-6">
                   <h6>Giriş yap</h6>
                   <label for="">E-mail adresiniz</label>
                   <input type="email" class="form-control">
                    <label for="">Şifreniz</label>
                   <input type="password" class="form-control">
               </div>
           </div>
       </div>
    </div>
@endsection

<style>
    .logincard{
        padding:50px
    }
</style>