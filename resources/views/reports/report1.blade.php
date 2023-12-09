@extends('layouts.master')
@section('title')
    لوحة التحكم - برنامج الشئون الإدارية
@stop
@section('css')
                <!--Internal  Datetimepicker-slider css -->
                <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
                <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
                <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
                @endsection
                @section('page-header')
                <!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
                    <div class="my-auto">
                        <div class="d-flex">
                            <h4 class="content-title mb-0 my-auto">التقييمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                                تقييم العمال</span>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb -->
@endsection

@section('content')
                <!--div-->
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            <div class="pull-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('report1') }}">رجوع</a>

                                <input type="button" value="طباعة" onclick="PrintDiv();" />
                            </div>
                        </div>
                        <br />
                            @if(auth()->user()->hasRole('owner'))
                            <!-- row opened -->
                                <form class="parsley-style-1" id="form1" autocomplete="off" name="form1"
                                    action="{{route('report1_show')}}" method="post">
                                    {{csrf_field()}}
                                    <!-- row opened -->
                                    <div class="row row-sm">
                                        <div class="input-group col-md-4">
                                            من: <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="from" id="from">
                                        </div>
                                        <div class="input-group col-md-4">
                                            إلى: <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text"  name="to" id="to">
                                        </div>
                                        <button class="btn btn-main-primary pd-x-20" type="submit">بحث</button>
                                    </div>
                                    <!-- /row -->
<br/>
                                    @if(isset($supervisors))
                                    <!--div-->
                                    <!-- row opened -->
                                    <div class="row row-sm">
                                        <!--div-->
                                        <div class="col-md-12">
                                            <div class="card">
                                                <!--div class="card-header pb-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h4 class="card-title mg-b-0">STRIPED ROWS</h4>
                                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                                    </div>
                                                    <p class="tx-12 tx-gray-500 mb-2">Example of Valex Striped Rows.. <a href="">Learn more</a></p>
                                                </div-->
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mg-b-0 text-md-nowrap">                                           
                                                        <caption style="caption-side:top;text-align:center">
                                                        @php 
                                                        if(isset($input)){
                                                        $from = \Carbon\Carbon::parse($input['from'])->format('Y-m-d');
                                                                    $to = \Carbon\Carbon::parse($input['to'])->format('Y-m-d');
                                                        }
                                                        @endphp
                                                        @if(isset($input))
                                                        تقرير المشرفين فى الفترة من {{$from}} إلى {{$to}}
                                                        @else
                                                        {{date('M Y')}}
                                                        @endif
                                                        </caption>                                          
                                                            <thead>
                                                                <tr>
                                                                    <th>اسم المشرف</th>
                                                                    <th>المأموريات</th>
                                                                    <!--th>التاريخ</th-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($supervisors as $supervisor) 
                                                            @php                                                
                                                                $supervisor_services = $supervisor->services()->whereYear('request_date', '=', date('Y'))->whereMonth('request_date', '=', date('m'))->orderBy('request_date','desc')->get();
                                                                if(isset($input)){
                                                                    $from = \Carbon\Carbon::parse($input['from'])->format('Y-m-d');
                                                                    $to = \Carbon\Carbon::parse($input['to'])->format('Y-m-d');
                                                                    $supervisor_services = $supervisor->services()->whereBetween('request_date', [$from, $to])->orderBy('request_date','desc')->get();
                                                                }                                                
                                                            @endphp
                                                            @if($supervisor_services->count()>0)
                                                                <tr>
                                                                    <th scope="row">{{$supervisor->name}}</th>
                                                                    <td>{{$supervisor_services->count()}}</td>
                                                                    <!--td>
                                                                    @foreach ($supervisor_services as $service) 
                                                                    {{$service->request_date}} <br />
                                                                    @endforeach
                                                                    </td-->
                                                                </tr>
                                                            @else
                                                            @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!-- bd -->
                                                </div><!-- bd -->
                                            </div><!-- bd -->
                                        </div>
                                        </div>
                                        @endif
                                        <br />

                                    <!-- row opened -->
                                    <div class="row row-sm" id="divToPrint">
                                        <!--div-->
                                        <div class="col-md-12" style="text-align: center;direction: rtl;">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mg-b-0 text-md-nowrap">
                                                        <caption style="caption-side:top;text-align:center">
                                                        @php 
                                                        if(isset($input)){
                                                        $from = \Carbon\Carbon::parse($input['from'])->format('Y-m-d');
                                                                    $to = \Carbon\Carbon::parse($input['to'])->format('Y-m-d');
                                                        }
                                                        @endphp
                                                        @if(isset($input))
                                                        تقرير العمال فى الفترة من {{$from}} إلى {{$to}}
                                                        @else
                                                        {{date('M Y')}}
                                                        @endif
                                                        </caption>
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: right;">اسم العامل</th>
                                                                    <th>عدد مرات الإشتراك</th>
                                                                    <th>عدد مرات الغياب بدون إذن</th>
                                                                    <th>عدد مرات الحضور الفعلى</th>
                                                                    <th>عدد مرات الحضور بالزى</th>
                                                                    <th>عدد مرات الحضور بدون الزى</th>
                                                                    <!--th>العمليات</th-->
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($workers as $worker) 
                                                            @php 

                                                                if(isset($input)){
                                                                    $from = \Carbon\Carbon::parse($input['from'])->format('Y-m-d');
                                                                    $to = \Carbon\Carbon::parse($input['to'])->format('Y-m-d');
                                                                    $worker_services = $worker->services()
                                                                    ->whereBetween('request_date', [$from, $to])                                                                    
                                                                    ->groupBy('user_id')
                                                                    ;

                                                                    $worker_absence = $worker->services()
                                                                    ->whereBetween('request_date', [$from, $to]) 
                                                                    ->where('service_user.status', '=', 'غياب بدون إذن')
                                                                    ->groupBy('user_id')
                                                                    ->count('service_user.user_id');

                                                                    $worker_attendance=$worker_services->count() - $worker_absence;

                                                                    $worker_uniform1 = $worker->services()
                                                                    ->whereBetween('request_date', [$from, $to]) 
                                                                    ->where('service_user.status', '=', 'حضور بزى')
                                                                    ->groupBy('user_id')
                                                                    ->count('service_user.user_id');

                                                                    $worker_uniform0 = $worker->services()
                                                                    ->whereBetween('request_date', [$from, $to]) 
                                                                    ->where('service_user.status', '=', 'حضور بدون زى')
                                                                    ->groupBy('user_id')
                                                                    ->count('service_user.user_id');
                                                                } else {
                                                                    $worker_services = $worker->services()
                                                                        ->whereYear('request_date', '=', date('Y'))
                                                                        ->whereMonth('request_date', '=', date('m'))                                  //->get()
                                                                        ;   

                                                                    $worker_absence = $worker->services()
                                                                    ->whereYear('request_date', '=', date('Y'))
                                                                    ->whereMonth('request_date', '=', date('m'))
                                                                    ->where('service_user.status', '=', 'غياب بدون إذن')
                                                                    ->count('service_user.user_id');

                                                                    $worker_attendance=$worker_services->count() - $worker_absence;

                                                                    $worker_uniform1 = $worker->services()
                                                                    ->whereYear('request_date', '=', date('Y'))
                                                                    ->whereMonth('request_date', '=', date('m'))
                                                                    ->where('service_user.status', '=', 'حضور بزى')
                                                                    ->count('service_user.user_id');

                                                                    $worker_uniform0 = $worker->services()
                                                                    ->whereYear('request_date', '=', date('Y'))
                                                                    ->whereMonth('request_date', '=', date('m'))
                                                                    ->where('service_user.status', '=', 'حضور بدون زى')
                                                                    ->count('service_user.user_id');
                                                                }
                                                                                                               
                                                            @endphp
                                                            @if($worker_services->count()>0)
                                                                <tr>
                                                                    <th style="text-align: right;" scope="row">{{$worker->name}}</th>
                                                                    <td>{{$worker_services->count()}}</td>
                                                                    <td>{{$worker_absence}}</td>
                                                                    <td>{{$worker_attendance}}</td>
                                                                    <td>{{$worker_uniform1}}</td>
                                                                    <td>{{$worker_uniform0}}</td>  
                                          
                                                                </tr>
                                                            @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div><!-- bd -->
                                                </div><!-- bd -->
                                            </div><!-- bd -->
                                        </div>
                                        <!--/div-->

                                    </div>
                                </form>
                                
                            <!-- /row -->
                             @endif
                        </div>
                    </div>
                </div>
                <!--/div-->

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Ion.rangeSlider.min js -->
<script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!--Internal  pickerjs js -->
<script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

 <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

@endsection


