<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public function index(){
        $units = Unit::paginate(16);
        return view('admin.units.units')->with([
            'units'=>$units
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'unit_name'=>'required',
            'unit_code'=>'required'
        ]);

        Unit::create([
            'unit_name'=>request('unit_name'),
            'unit_code'=>request('unit_code')
        ]);
        $unit_name=request('unit_name');
            Session::flash('add', 'Unit ( '. $unit_name . ' ) Added Successfully!');
            return redirect()->back();
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return redirect()->with($unit);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $this->validate($request,[
            "unit_name"    => "required",
            "unit_code"  => "required"
        ]);
        $unit->unit_name =  $request->unit_name;
        $unit->unit_code =  $request->unit_code;
        $unit->save();
        Session::flash('update', 'Unit ( '. $unit->unit_name . ' ) Updated Successfully!');
        return redirect()->back();
    }

    public function destroy($id){
        $unit = Unit::find($id);
        $unit->delete($id);
        Session::flash('delete', 'Unit ( '. $unit->unit_name . ' ) Deleted Successfully!');
        return redirect()->back();
    }


}
