<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\Department;
use Validator;

class PlayersController extends Controller{
    
    function index(){
		$players = 'active';
        $dept    = Department::all();
        $data    = Players::select('id','name','department_id','position','created_at')->with('department')->get();
        return view('dashboard.players.index',compact(['players','data','dept']));
    }
    function create(Request $res){
    	$this->validate($res,[
            'name'           => 'required',
            'department_id'  => 'required',
            'position'       => 'required'
        ]);
        Players::create([
        	'name'           => $res->name,
        	'department_id'  => $res->department_id,
            'position'       => $res->position
        ]);
        $dept = Department::all();
        $players ='active';
        $done=true;
        $data    = Players::select('id','name','department_id','position','created_at')->with('department')->get(); 
        return view('dashboard.players.index',compact(['players','data','done','dept']));
    }

    function delete($id){
        
        Players::where('id', $id)->delete();
        session()->flash('success','Operation Success');
        return redirect()->route('players');
    
    }
}
