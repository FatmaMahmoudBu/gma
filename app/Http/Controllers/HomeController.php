<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = User::all()->where('roles_name', ["طالب الخدمة"]);
        $workers = User::all()->where('roles_name', ["عامل"]);
        $supervisors = User::all()->where('roles_name', ["مشرف"]);
        $services = Service::all()->count();
        $user = Auth::user();

        if($user->Status == 'غير مفعل'){
            return redirect(route('edit_profile',['id' => $user->id]))->with('notice_message','لقد تم تسجيل الدخول على النظام، سوف يتم تعديل صلاحياتك لإمكانية استخدام النظام من قبل مدير النظام');
            //return view('users.edit_profile',compact('user'));
        }
        //CHECK IF USER CHANGED HIS PASSWORD OR NOT
        else if($user->flag == 0){
            return redirect(route('edit_profile',['id' => $user->id]))->with('notice_message','تنويه: كلمة المرور المستخدمة حاليا هى كلمة المرور الإفتراضية.<br> من فضلك قم بتغيير كلمة المرور وحفظها فى مكان آمن للاستخدام لاحقا.');
            //return view('users.edit_profile',compact('user'));
        }else{
            return view('home',compact('clients', 'services', 'workers', 'supervisors'));
        }
    }
}
