<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Projects;
use App\Models\Players;
use App\Models\Department;
use App\Models\ProjectMember;
use App\Models\ProjectPayment;
class ProjectsController extends Controller{
    
	function index(){
		$projects = 'active';
		$cus      = Customer::all();
		$pla      = Players::all();
		$dept     = Department::all();
		$pro      = Projects::select('id','name','details','price','customer_id','player_id','created_at','department_id')
		->with(['customer','department','players'])->get(); 
    	// dd($pro);
    	return view('dashboard.projects.index',compact(['projects','pro','cus','pla','dept']));
    }
    
   


    function create(Request $res){
    	
        $this->validate($res,[
            'name'            => 'required',
            'details'         => 'required',
            'customer'        => 'required',
            'price'           => 'required',
            'payment'         => 'required',
            'player'          => 'required',
            'dept'            => 'required'
        ]);
        
        $x = Projects::create([
        	'name'            => $res->name,
            'details'         => $res->details,
            'price'           => $res->price,
            'customer_id'     => $res->customer,
            'department_id'   => $res->dept
        ]);
        
        ProjectPayment::create([
        	'project_id'      => $x->id,
            'value'           => $res->payment
        ]);

        $x->players()->sync($res->player);

		$res->session()->flash('success','Operation Success');
        
        return redirect()->route('projects');
    }

    function AddPayment(Request $res){
    	$this->validate($res,[
            'pro_id'            => 'required',
            'value'         => 'required'

        ]);
        ProjectPayment::create([
        	'project_id'    => $res->pro_id,
            'value'         => $res->value
        ]);
        $res->session()->flash('success','Operation Success');

        
        return redirect()->route('projects');
    }

    function delete($id){
    	Projects::where('id', $id)->delete();

	
		session()->flash('success','Operation Success');

        
        return redirect()->route('projects');
    
    }

    function print($id){

        $data = Projects::select('id','name','details','price','customer_id','player_id','created_at')
        ->where('id','=',$id)
        ->with(['customer','players','players.department'])
        ->get();
        foreach($data as $r)
            $pay = ProjectPayment::select('project_id','value')->where('project_id',$r->id)->get();

        return view('dashboard.projects.print',compact('data','pay'));

    }

}
