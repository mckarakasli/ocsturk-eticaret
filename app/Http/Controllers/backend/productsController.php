<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\brands;
use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::get();
        return view('backend.products.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::get();
        $brands = brands::get();
        return view('backend.products.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        if ($request->image) {
            $date = Str::slug(Carbon::now());
            $imageName = Str::slug($request->title) .'-'.$date. '.'. $request->image->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/products/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $request->merge(['image'=>'uploads/products/'.$imageName]);
            
        }
        $request['slug']= Str::slug($request->title);
      
        
        products::create($request->post());
        return redirect()->back()->with('message', 'Kategori başarıyla oluşturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $categories = categories::get();
        $brands = brands::get();
        $products = products::whereId($id)->first();
       return view('backend.products.edit',compact('products','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['slug']= Str::slug($request->title);
         if ($request->image) {
            $date = Str::slug(Carbon::now());
            $imageName = Str::slug($request->title) .'-'.$date. '.'. $request->image->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/products/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $request->merge(['image'=>'uploads/products/'.$imageName]);
             products::whereId($request->id)->update([
            'title'=> $request->title,
            'content'=> $request->content,
            'categories_id'=> $request->categories_id,
            'sale_price'=>  $request->sale_price,
            'regular_price'=> $request->regular_price,
            'brands'=> $request->brands,
            'stock_no'=> $request->stock_no,
            'stock'=> $request->stock,
            'image'=> 'uploads/products/'.$imageName,
            'tax'=> $request->tax,
        ]);
        }   
        
      
         products::whereId($request->id)->update([
            'title'=> $request->title,
            'content'=> $request->content,
            'categories_id'=> $request->categories_id,
            'sale_price'=>  $request->sale_price,
            'regular_price'=> $request->regular_price,
            'brands'=> $request->brands,
            'stock_no'=> $request->stock_no,
            'slug'=> Str::slug($request->title),
            'stock'=> $request->stock,
            'tax'=> $request->tax,
            
        ]);
        
       
        return redirect()->back()->with('message', 'Kategori başarıyla oluşturuldu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::whereId($id)->delete();
        return redirect()->back();
    }
}
