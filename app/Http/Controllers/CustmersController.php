<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustmersController extends Controller{
    
    function index(){

    	$custmers = 'active';
    	$data     = Customer::all();
    	return view('dashboard.custmers.index',compact(['custmers','data']));

    }

    function create(Request $res){
    	$this->validate($res,[
            'name'           => 'required',
            'work'           => 'required',
            'email'          => 'required',
            'phone'          => 'required',
            'address'        => 'required'
        ]);
        Customer::create([
        	'name'           => $res->name,
        	'work_type'      => $res->work,
        	'email' 	     => $res->email,
            'phone'          => $res->phone,
            'address'        => $res->address
        ]);
        $custmers ='active';
        $done=true;
        $data    = Customer::all(); 
        return view('dashboard.custmers.index',compact(['custmers','data','done']));
    }
    function delete($id){
    	Customer::where('id', $id)->delete();
    	$custmers ='active';
    	$done=true;
        $data    = Customer::all(); 
    	return view('dashboard.custmers.index',compact(['custmers','data','done']));
    }
}
