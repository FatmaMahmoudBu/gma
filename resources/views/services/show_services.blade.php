@extends('layouts.master')
@section('css')

@section('title')
    الخدمات - جامعة بنها - الشئون الإدارية
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                الخدمات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                @if(auth()->user()->hasRole('طالب الخدمة'))
                @can('إضافة خدمة')
                <div class="col-sm-1 col-md-2">
                    <a class="btn btn-primary btn-sm" href="{{ route('services.create') }}">طلب خدمة</a>
                </div>
                @endcan
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover" id="example1" data-page-length='10' style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">التاريخ</th>
                                <th class="wd-20p border-bottom-0">نوع الخدمة</th>
                                <th class="wd-15p border-bottom-0">مقدم الطلب</th>
                                <th class="wd-15p border-bottom-0">الحالة</th>
                                <th class="" style="width=15%">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $service)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $service->request_date }}</td>
                                    <td>{{ $service->type }}</td>
                                    <td>{{ ($service->client()!==null)?$service->client()->name:'' }}</td>
                                    <td>
                                        @if ($service->status == 'قيد الانتظار')
                                            <span class="label text-info d-flex">
                                                <div class="dot-label bg-info ml-1"></div>{{ $service->status }}
                                            </span>
                                        @elseif ($service->status == 'تم القبول')

                                            <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>{{ $service->status }}
                                            </span>
                                        @elseif ($service->status == 'تم التأجيل')

                                        <span class="label text-danger d-flex">
                                            <div class="dot-label bg-danger ml-1"></div>{{ $service->status }}
                                        </span>
                                        @elseif ($service->status == 'تم اكتمال الخدمة')

                                        <span class="label text-primary d-flex">
                                            <div class="dot-label bg-primary ml-1"></div>{{ $service->status }}
                                        </span>
                                        @endif
                                    </td>

                                    <td>
                                        @can('عرض خدمة')
                                        <a class="btn btn-success btn-sm" href="{{ route('services.show', $service->id) }}">عرض</a>
                                        @endcan

                                        @can('تعديل خدمة')
                                        @if($service->status == 'قيد الانتظار' || auth()->user()->hasRole('owner'))
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-info"
                                            title="تعديل">تعديل</a>
                                        @endif
                                        @endcan

                                        @can('حذف خدمة')
                                        @if($service->status != 'قيد الانتظار')
                                        @else
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-service_id="{{ $service->id }}" data-description="{{ $service->description }}"
                                            data-toggle="modal" href="#modaldemo8" title="حذف">حذف</a>
                                        @endif
                                        @endcan

                                        @can('تقييم الخدمة')
                                        @if($service->status != 'تم القبول')
                                        @elseif(auth()->user()->hasRole('طالب الخدمة'))
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-service_id="{{ $service->id }}" data-evaluation="{{ $service->evaluation }}"
                                            data-toggle="modal" href="#modaldemo10" title="تقييم">تقييم</a>
                                        @endif
                                        @endcan

                                        @php
                                            $not_evaluated = false;
                                        @endphp
                                        @foreach ($service->workers()->get() as $worker)
                                        @if($worker->pivot->status == null)
                                        @php
                                            $not_evaluated = true;
                                        @endphp
                                        @else
                                        @endif
                                        @endforeach

                                        @can('تقييم العمال')
                                        @if($service->status != 'قيد الانتظار')
                                        <a href="{{ route('workers', $service->id) }}" class="btn btn-sm {{($not_evaluated==true)?'btn-warning':'btn-info'}}"
                                            title="تقييم العمال">تقييم العمال</a>
                                        @else
                                        <a href="#" class="btn btn-sm btn-secondary" disabled
                                            title="تقييم العمال">تقييم العمال</a>
                                        @endif
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الخدمة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('services.destroy', 'test') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="service_id" id="service_id" value="">
                        <input class="form-control" name="description" id="description" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


@if($data->count() > 0)
    <!-- Modal effects -->
    <div class="modal" id="modaldemo10">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تقييم الخدمة</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ url('services/evaluation') }}" method="post" autocomplete="off">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    @can('تقييم الخدمة')
                        <div class="modal-body">
                            <div class="col-lg-3">
                            </div>
                            <div id="evaluation_div" class="col-lg-12">
                                <input type="hidden" name="service_id" id="service_id" value="">
                                    <input type="checkbox" name="status" id="status" value="تم اكتمال الخدمة"  onclick="show_evaluation(this)">
                                    <label>تم اكتمال الخدمة</label>

                                <textarea class="form-control" id="evaluation" name="evaluation" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تقييم</button>
                        </div>
                    @endcan
                </form>
        </div>
    </div>
@endif

</div>

</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var service_id = button.data('service_id')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #service_id').val(service_id);
        modal.find('.modal-body #description').val(description);
    })

    $('#modaldemo10').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var service_id = button.data('service_id')
        var evaluation = button.data('evaluation')
        var modal = $(this)
        modal.find('.modal-body #service_id').val(service_id);
        modal.find('.modal-body #evaluation').val(evaluation);
    })

</script>


@endsection
