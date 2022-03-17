<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::get();
        return view('backend.categories.list',compact('categories'));
    }

    /* public function create()
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
            Image::make($request->file('image'))->save('uploads/categories/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $request->merge(['image'=>'uploads/categories/'.$imageName]);
        }
        $request['slug']= Str::slug($request->title);
        categories::create($request->post());
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
            Image::make($request->file('image'))->save('uploads/categories/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $dbsave =$request->merge(['image'=>'uploads/categories/'.$imageName]);
            $categories = categories::whereId($request->id)->update([
            'title'=> $request->title,
            'slug'=> $request['slug'],
            'image'=> 'uploads/catregories/'.$imageName,
            'parent'=> $request->parent,
            ]);
        } else {
            $brands = categories::whereId($request->id)->update([
            'title'=> $request->title,
            'slug'=> $request['slug'],
            'parent'=> $request->parent,
             
            ]);
        }
    
         
        
        return redirect()->back()->with('message', 'Güncelleme Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = categories::whereId($id)->delete();
        return redirect()->back()->with('message', 'silindi');
    }

    public function getData(Request $request)
    {
        $categories = categories::findOrFail($request->id);
        return response()->json($categories);
    }
}