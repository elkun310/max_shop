<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{customer,order};
use Carbon\carbon;
class ReportController extends Controller
{
    public function getReport(){
        $data['reports']=customer::where('state','1')->paginate(6);
        $data['count']=customer::where('state','1')->count();
        //$data['sum_quantity']=customer::where('state','1')->first()->order()->sum('quantity');
        $data['sum_money']=customer::where('state','1')->sum('total');
        return view('backend.report.report',$data);
    }
    public function sortByMonth(Request $r){
        if($r->month==""){
            $data['reports']=customer::where('state','1')->paginate(6);
            $data['count']=customer::where('state','1')->count();
            $data['sum_money']=customer::where('state','1')->sum('total');
        }
        else if($r->month!=""){
            $data['reports']=customer::where('state','1')->whereMonth('updated_at',$r->month)->paginate(6);
            $data['count']=customer::where('state','1')->whereMonth('updated_at',$r->month)->count();
            $data['sum_money']=customer::where('state','1')->whereMonth('updated_at',$r->month)->sum('total');
        }
        
        // echo $r->month;
        return view('backend.report.reportbymonth',$data);
        
    }
    public function paginate(Request $r){
        $skip = ($r->number-1)* 6;
       
        $data['count']=customer::where('state','1')->count();
        // dd($skip);
        //dd($data['count']);die;
        $take=$data['count']-$skip;
        $data['reports']=customer::where('state','1')->skip($skip)->take($take)->get();
        //$data['reports']=customer::where('state','1')->skip($skip)->take(6)->paginate(6);
        // dd($data['reports']);die;
        $data['count']=customer::where('state','1')->count();
        $data['sum_money']=customer::where('state','1')->sum('total');
        return view('backend.report.report_paginate',$data);
        //dd($data['reports']);
    }
}
