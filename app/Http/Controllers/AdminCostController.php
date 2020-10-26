<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminCosts;
use Validator;
class AdminCostController extends Controller{
    
    function index(){
    	
        $admin_costs ='active';
        
        $data        = AdminCosts::all();
        
        $x = 0;
        
        foreach ($data as $row)
        
            $x+=$row->value;
        
    	return view('dashboard.admin_costs.index',compact('admin_costs'),compact('data'));

    }

    function creat(Request $res){

    	$this->validate($res,[
            'value'     => 'required',
            'details'  => 'required',
        ]);
        AdminCosts::create([
        	'value'  => $res->value,
        	'details'  => $res->details
        ]);

        $admin_costs ='active';
        $done='';
        $data        = AdminCosts::all();
    	return view('dashboard.admin_costs.index',compact('admin_costs'),compact('data'),compact('done'));
    }
    function delete($id){
        
        AdminCosts::where('id', $id)->delete();
        session()->flash('success','Operation Success');
        return redirect()->route('index');
    
    }
}
