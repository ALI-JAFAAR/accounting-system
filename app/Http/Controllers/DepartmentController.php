<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Validator;
class DepartmentController extends Controller{
    
    function index(){
		$department = 'active';
		$data        = Department::all();
    	return view('dashboard.department.index',compact('department'),compact('data'));
    }

    function create(Request $res){
    	$this->validate($res,[
            'name'     => 'required',
            'details'  => 'required',
        ]);
        Department::create([
        	'name'  => $res->name,
        	'details'  => $res->details
        ]);

        $department ='active';
        $done=true;
        $data        = Department::all();
    	return view('dashboard.department.index',compact(['department','data','done']));
    }

    function delete($id){
        
        Department::where('id', $id)->delete();
        session()->flash('success','Operation Success');
        return redirect()->route('department');
    
    }
}
