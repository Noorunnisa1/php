<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
class productcontroller extends Controller
{
    public function index(){
        $products = product::all();
        return view('products.index', ['products' => $products]);
    }
    public function index1(){
        $products = product::all();
        //echo "nisa";
        return view('products.index2', ['products' => $products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'description' => 'nullable',
            'price' => 'required|decimal:0,10',
           
        ]);
        $newproduct = Product::create($data);
        return redirect(route('products.index'));
    }
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product , Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'description' => 'nullable',
            'price' => 'required|decimal:0,10',
           
        ]);
        $product->update($data);
        return redirect(route('products.index'))->with('success', 'Product Updated Successffully');
    }
    public function destroy(product $product) {
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product deleted Successffully');
        
    }
    public function restore(product $product) {
        $abc  = product::withTrashed()->find($product);
        $abc->restore();
        return redirect(route('products.index'))->with('success', 'Product restore Successffully');
        
    }
    public function trash(){
        $products = product::onlyTrashed()->get();
        return view('products.product_trash', ['products' => $products]);
    }
}
