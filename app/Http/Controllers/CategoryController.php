<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category list
    function categoryList(){
        $data = Category::orderBy('created_at', 'desc')->get();
        return view('product/categoriesList',compact('data'));
    }

    // add category
    function createCategory(){
        return view('product.addCategory');
    }

    //category create
    function Categorycreate(Request $request){
        $this->categoryValidationCheck($request,'create');
        $extension = $request->file('image')->getClientOriginalExtension();

        $uniqueId = uniqid();

        $filename = $uniqueId . '.' . $extension;
        $path = $request->file('image')->storeAs('images', $filename, 'public');

        $data=$this->createCategoryData($request);
        $data['image'] = $filename;
        Category::create($data);
        return back()->with(['success'=> 'Category created successfully']);
    }

    //category delete
    function categoryDelete($id){
        $storImage = Category::where('id',$id)->first();
        Storage::disk('public')->delete('images/'.$storImage->image);
        Category::where('id',$id)->delete();
        return back()->with(['success'=> 'Category deleted successfully']);
    }


    // edit category
    function editCategory($id){
        $data=Category::where('id',$id)->first();
        return view('product.editCategory',compact('data'));
    }

    //category edit
    function categoryEdit(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request,'edit');

        if($request->hasFile('image')){
            $oldImage = Category::where('id',$request->id)->first();
            Storage::disk('public')->delete('images/'.$oldImage->image);
            $extension = $request->file('image')->getClientOriginalExtension();

            $uniqueId = uniqid();

            $filename = $uniqueId . '.' . $extension;
            $path = $request->file('image')->storeAs('images', $filename, 'public');
            $data = $this->createCategoryData($request);
            $data['image'] = $filename;
            Category::where('id',$request->id)->update($data);
        }


        return back()->with(['success' => 'category updated']);
    }


    //validation check
    private function categoryValidationCheck($request,$status){
        $validationRules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $validationRules['image.*'] = $status == 'create' ? 'required|mimes:jpg,jpeg,png|file' : 'mimes:jpg,jpeg,png|file';
        Validator::make($request->all(),$validationRules)->validate();
    }
    private function createCategoryData($request){
        return [
            'name' => $request->name,
            'description' => $request->description,
        ];
    }
}
