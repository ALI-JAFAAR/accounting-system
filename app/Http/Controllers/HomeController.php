<?php

namespace App\Http\Controllers;

use App\Traits\Helpers;
class HomeController extends Controller{
    use Helpers;
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(){  
        $revenue    = $this->revenue_report(); 
        $cost       = $this->get_cost();
        $admin_cost = $this->get_admin_cost();
        $salary     = $this->get_salaries();
        $index      = 'active';
        return view('dashboard.index',compact(['index','revenue','cost','admin_cost','salary']));
    }
}
