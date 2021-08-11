<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BrandsController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth:admin'); 
    }
   
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',[
            'brands' =>  $brands,
            'sl'=>1
        ]);
    }

    
    public function create()
    {
        return view('admin.brand.create');

    }

    
    public function store(Request $request)
    {
      
        $brand = new Brand;
        $brand->brand_name = $request->input('name');

        $brand->save();
        return redirect('/admin/brand')->with('success','A brand is Added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
