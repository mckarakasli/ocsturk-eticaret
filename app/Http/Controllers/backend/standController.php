<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\standlar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class standController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standlar = standlar::get();
        return view('backend.standlar.list',compact('standlar'));
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
            Image::make($request->file('image'))->save('uploads/standlar/'.$imageName)->encode($request->image->getClientOriginalExtension(), '50');
            $request->merge(['image'=>'uploads/standlar/'.$imageName]);
            
        }
        $request['slug']= Str::slug($request->title);
      
        
        standlar::create($request->post());
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
