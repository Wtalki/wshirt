<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //product list
    function productList(){
        $data = Product::with(['images','discounts','category','colors','sizes'])->orderBy('created_at','desc')->get();
        $category = Category::get();
        return view('product/productList',compact('data','category'));
    }

    //product create page
    function createProduct(){
        $category = Category::orderBy('created_at', 'desc')->get();

        return view('product.addProduct', compact('category'));
    }

    //product create
    function productCreate(Request $request){
        //product data
        $data = $this->productData($request);
        $product = Product::create($data);

        //discount data
        $discount = [
            'product_id' => $product->id,
            'percentage' => $request->percentage,
            'text' => $request->text
        ];
        Discount::create($discount);

        foreach($request->colors as $color){
             $productColor = [
            'product_id' => $product->id,
            'color' => $color,
            ];
            Color::create($productColor);
        }

        foreach ($request->sizes as $size) {
            $productSize = [
            'product_id' => $product->id,
            'size' => $size
        ];
            Size::create($productSize);
        }
        if($request->hasFile('images')){
            foreach($request->file('images') as $image){
                $path = $image->store('images', 'public');
                $productImage = [
                    'product_id' => $product->id,
                    'path' => $path,
                ];
                Image::create($productImage);
            }
        }
        return back();
    }

    //product multiple delete
    function deleteMultipleProduct(Request $request){
        Product::whereIn('id', $request->id)->delete();
        $oldImage = Image::whereIn('product_id', $request->id)->get();
            foreach($oldImage as $old ){
                Storage::disk('public')->delete($old->path);
                $old->delete();
            }
    }
    //delete
    function singleDelete($id){
        $product = Product::findOrFail($id);
        $oldImage = Image::where('product_id', $id)->get();
            foreach($oldImage as $old ){
                Storage::disk('public')->delete($old->path);
                $old->delete();
        }
        $product->delete();
    }

    //edit product
    function editProduct($id){
        $data = Product::where('id',$id)->with(['images','discounts','category','colors','sizes'])->orderBy('created_at','desc')->first();
        // dd($data->toArray());
        $category = Category::get();
        return view('product.editProduct',compact('data', 'category'));
    }

    //product edit
    function productEdit(Request $request){

        $data = $this->productData($request);
        Product::where('id',$request->productId)->update($data);
         $discount = [
            'product_id' =>$request->productId,
            'percentage' => $request->percentage,
            'text' => $request->text
        ];
        Discount::where('product_id',$request->productId)->update($discount);

        $productData = Product::findOrFail($request->productId);
        $productData->colors()->delete();
        foreach($request->colors as $color){
             $productColor = [
            'product_id' => $request->productId,
            'color' => $color,
            ];
            Color::create($productColor);
        }
        $productData->sizes()->delete();
         foreach($request->sizes as $size){
             $productSize = [
            'product_id' => $request->productId,
            'size' => $size,
            ];
            Size::create($productSize);
        }
        if($request->hasFile('images')){
            $oldImage = Image::where('product_id', $request->productId)->get();
            foreach($oldImage as $old ){
                Storage::disk('public')->delete($old->path);
                $old->delete();
            }
            foreach($request->file('images') as $image){
                $path = $image->store('images', 'public');

                $productImage = [
                    'product_id' =>$request->productId,
                    'path' => $path,
                ];
                Image::create($productImage);
            }
        }
        return to_route('product#list');

    }


    //product validation check
    private function productValidationCheck($request,$status){
        $validationRules = [];
        $validationRules['images.*'] = $status == 'create' ? 'required|mimes:jpg,jpeg,png|file' : 'mimes:jpg,jpeg,png|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
    //product data
    private function productData($request){
        return [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category,
            'type' => $request->type,
            'cover' => $request->cover,
            'description' => $request->description,
            'gender' => $request->gender,
        ];
    }

}