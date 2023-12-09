<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->roles->first()->name == 'طالب الخدمة' || Auth::user()->roles->first()->name == 'مشرف') {
            $data = Auth::user()->services()->orderBy('id','DESC')->get();
        } else {
            $data = Service::orderBy('id','DESC')->get();
        }
    return view('services.show_services',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.add_service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'type' => 'required',
        'request_date' => 'required|date|after_or_equal:today'
        ]);

        $request->request->add(
            ['name'=> Auth()->user()->name]
            );

        $input = $request->all();
        $input['status'] = 'قيد الانتظار';

        $service = Service::create($input);
        //$user = User::find(Auth::user()->id);
        $service->users()->sync(Auth::user()->id);
        sendNotification($request);

        return redirect()->route('services.index')
        ->with('success','تم اضافة الخدمة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        $workers = $service->workers()->pluck('name');
        $supervisors = $service->supervisors()->pluck('name');
        return view('services.show',compact('service', 'workers', 'supervisors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);

        $workers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'عامل');
            }
            )->get();

        $supervisors = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'مشرف');
                }
                )->get();

        $client = $service->client();
        //dd($client);
        $selected_workers = $service->workers()->pluck('id')->toArray();
        $selected_supervisors = $service->supervisors()->pluck('id')->toArray();
        //$selected_workers = collect([1,2,3]);
        //$selected_workers = [1,2,3];
        return view('services.edit_service',compact('service', 'workers', 'supervisors', 'selected_workers', 'selected_supervisors', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function workers($id)
    {
        $service = Service::find($id);
        $client = $service->client();
        //dd($service);
        $selected_workers = $service->workers()->get(); //->pluck('name', 'id')->toArray()
        //$attendance = $service->workers()->get(); //->pluck('id', 'attendance')
        //dd($attendance);
        //dd($selected_workers);
        return view('services.service_workers',compact('service', 'selected_workers', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /*$this->validate($request, [
            'type' => 'required',
            'request_date' => 'required|date|after_or_equal:today'
            ]);*/

            $input = $request->all();
            //dd($input);
            $workers = $request->workers?$request->workers:[];
            $supervisors = $request->supervisors?$request->supervisors:[];

            $service = Service::findOrFail($request->service_id);
            $service->update($input);

            //$service->users()->sync($request->client_id);
            $service->users()->sync(array_merge($workers,$supervisors,[$request->client_id]));
            //$service->users->sync($request->supervisors);
            if(auth()->user()->hasRole('owner')){
                sendNotification($request);
            }
            return redirect()->route('services.index')->with('success','تم تحديث معلومات الخدمة بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function evaluation(Request $request)
    {
        $input = $request->all();
        $service = Service::findOrFail($request->service_id);
        $service->update($input);
        return redirect()->route('services.index')
        ->with('success','تم التقييم');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function workers_evaluation(Request $request)
    {
        //$input = $request->all();

        $service = Service::findOrFail($request->service_id);
        $workers = $request->workers?$request->workers:[];
        $status = $request->status?$request->status:[];
        $a = array_flip($workers);
        foreach ($a as $key => &$value) {
            $value = [];
            if (array_key_exists($key ,$status)) {
                $value['status'] = $status[$key];
            }else{
                $value['status'] = 0;
            }
        }

        $service->users()->syncWithoutDetaching($a);
        return redirect()->route('services.index')
        ->with('success','تم التقييم');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Service::find($request->service_id)->delete();
        return redirect()->route('services.index')->with('success','تم حذف الخدمة بنجاح');
    }
}
