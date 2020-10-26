<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Bounce;
use App\Models\Players;
use App\Models\Salary;
use App\User;
use Validator;

class SettingsController extends Controller{

	function index(){
    	$settings = 'active';
        $bnc      = Bounce::all();
        $pla      = Players::all();
        $data = Salary::select('id','value','player_id')->with('player')->get();

    	return view('dashboard.settings.index',compact(['settings','bnc','pla','data']));
    }

	function bounce(Request $res){
    	$this->validate($res,[
            'value'     => 'required',
            'pre'  => 'required',
        ]);
        Bounce::create([
        	'value'  		=> $res->value,
        	'procentage'	=> $res->pre
        ]);
        $res->session()->flash('success','Operation Success');
        return redirect()->route('settings');
    }
    
    function pass(Request $res){
        $this->validate($res,[
            'password'     => 'required'
        ]);
        $affected = User::where('id', $res->admin_id)
              ->update(['password' => Hash::make($res->password)]);
        return redirect()->route('settings');
    }

    function salary(Request $res){
        $this->validate($res,[
            'salary'     => 'required',
            'pla'     => 'required'
        ]);

        Salary::create([
            'value'        => $res->salary,
            'player_id'  => $res->pla
        ]);
        session()->flash('success','Operation Success');
        return redirect()->route('settings');
    }

    function bounce_delete($id){
        Bounce::where('id', $id)->delete();

    
        session()->flash('success','Operation Success');

        
        return redirect()->route('settings');
    
    }

    function salary_delete($id){
        Salary::where('id', $id)->delete();

    
        session()->flash('success','Operation Success');

        
        return redirect()->route('settings');
    
    }
}
