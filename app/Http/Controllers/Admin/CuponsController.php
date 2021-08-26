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
        
    }

 
    public function show($id)
    {
        
    }

 
    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
}
