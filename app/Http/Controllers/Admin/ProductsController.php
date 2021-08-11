<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductValidationRequest;


class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {

        $products = Product::all();

        return view('admin.products.index', [
            'products' =>  $products,
            'sl' => 1
        ]);
    }


    public function create()
    {
        $category = Category::select('name')->get();
        // $min=$category->first()->id;
        // $max=$category->last()->id;
        return view('admin.products.create', ['category' => $category]);
    }

    public function store(ProductValidationRequest $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->category_name = $request->input('category_name');
            $file = $request->file('firstImage');
            $extension = $file->extension();
            $filename  = time() . '.' . $extension;
            $file->move(public_path('images/products'), $filename); 
            $product->firstImage = $filename;

            if ($request->file('imagetwo') != "") {
                $file2 = $request->file('imagetwo');
                $extension2 = $file2->extension();
                $filename2  = '2' . time() . '.' . $extension2;
                $file2->move(public_path('images/products'), $filename2); 
                $product->imagetwo = $filename2;
            } 
            if ($request->file('imagethree') != "") {
                $file3 = $request->file('imagethree');
                $extension3 = $file3->extension();
                $filename3  = '3' . time() . '.' . $extension3;
                $file3->move(public_path('images/products'), $filename3); 
                $product->imagethree = $filename3;
            }
            else {
                $product->imagetwo = " ";
                $product->imagethree = " ";
            }
            
        
        $product->save();
        return redirect('admin/products')->with('success', 'A Product is Added');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::select('name')->get();

        return view('admin.products.edit', [
            'product' => $product,
            'category' => $category
        ]);
    }


    public function update(ProductValidationRequest $request, $id)
    {


        if($request->file('firstImage')!=''){
            $file = $request->file('firstImage');
            $extension =$file->extension();
            $filename  = time() . '.' . $extension;
            $file->move(public_path('images/products'), $filename);
            $product = Product::find($id);
            $product->firstImage = $filename;
            Product::where('id', $id)->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'amount' => $request->input('amount'),
                'category_name' => $request->input('category_name'),
                'firstImage' => $filename,
            ]);
        }
        if ($request->file('imagetwo') != "") {
            $file = $request->file('imagetwo');
            $extension = $file->extension();
            $filename  = '2'.time() . '.' . $extension;
            $file->move(public_path('images/products'), $filename); 
            Product::where('id', $id)->update([
                
                'imagetwo' => $filename,
            ]);

        }
        if ($request->file('imagethree') != "") {
            $file = $request->file('imagethree');
            $extension = $file->extension();
            $filename  = '3'.time() . '.' . $extension;
            $file->move(public_path('images/products'), $filename); 
            Product::where('id', $id)->update([
                
                'imagethree' => $filename,
            ]);

        }
      
        return redirect('/admin/products')->with('update', 'Product Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products/')->with('delete', 'Product Deleted');
    }
}
