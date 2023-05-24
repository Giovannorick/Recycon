<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function searchPage(Request $r){
        $products = Product::where('name', 'LIKE', "%$r->search%")->paginate(3);

        return view('showProduct')->with(['products' => $products]);
    }   

    public function showProductPage(){
        $products = Product::paginate(3);

        return view('showProduct')->with(['products' => $products]);
    }

    public function showProductDetailPage($itemId){
        $product = Product::where('ItemID', $itemId)->first();
        return view('productDetail', ['product' => $product]);
    }

    public function manageItemPage(){
        $products = Product::all();
        return view('manageItem', ['products' => $products]);
    }

    public function updateItemPage($productID){
        $product = Product::find($productID);
        return view('updateItem')->with(['product' => $product]);
    }

    public function updateItem(Request $r){
        $rules = [
            'ItemID' => 'required',
            'price' => 'numeric|min:4',
            'category' => ['required', Rule::in(['Recycle', 'Second'])],
            'name' => 'required|unique:products,name|max:20',
            'description' => 'required|max:200',
            'image' => 'required',
        ];

        $validate = Validator::make($r->all(), $rules);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $product = Product::firstWhere('ItemID', $r->currentID);

        $product->ItemID = $r->ItemID;
        $product->price = $r->price;
        $product->category = $r->category;
        $product->name = $r->name;
        $product->description = $r->description;
        
        $imageFile = $r->file('image');
        $nameImage = 'Prod'. $r->ItemID.'.'.$imageFile->getClientOriginalExtension();
        Storage::putFileAs('public/image', $imageFile, $nameImage);

        $product->image = $nameImage;

        $product->save();

        return back()->with("status", "Product Update Successfully!");
    }

    public function addItemPage(){
        return view('addItem');
    }

    public function addItem(Request $r) {
        $rules = [
            'ItemID' => 'required|unique:products,itemId',
            'price' => 'numeric|min:4',
            'category' => ['required', Rule::in(['Recycle', 'Second'])],
            'name' => 'required|unique:products,name|max:20',
            'description' => 'required|max:200',
            'image' => 'required',
        ];

        $validate = Validator::make($r->all(), $rules);
        if($validate->fails()) {
            return back()->withErrors($validate);
        }

        $product = new Product();
        $product->ItemID = $r->ItemID;
        $product->price = $r->price;
        $product->category = $r->category;
        $product->name = $r->name;
        $product->description = $r->description;
        
        $imageFile = $r->file('image');
        $nameImage = 'Prod'. $r->ItemID.'.'.$imageFile->getClientOriginalExtension();
        Storage::putFileAs('public/image', $imageFile, $nameImage);

        $product->image = $nameImage;

        $product->save();

        return back()->with("status", "Product Add Successfully!");
    }


    public function deleteItem($productId){
        $product = Product::find($productId);

        $product->delete();

        return back()->with("status", "Product Delete Successfully!");
    }
}
