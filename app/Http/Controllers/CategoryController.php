<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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
        $this->categoryValidationCheck($request);
        $data=$this->createCategoryData($request);
        Category::create($data);
        return back()->with(['success'=> 'Category created successfully']);
    }

    //category delete
    function categoryDelete($id){
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
        $this->categoryValidationCheck($request);
        $data = $this->createCategoryData($request);
        Category::where('id',$request->id)->update($data);

        return back()->with(['success' => 'category updated']);
    }


    //validation check
    private function categoryValidationCheck($request){
        Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,'.$request->id,
        ])->validate();
    }
    private function createCategoryData($request){
        return [
            'name' => $request->name,
        ];
    }
}