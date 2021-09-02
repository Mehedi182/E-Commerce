<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;

class CuponsController extends Controller
{
    
    public function index()
    {
        $cupons = Cupon::latest()->get();
        return view('admin.cupons.index',[
            'cupons' =>  $cupons,
            'sl'=>1
        ]);
    }

  
    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $cupon = new Cupon;
        $cupon->cupon_name = $request->input('name');
        $cupon->cupon_code = $request->input('code');
        $cupon->save();
        return redirect()->back()->with('success','A Category is Added');

    }

 
    public function show($id)
    {
        
    }

 
    public function edit($id)
    {
        $cupon = Cupon::find($id);
        return view('admin.cupons.edit',
        [
            'cupon'=> $cupon,
        
        ]);
    }

   
    public function update(Request $request, $id)
    {
        Cupon::Where('id',$id)->update([
            'cupon_name' => $request->input('name'),
            'cupon_code' => $request->input('code')

        ]);
        return redirect('/admin/cupons')->with('update', 'Cupon Updated');


    }

   
    public function destroy(Cupon  $cupon)
    {
            $cupon->delete();  
            return redirect('/admin/cupons')->with('delete', 'Cupon Deleted');
 
    }
    public function Active($id){
        Cupon::find($id)->update(['status'=>1]);
        return redirect()->back()->with('status', 'Cupon Activated');
    }
    public function InActive($id){
        Cupon::find($id)->update(['status'=>0]);
        return redirect()->back()->with('status', 'Cupon InActivated');
    }
}
