<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
class CategoryController extends Controller
{
    function create(){
        $category = Category::all();
        return view('admin.category.index',['category'=>$category]);
    }
    function store(Request $request){
        $name = $request->input('name-category');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect('admin/category');
    }
    function destroy($id){
        Category::find($id)->delete();
        return redirect('admin/category');
    }
    function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',['category'=>$category]);
    }
    function update(Request $request){
         $category = Category::find($request->input('id-category'));
         $category->name = $request->input('name-category');
         $category->save();
         return redirect('admin/category');
    }
}
