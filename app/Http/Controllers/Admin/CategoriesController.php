<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
   
    public function index()
    {
        $category = Category:: all();
        return view('admin.category.index',[
            'category' =>  $category
        ]);
    }


    public function create()
    {

        return view('admin.category.create');
    }

   
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');

        if($request->image!="")
        {
            $file = $request->file('image');
            $extension = $request->image->extension();
            $filename  = time().'.'.$extension;
            $file->move(public_path('images/category'), $filename);//it will store the image in public by creating new folder category
        
            $category->icon = $filename;
         

        }
        else {
           $category->icon = " ";

        }
        $category->save();
        return redirect('admin/category');
    }

   
    public function show(Category $category)
    {
        //
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    
    public function update(Request $request, $id)
    {
        if($request->image!=""){
            $file = $request->file('image');
            $extension = $request->image->extension();
            $filename  = time().'.'.$extension;
            $file->move(public_path('images/category'), $filename);//it will store the image in public by creating new folder category
            
            $category = Category::where('id',$id)->update([
                'name'=>$request->input('name'),
                'icon'=> $filename,
            ]);

        }
        else{
            $category = Category::where('id',$id)->update([
                'name'=>$request->input('name'),
            ]);
        }
        return redirect('/admin/category');

      
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/category');
    }
}
