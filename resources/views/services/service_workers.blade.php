@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
@section('title')
تعديل خدمة - الشئون الإدارية
@stop

@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                خدمة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('services.index') }}">رجوع</a>
                    </div>
                </div><br>

                <div class="row mg-b-20">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>مقدم الطلب:</strong>
                            {{ $client->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الموقع:</strong>
                            {{ $client->location }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>تاريخ تنفيذ الطلب:</strong>
                            {{ $service->request_date }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>بيان اﻷعمال المطلوبة:</strong>
                            {{ $service->description }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>نوع الخدمة:</strong>
                            {{ $service->type }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>الحالة:</strong>
                            {{ $service->status }}
                        </div>
                    </div>                      
                </div>
                    
                <form action="{{ route('workers_evaluation') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div id="workers_evaluation" class="col">
                        <label for="inputName" class="control-label">العمال</label>
                        <div class="card-body">
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            {{-- <input type="hidden" id="workers[]"  name="workers[]" value="{{$selected_workers}}"/> --}}
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>اﻹسم</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($selected_workers as $worker)
                                        <input type="hidden" name="workers[]" value="{{$worker->id}}"/>
                                        <tr>
                                        <td>{{$worker->name}}</td>
                                            
                                        <td>
                                        <select name="status[{{$worker->id}}]"  class="form-control nice-select custom-select">
                                            <!--placeholder-->
                                            <option value=""></option>
                                            <option value="غياب بدون إذن"  {{($worker->pivot->status=='غياب بدون إذن')?'selected':''}}>غياب بدون إذن</option>
                                            <option value="حضور بزى" {{($worker->pivot->status=='حضور بزى')?'selected':''}}>حضور بزى</option>
                                            <option value="حضور بدون زى" {{($worker->pivot->status=='حضور بدون زى')?'selected':''}}>حضور بدون زى</option>
                                        </select>  
                                        </td>
                                        <!--td><input type="checkbox" name="uniform[{{$worker->id}}]" {{($worker->pivot->uniform=='1')?'checked':''}}/></td-->
                                        </tr>
                                        @endforeach 

                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">تقييم</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
@endsection