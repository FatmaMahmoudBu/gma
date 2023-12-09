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

                <form action="{{ url('services/update') }}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}

                    <div class="row mg-b-20">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                            
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

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

                        @if(auth()->user()->hasRole('طالب الخدمة'))
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <div class="col">
                                <label for="request_date" class="control-label">تاريخ تنفيذ الطلب</label>
                                <input class="form-control fc-datepicker" data-parsley-class-handler="#lnWrapper" name="request_date" placeholder="YYYY-MM-DD"
                                        type="text" value="{{ $service->request_date }}" required>
                            </div>
                            <div class="col">
                                <label for="description">بيان اﻷعمال المطلوبة</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $service->description }}</textarea>
                            </div>
                            <div class="col">
                                <label for="type" class="control-label">نوع الخدمة</label>
                                <select name="type" id="type" class="form-control  nice-select  custom-select" style="z-index: 12254545454;">
                                    <!--placeholder-->
                                    <option value="{{ $service->type }}">{{ $service->type }}</option>
                                    <option value="نقل أثاث">نقل أثاث</option>
                                    <option value="نقل أجهزه">نقل أجهزه</option>
                                    <option value="أعمال نظافه">أعمال نظافه</option>
                                    <option value="التجهيز لأعمال الامتحانات">التجهيز لأعمال الامتحانات</option>
                                    <option value="اعمال التعقيم">اعمال التعقيم</option>
                                    <option value="فرش وتوزيع أثاث">فرش وتوزيع أثاث</option>
                                </select>
                            </div>
                            <div>
                                <br />
                            </div>
                            <div class="col justify-content-right">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>
                            <div>
                                <br />
                            </div>
                        </div>
                        @else
                        @can('تعديل حالة الخدمة')
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">

                            <div class="col">
                                <label for="status" class="control-label"><strong>تعديل الحالة:</strong> </label>
                                <select name="status" id="status" class="form-control nice-select custom-select" onchange="showFields(this)">
                                    <!--placeholder-->
                                    <option value="{{ $service->status }}">{{ $service->status }}</option>
                                    <option value="قيد الانتظار">قيد الانتظار</option>
                                    <option value="تم القبول">تم القبول</option>
                                    <option value="تم التأجيل">تم التأجيل</option>
                                    <option value="تم اكتمال الخدمة">تم اكتمال الخدمة</option>
                                </select> 
                            </div>
                            <br />
                            <div id="reject_reason_div" class="col" style="display: none;">
                                <label for="reject_reason">سبب التأجيل</label>
                                <textarea class="form-control" id="reject_reason" name="reject_reason" rows="3">{{ $service->reject_reason }}</textarea>
                                <br />
                                <label for="request_date" class="control-label">تاريخ تنفيذ الطلب</label>
                                <input class="form-control fc-datepicker" data-parsley-class-handler="#lnWrapper" name="request_date" placeholder="YYYY-MM-DD"
                                        type="text" value="{{ $service->request_date }}" required>
                              
                            </div>    

                            @can('اضافة وتعديل العمال')
                                <div id="workers_div" class="col" style="display: none;">
                                    <label for="inputName" class="control-label">العمال</label>
                                    <select name="workers[]" class="form-control" multiple="">
                                        <!--placeholder-->
                                        @foreach ($workers as $worker)
                                            <option {{in_array($worker->id,$selected_workers)?'selected':''}} value="{{ $worker->id }}"> {{ $worker->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endcan

                            @can('اضافة وتعديل المشرفين')
                                <div class="col" id="supervisors_div" class="col" style="display: none;">
                                    <label for="inputName" class="control-label">المشرفين</label>
                                    <select name="supervisors[]" class="form-control" multiple>
                                        <!--placeholder-->
                                        @foreach ($supervisors as $supervisor)
                                            <option {{in_array($supervisor->id,$selected_supervisors)?'selected':''}} value="{{ $supervisor->id }}"> {{ $supervisor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endcan

                            <div>
                                <br />
                            </div>
                            <div class="col justify-content-right">
                                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                            </div>
                            <div>
                                <br />
                            </div>

                        </div>

                        @endcan
                        @endif  

                    </div>                    
                </div>          

                    @can('تقييم الخدمة')
                    <div class="col-lg-3">
                    </div>
                    <div id="evaluation_div" class="col-lg-6" style="display: none;">
                        <label for="evaluation">تقييم الخدمة</label>
                            <textarea class="form-control" id="evaluation" name="evaluation" rows="3">{{ $service->evaluation }}</textarea>
                    </div>
                    @endcan           

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

<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>

<!--Internal  Datepicker js -->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();

</script>

<script>
    $(document).ready(function(){
        showFields(document.getElementById('status'));
    });

    function showFields(selectObject) {
        var value = selectObject.value;  
        var workers_div = document.getElementById('workers_div');
        var supervisors_div = document.getElementById('supervisors_div');
        var reject_reason_div = document.getElementById('reject_reason_div');
        if(value == 'تم القبول'){
            workers_div.style.display = 'block';
            supervisors_div.style.display = 'block';
            reject_reason_div.style.display = 'none';
        } else if(value == 'تم التأجيل') {
            workers_div.style.display = 'none';
            supervisors_div.style.display = 'none';
            reject_reason_div.style.display = 'block';
        } else {
            workers_div.style.display = 'none';
            supervisors_div.style.display = 'none';
            reject_reason_div.style.display = 'none';
        }
    }

    function show_evaluation(clickedBox) {
        // Get the checkbox
        var status = document.getElementById("status");
        // Get the output text
        var evaluation_div = document.getElementById("evaluation_div");

        // If the checkbox is checked, display the output text
        if (clickedBox.checked == true){
            evaluation_div.style.display = "block";
        } else {
            evaluation_div.style.display = "none";
        }
    }

    $('select[multiple]').multiselect({
    columns: 2,
    placeholder: 'Select options'
    });


</script>



@endsection