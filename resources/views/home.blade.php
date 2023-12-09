@extends('layouts.master')
@section('title')
    لوحة التحكم - برنامج الشئون الإدارية
@stop
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
<!--style>
    .main-body {
  background-image: url('../../assets/img/backgrounds/6.jpg') !important; }
  </style-->

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <button onclick="startFCM()" class="btn btn-success btn-sm">السماح بالإشعارات</button>
            </div>
        </div>
        @if(auth()->user()->hasRole('owner'))
        <div class="main-dashboard-header-right">
            <div>
                <label style="color:#000;">عدد الإدارات</label>
                    <h5>{{$clients->count()}}</h5>
            </div>
            <div>
                <label style="color:#000;">إجمالى الخدمات</label>
                <h5>{{$services}}</h5>
            </div>
            <!--div>
                <label class="tx-13">Offline Sales</label>
                <h5>783,675</h5>
            </div-->
        </div>
        @endif
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
<h5>إحصائيات</h5><br />
                <!-- row -->
            @if(auth()->user()->hasRole('owner'))
            <div class="row row-sm">
                <?php
                $i=0;
                $bg_style="";
                foreach ($clients as $index => $client) {
                        if($i%4 == 1){
                            $bg_style="bg-primary-gradient";
                        } else if($i%4 == 2){
                            $bg_style="bg-danger-gradient";
                        } else if($i%4 == 3){
                            $bg_style="bg-success-gradient";
                        } else if($i%4 == 0){
                            $bg_style="bg-warning-gradient";
                        }
                        if($client->services()->count()>0) { $i++; ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                            <div class="card overflow-hidden sales-card {{$bg_style}} ">
                                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                                    <div class="">
                                        <h6 class="mb-3 tx-12 text-white">{{$client->name}}</h6>
                                    </div>
                                    <div class="pb-0 mt-0">
                                        <div class="d-flex">
                                            <div class="">
                                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$client->services->count()}}</h4>
                                                <p class="mb-0 tx-12 text-white op-7">منذ 2022-06-19</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }}?>
                        @endif
                </div>
            <!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
