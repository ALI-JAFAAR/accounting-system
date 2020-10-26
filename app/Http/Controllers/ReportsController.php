<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\Helpers;

class ReportsController extends Controller{
    
    use Helpers;

    function index(){

        $total         = $this->total_revenue();
        $cost          = $this->get_cost(); 
        $admin_cost    = $this->get_admin_cost();
        $project_price = $this->revenue_report();
        $salary        = $this->get_salaries();
        $bounce        = $this->bounce_count();
        $reports       = 'active';
        
    	return view('dashboard.reports.index',compact(['project_price','cost','admin_cost','reports','total','salary','bounce']));
    }

}













