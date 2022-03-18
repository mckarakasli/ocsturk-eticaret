<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\orderDetails;
use App\Models\orders;
use App\Models\products;
use App\Models\standlar;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Double;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Str;

class homeController extends Controller
{
    public function __construct(){
        view()->share('categories',categories::inRandomOrder()->paginate(3));
    }


    public function index(){
       
        $standlars = standlar::get();
        $products = products::get();
        return view('frontend.index',compact('products','standlars'));
    }
    /*SEPETE EKLE*/
    public function addtocart(Request $request,$id){
       
        $product = products::whereId($request->id)->first();
       
        if($product->regular_price != NULL){
         $yenifiyat=Str::replace(',','.',$product->regular_price);
        }else{
          $yenifiyat=Str::replace(',','.',$product->sale_price);
        }
       if(!$request->qty){
            $request->qty = 1;
       }
        
        $satisfiyati = doubleval($yenifiyat);
        $sepetekelnedi = Cart::add($product->id,$product->title,$request->qty,$yenifiyat)->associate('App\Models\products');
        Session()->flash('success message','Ürün başarıyla eklendi');
       return response()->json($sepetekelnedi);
       
    }
     /*SEPETİ GÖRÜNTÜLE*/
    public function cart(){
         $products = products::get();
        return view('frontend.cart',compact('products'));
    }

     /*ÖDEME SAYFASI EKLE*/
    public function payment_page(){
        return view('frontend.payment');
    }

    public function order(Request $request){
       
       $orders =  orders::create([
            'sirketadi'=> $request->sirketadi,
            'vergidairesi'=> $request->vergidairesi,
            'vergino'=> $request->verigno,
            'adres'=> $request->adres,
            'odemesekli'=> $request->odemesekli,
            'user_id'=> Auth::user()->id,
            'tax'=> Cart::tax(),
            'subtotal'=> Cart::subtotal(),
            'total'=> Cart::total()

        ]);

        foreach(Cart::content() as $data){

             $orderDetail = orderDetails::create([
                 'title' => $data->name,
                 'orders_id'=> $orders->id,
                 'qty'=> $data->qty,
                 'price'=> $data->price,

             ]);
        }
        return redirect()->route('complated',$orders->id);
        
       
    }
    public function complated($id){
       
        $order = orders::whereId($id)->where('user_id',Auth::user()->id)->with('orderDetails')->first() ?? abort(404,'Sayfa Bulunamadı');
        return view('frontend.complated',compact('order'));
    }
    public function standlarimiz(){
        $standlar = standlar::get();
        return view('frontend.standlar',compact('standlar'));
    }
    public function standDetail($id){
        $standlar = standlar::whereId($id)->first();
        return view('frontend.standDetail',compact('standlar'));
    }
    public function urunlerimiz(Request $request){
        $secilikategori =  $request->segment(2);
        if($secilikategori){
              $categories_list = categories::get();
            $categories = categories::where('slug',$request->id)->first();
            $products = products::where('categories_id',$categories->id)->get();
        return view('frontend.urunlerimiz',compact('products','categories_list'));
        };
        $categories_list = categories::get();
        $products = products::with('categories')->get();
        return view('frontend.urunlerimiz',compact('products','categories_list'));
    }
    public function login(){
        return view('frontend.loginPage');
    }

    public function iletisim(){
        return view('frontend.iletisim');
    }
    public function hakkimizda(){
        return view('frontend.hakkimizda');
    }

    public function searchCategories(Request $request){
        
         $categories_list = categories::get();
         $categories = categories::where('slug',$request->id)->first();
        $products = products::where('categories_id',$categories->id)->get();
        return view('frontend.urunlerimiz',compact('products','categories_list'));
    }
    public function productDetail($slug){
        $products = products::where('slug',$slug)->with('categories')->first() ??abort(404,'Aradığınız sayfa bulunamadı');
        return view('frontend.productDetail',compact('products'));
    }
}
