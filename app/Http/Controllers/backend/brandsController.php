<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\brands;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class brandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brands::get();
        return view('backend.brands.list',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            Image::make($request->file('image'))->save('uploads/brands/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $request->merge(['image'=>'uploads/brands/'.$imageName]);
        }
         $request['slug']= Str::slug($request->title);
        brands::create($request->post());
        return redirect()->back()->with('message','Kategori başarıyla oluşturuldu');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request['slug']= Str::slug($request->title);
        if ($request->image) {
            $date = Str::slug(Carbon::now());
            $imageName = Str::slug($request->title) .'-'.$date. '.'. $request->image->getClientOriginalExtension();
            Image::make($request->file('image'))->save('uploads/brands/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $dbsave =$request->merge(['image'=>'uploads/brands/'.$imageName]);
            $brands = brands::whereId($request->id)->update([
            'title'=> $request->title,
            'slug'=> $request['slug'],
            'image'=> 'uploads/brands/'.$imageName,
            ]);
        } else {
            $brands = brands::whereId($request->id)->update([
            'title'=> $request->title,
            'slug'=> $request['slug'],
             
            ]);
        }
    
         
        
        return redirect()->back()->with('message','Güncelleme Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = brands::whereId($id)->delete();
        return redirect()->back()->with('message','silindi');
    }

     public function getData(Request $request){
        
        $brands = brands::findOrFail($request->id);
        return response()->json($brands);
    }
}
