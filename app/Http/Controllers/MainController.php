<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Modal\Claint;
use Hash;
use App\User;
class MainController extends Controller{

    function index(){
        return view('dashboard.login.login');
    }

    function check_login(Request $res){
        $this->validate($res,[
            'name'     => 'required',
            'password'  => 'required|min:3',
        ]);
        $data = array(
            'name'     => $res->get('name'),
            'password'  => $res->get('password')
        );
       // dd($data);
        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return back()->with('eros','Wrong login details');
        }
    }
    
    function logout(){
        Auth::logout();
        return redirect('login');
    }
}