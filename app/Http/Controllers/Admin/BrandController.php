<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandValidationRequest;

class BrandController extends Controller
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
        $validate = $request->validate([
            'brand_name'=>'required'

        ]);
        $brand = new Brand;
        $brand->brand_name = $request->input('name');

        $brand->save();
        return redirect('/admin/brand')->with('success','A brand is Added');
    }

   
    public function show(Brand $brand)
    {
        //
    }

    
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }

    
    public function update(Request $request, $id)
    {
        
        $validate = $request->validate([
            'brand_name'=>'required'

        ]);
        
            $brand = Brand::where('id',$id)->update([
                'brand_name'=>$request->input('name'),
            ]);
         
        return redirect('/admin/brand')->with('update', 'Brand Updated');

      
    }

    
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/admin/brand')->with('delete', ' Brand Deleted');
    }
}
