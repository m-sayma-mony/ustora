<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('backend.product.index', ['products' => Product::all()]);
    }

    public function create(){
        return view('backend.product.create', ['categories' => Category::all()]);
    }

    public function store(Request $request){
        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $image = $request->image;

        if($image){
            $path = 'assets/product-images/';
            $imageName = time().rand().'.'.$image->extension();

            $image->move($path, $imageName);
            $product->image = $path.$imageName;
        }

        $product->save();

        return back()->with('message', 'Product Added Successfully');
    }

    public function destroy(int $id){
        $product = Product::find($id);

        if($product->image){
            if(file_exists($product->image)){
                unlink($product->image);
            }
        }

        $product->delete();

        return back()->with('message', 'Product Deleted Successfully');
    }

    public function edit(int $id){
        return view('backend.product.edit', ['products' => Product::find($id), 'categories' => Category::all()]);
    }

    public function update(Request $request, int $id){
        $product = Product::find($id);   

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $image = $product->image;

        if($image){
            if(file_exists($image)){
                unlink($image);
            }
        }

        $product->save();

        return back()->with('message', 'Product Updated Successfully');
    }
}
