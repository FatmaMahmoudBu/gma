@extends('layouts.master')
@section('css')
<!--Internal  Font Awesome -->
<link href="{{URL::asset('assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!--Internal  treeview -->
<link href="{{URL::asset('assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />


@section('title')
عرض الخدمة - الشئون الإدارية
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                الخدمة</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									<div class="pull-right">
                                        <a class="btn btn-primary btn-sm" href="{{ route('services.index') }}">رجوع</a>
                                    </div>
								</div><br />
								<h4 class="mg-b-20">{{ $service->description }}</h4>
								<div class="table-responsive">
									<table class="table main-table-reference text-nowrap mb-0 mg-t-5">
										<thead>
											<tr>
												<th class="wd-20p">الإسم</th>
												<th class="wd-80p">الوصف</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><code><p>الجهة الطالبة</p></code></td>
												<td>{{$service->client()->name}}</td>
											</tr>
											<tr>
												<td><code><p>تاريخ تنفيذ الطلب</p></code></td>
												<td>{{ $service->request_date }}</td>
											</tr>
											<tr>
												<td><code><p>الحالة</p></code></td>
												<td>{{ $service->status }}
                                                    @if($service->status == 'تم التأجيل' && !empty($service->reject_reason))
                                                    <strong>سبب التأجيل:</strong>
                                                    {{ $service->reject_reason }}
                                                    @endif</td>
											</tr>
                                            <tr>
												<td><code><p>العمال</p></code></td>
												<td>@if(!empty($workers))
                                                    @foreach($workers as $worker)
                                                    <label class="bg-success text-white p-1">{{ $worker }}</label>
                                                    @endforeach
                                                    @endif</td>
											</tr>
											<tr>
												<td><code><p>المشرفين</p></code></td>
												<td>@if(!empty($supervisors))
                                                    @foreach($supervisors as $supervisor)
                                                    <label class="bg-success text-white p-1">{{ $supervisor }}</label>
                                                    @endforeach
                                                    @endif</td>
											</tr>
                                            @if(!empty($service->evaluation))<tr>
												<td><code><p>مخطط</p></code></td>
												<td>
                                                    <strong>التقييم:</strong>
                                                    {{ $service->evaluation }}
                                                    </td>
											</tr>@endif

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
@endsection
