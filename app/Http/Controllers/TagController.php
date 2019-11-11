<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::paginate(16);
        return view('admin.tags.tags')->with([
            'tags'=>$tags
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'tag'=>'required',
        ]);

        Tag::create([
            'tag'=>request('tag')
        ]);
        $tag=request('tag');
            Session::flash('add', 'Tag ( '. $tag . ' ) Added Successfully!');
            return redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return redirect()->with($tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request,[
            "tag"    => "required",
        ]);
        $tag->tag =  $request->tag;
        $tag->save();
        Session::flash('update', 'Tag ( '. $tag->tag . ' ) Updated Successfully!');
        return redirect()->back();
    }

    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete($id);
        Session::flash('delete', 'Tag ( '. $tag->tag . ' ) Deleted Successfully!');
        return redirect()->back();
    }

}
