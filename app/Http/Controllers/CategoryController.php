<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(16);
        return view('admin.categories.categories')->with([
            'categories'=>$categories
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
        ]);

        Category::create([
            'name'=>request('name')
        ]);
        $category=request('name');
            Session::flash('add', 'category ( '. $category . ' ) Added Successfully!');
            return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return redirect()->with($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request,[
            "name"    => "required",
        ]);
        $category->name =  $request->name;
        $category->save();
        Session::flash('update', 'category ( '. $category->name . ' ) Updated Successfully!');
        return redirect()->back();
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete($id);
        Session::flash('delete', 'category ( '. $category->name . ' ) Deleted Successfully!');
        return redirect()->back();
    }
}
