<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class AdminController extends Controller
{
    public function view_category(){

        $data = Category::all();

        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
       $category = new Category;

       $category->category_name = $request->category;

       $category->save();

       toastr()->closeButton()->timeout(5000)->addsuccess('Category added successfuly');

       return redirect()->back(); 
    }

    public function delete_category($id){

        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->timeout(5000)->addsuccess('Category deleted successfuly');

        return redirect()->back();
    }

    public function edit_category($id){

        $data = Category::find($id);

       return view('admin.edit_category',compact('data'));
    }

    
    public function update_category(Request $request,$id){

        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->closeButton()->timeout(5000)->addsuccess('Category updayed successfuly');

       return redirect('/view_category');
    }

    public function add_product(){

        $category = Category::all();

       return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request){

        $data = new Products();

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;  
        }

        $data->save();

        toastr()->closeButton()->timeout(5000)->addsuccess('Product uploaded successfuly');

        return redirect()->back();     }


}
