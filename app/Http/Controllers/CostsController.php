<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costs;
use App\Models\CostTypes;
use App\Models\Frequincy;
class CostsController extends Controller{
    

    function index(){
		$costs = 'active';
		$type  = CostTypes::all();
		$freq  = Frequincy::all();
		$data    = Costs::select('id','type_id','frequncy_id','amount','created_at')->with(['freq','type'])->get();
        return view('dashboard.costs.index',compact(['costs','data','freq','type']));
    }
    function create(Request $res){
    	$this->validate($res,['freq'=> 'required','type'=> 'required','amount'=> 'required']);

        Costs::create([
        	'type_id'           => $res->type,
        	'amount'            => $res->amount,
            'frequncy_id'       => $res->freq
        ]);
        $costs = 'active';
		$type  = CostTypes::all();
		$freq  = Frequincy::all();
        $done=true;
        $data    = Costs::select('id','type_id','frequncy_id','amount','created_at')->with(['freq','type'])->get(); 
        return redirect()->route('costs')->with(compact(['costs','data','done','freq','type']));
    }

    function AddType(Request $res){
    	$this->validate($res,[
            'type'           => 'required'
        ]);
        CostTypes::create([
        	'name' 	=> $res->type
        ]);
        $costs = 'active';
		$type  = CostTypes::all();
		$freq  = Frequincy::all();
		$done=true;

		return redirect('/costs')->with(compact(['costs','freq','type','done']));
    }
    function AddFreq(Request $res){
    	$this->validate($res,[
            'freq'           => 'required'
        ]);
        Frequincy::create([
        	'name' 	=> $res->freq
        ]);
        $costs = 'active';
		$type  = CostTypes::all();
		$freq  = Frequincy::all();
		$done=true;

        $res->session()->flash('success','Operation Success');
		
        return redirect()->route('costs')->with(compact(['costs','freq','type']));
    }
    function delete($id){
    
    	Costs::where('id', $id)->delete();
    
    	$costs = 'active';
	
		$type  = CostTypes::all();
	
		$freq  = Frequincy::all();
    
        $done=true;
    
        $data    = Costs::select('id','type_id','frequncy_id','amount','created_at')->with('freq')->with('type')->get();

        return redirect()->route('costs')->with(compact(['costs','data','done','freq','type']));
    
    }
    
}
















