<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class ProductController extends Controller
{
    function create(){
        $categories = Category::all();
        $products = Product::all();
        foreach($products as $product){
            $product->category;
           //echo $product->category->name;

        }
        
        //echo "<pre>".json_encode($products,JSON_PRETTY_PRINT)."<\pre>";
       return view("admin.product.create", ["categories" => $categories,"products"=>$products]);
    }
       
        public function store(Request $request){


        $name=$request->name;
        $category_id=$request->category;
        $oldPrice=$request->oldPrice;
        $price=$request->price;
        $quantity=$request->quantity;
        $image= $request->file("image")->store("public");
        $description=$request->description;
    
        $product= new Product;
        $product->name= $name;
        $product->category_id= $category_id;
        $product->image= '/storage/'.$image;
        $product->oldPrice= $oldPrice;
        $product->price= $price;
        $product->quantity= $quantity;
        $product->description= $description;
        $product->save(); 
        return redirect("admin/product");
    
        }
    
        public function edit($id)
        {
            $categories= Category::all();
            $product= Product::find($id);
          return view("admin.product.edit", ["product"=> $product,"categories" => $categories]);
        }
    
       
        public function update(Request $request, $id)
        {
            $product = Product::find($id);
            $name=$request->name;  
            $category_id=$request->category;
            $oldPrice=$request->oldPrice;
            $price=$request->price;
            $quantity=$request->quantity;
            $description=$request->description;
            $image= $request->file("image")-> store("public");

            $product->name= $name;
            $product->category_id= $category_id;
            $product->oldPrice= $oldPrice;
            $product->image = '/storage/'.$image;
            $product->price= $price;
            $product->quantity= $quantity;
            $product->description= $description;
            $product->save();
        
        
             return redirect("admin/product");
            
        }
    
    
        public function destroy($id)
        {
            Product::find($id)->delete();
             return redirect("admin/product");
        }

}
