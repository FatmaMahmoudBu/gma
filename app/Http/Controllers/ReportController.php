<?php

namespace App\Http\Controllers;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $clients = User::all()->where('roles_name', ["طالب الخدمة"]);
        $workers = User::all()->where('roles_name', ["عامل"]);
        $supervisors = User::all()->where('roles_name', ["مشرف"]);
        $services = Service::all()->count();
        $user = Auth::user();      
        //dd($supervisors);
        return view('reports/report1',compact('clients', 'services', 'workers', 'supervisors'));      
    }

    //SHOW DATABETWEEN DEFINITE DATES
    public function show(Request $request){
        $clients = User::all()->where('roles_name', ["طالب الخدمة"]);
        $workers = User::all()->where('roles_name', ["عامل"]);
        $supervisors = User::all()->where('roles_name', ["مشرف"]);
        $services = Service::all()->count();
        $user = Auth::user();     
        $input = $request->all();
        //dd($input);

        return view('reports/report1',compact('clients', 'services', 'workers', 'supervisors', 'input'));
    }
}
