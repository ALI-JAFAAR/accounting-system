<?php

namespace App\Traits;

use App\Models\AdminCosts;
use App\Models\Bounce;
use App\Models\Costs;
use App\Models\Department;
use App\Models\Players;
use App\Models\Projects;
use App\Models\ProjectPayment;
use App\Models\Salary;

trait Helpers {

	function revenue_report(){
    	$project   = Projects::select('id','price','customer_id','player_id','created_at','name','details')->whereMonth('created_at',date('m'))->get();
        $price = 0;
        $project_price = 0;
        foreach ($project as $pro)
            $project_price +=  $pro->price;
        
        $bounce = $this->get_bounce();
        $bounc = 0;
        $precent = 0;
        foreach($bounce as $bnc){
            
            if($bnc->value >= $project_price){
                $bounc   = $bnc->value;
                $precent = $bnc->procentage;
            }
        }
        $markting_user = $this->get_markting_member();        
        $bounc = $bounc * $precent /100;
        if($bounc != 0 && $precent != 0)
            $project_price = $project_price - ($bounc * $markting_user);

        $salaries = $this->get_salaries();
        $project_price = $project_price - $salaries;
        $admin_cost = $this->get_admin_cost();
        $project_price -= $admin_cost;
        
        $cost = $this->get_cost();
        
        $project_price -= $cost;
        $total = $this->total_revenue();
        return  $project_price;
    }

    function get_bounce(){
        $bounce = Bounce::all();
        return $bounce;
    }

    function admin_costs(){
    	$x = AdminCosts::select('id','value','created_at')->whereMonth('created_at',date('m'));
    	$total = 0;
    	foreach($x as $z)
    		$total+= $z->value;    	
    	return $total;
    }

    function get_employee(){
        $dept = Department::select('id')->where('name','Marketing')->get();
        foreach($dept as $d)
        $user = Players::select('id','name','department_id')->whereNotIn('department_id',[$d->id])->get();
        return count($user);
    }

    function get_markting_member(){
        $usr = array();
        try { 
            $dept = Department::select('id')->where('name','Marketing')->get();
            foreach($dept as $d)
                $usr = Players::select('id','name','department_id')->where('department_id',$d->id)->get();
        } catch (Exception $e) {
            return $e;
        }
            return count($usr);
        
    }

    function get_admin_cost(){
        $data = AdminCosts::select('id','value')->whereMonth('created_at',date('m'))->get();
        $total =0;
        foreach($data as $row)
            $total +=$row->value;
        return $total;
    }

    function get_cost(){
        $data = Costs::select('id','amount')->whereMonth('created_at',date('m'))->get();
        $total =0;
        foreach($data as $row)
            $total +=$row->amount;
        return $total;
    }



    function total_revenue(){
        $data =array();
        for($i=1;$i<=12;$i++){
            $j=0;
            $project   = Projects::select('id','price','customer_id','player_id','created_at','name','details')->whereMonth('created_at',$i)->get();
            $price = 0;
            $project_price = 0;
            foreach ($project as $pro)
                $project_price += $pro->price;
            $bounce = $this->get_bounce();
            $bounc = 0;
            $precent = 0;
            foreach($bounce as $bnc){    
                if($bnc->value >= $project_price){
                    $bounc   = $bnc->value;
                    $precent = $bnc->procentage;
                }
            }
            $markting_user = $this->get_markting_member();        
            $bounc = $bounc * $precent /100;
            if($bounc != 0 && $precent != 0)
                $project_price = $project_price - ($bounc * $markting_user);
            $salaries = $this->get_salaries();
            $project_price = $project_price -  $salaries;
            $admin_cost = $this->total_admin_cost($i);
            $project_price -= $admin_cost;
            $cost = $this->total_cost($i);
            $project_price -= $cost;
            $salary = $this->get_month_salaries($i);
            array_push($data,[ $j => array(
                    "revenue"     => $project_price,
                    "costs"       => $cost,
                    "admin_cost"  => $admin_cost,
                    "salary"      => $salary
                  )
            ]);
            $j++;
        }
        return $data;
    }

    function total_admin_cost($i){
        $data = AdminCosts::select('id','value')->whereMonth('created_at',$i)->get();
        $total =0;
        foreach($data as $row)
            $total +=$row->value;
        return $total;
    }

    function total_cost($i){
        $data = Costs::select('id','amount')->whereMonth('created_at',$i)->get();
        $total =0;
        foreach($data as $row)
            $total +=$row->amount;
        return $total;
    }

    function get_month_salaries($i){
        $data = Salary::select('id','value','player_id')->whereMonth('created_at',$i)->with('player')->get();
        $total = 0;
        foreach ($data as $row)
            $total += $row->value;
        
        return $total;
    }

    function get_salaries(){
        $data = Salary::select('id','value','player_id')->with('player')->get();
        $total = 0;
        foreach ($data as $row)
            $total += $row->value;
        
        return $total;
    }

    function bounce_count(){
        $project   = Projects::select('id','price','customer_id','player_id','created_at','name','details')->whereMonth('created_at',date('m'))->get();
        $project_price = 0;
        foreach ($project as $pro)
            $project_price +=  $pro->price;
        $bounce = $this->get_bounce();
        $bounc = 0;
        $precent = 0;
        foreach($bounce as $bnc){    
            if($bnc->value >= $project_price){
                $bounc   = $bnc->value;
                $precent = $bnc->procentage;
            }
        }
        return $bounc;
    }

}