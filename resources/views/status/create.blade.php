@extends('layouts.master')

@section('css-link')

<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

@endsection


@section('content')
    @include('layouts._alert_session')

    @include('layouts._error_form')

    <section class="container my-5">


        <div>
            <form action="{{ route('system.store') }}" method="post">
                <div class="d-flex h-0 ">

                    @csrf
                    <div class=" form-group px-2">
                        <label for="system_name_id">اسم النظام</label>
                        <input name="system_name" type="text" @class(['form-control', 'is-invalid' => $errors->has('system_name')]) id="system_name_id" title="اسماء الانظمة الرئيسة المشغولة بهذا البرنامج">
                        @include('layouts._show_error', ['field_name' => 'system_name'])
                    </div>
                    <div class="  form-group px-2">
                        <label for="description_id">وصف النظام</label>
                        <input name="description" type="text" @class(['form-control', 'is-invalid' => $errors->has('description')]) id="description_id">
                        @include('layouts._show_error', ['field_name' => 'description'])
                    </div>

                    @include('layouts.2button', ['name' => 'حفظ','name1'=>'مسح'])

                </div>
            </form>
        </div>

        <div>
            <table class="table   my-5">
                <thead>
                    <th>#</th>
                    <th>اسم النظام</th>
                    <th>حالة النظام</th>
                    <th>وصف النظام</th>
                </thead>
                <tbody>
                    
                        @foreach ($systems_data as $system_data )
                        <tr>
                        <td>{{$system_data->id}}</td>
                        <td>{{$system_data->system_name}}</td>
                        <td @class ([
                            'text-success' => $system_data->active =1,
                            'text-danger' =>$system_data->active =0,
                        ])>{{$system_data->active =1 ?'فعال' : 'غير فعال' }}</td> 
                        <td>{{$system_data->description}}</td> 
                    </tr>
                        @endforeach
                        
                   

                </tbody>
            </table>
        </div>


        <form action="{{ route('status.store') }}" method="post">
            @csrf

            <div class="d-lg-flex justify-content-evenly align-items-center border p-3 ">

                <div class="form-group px-2">
                    <label for="status_name_id" style="text-align:right !important;">اسم الثابت</label>
                    <input name="status_name" type="text" @class(['form-control', 'is-invalid' => $errors->has('status_name')]) id="status_name_id">
                    @include('layouts._show_error', ['field_name' => 'status_name'])
                </div>



                <div class="form-group px-2">
                    <label for="parent_id_id">ثابت رئيسي</label>
                    <select class="custom-select form-control" name="p_id">
                        <option value="" hidden>اختار</option>
                        @foreach ($all_data->whereNull('p_id') as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="parent_sub_id">ثابت فرع</label>
                    <select class="custom-select form-control" name="p_id_sub">
                        <option value="" hidden>اختار</option>
                        @foreach ($all_data->wherein('p_id',array(1))->whereNull('p_id_sub') as $sub_parent)
                            <option value="{{ $sub_parent->id }}">{{ $sub_parent->status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="used_in_system_id"> الثابت تابع لنظام</label>
                    <select class="custom-select form-control" name="used_in_system_id" id="used_in_system_id">
                        <option value="" hidden>اختار </option>
                        @foreach ($systems_data as $system_data )
                            <option value="{{ $system_data->id }}">{{ $system_data->system_name  }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group px-2">
                    <label for="note_id">ملاحظات</label>
                    <input name="description" type="text" class="form-control" id="note_id" value="">
                </div>


            </div>

            <div class="d-flex border py-3">

                <div class="form-group px-2">
                    <label for="page_name_id">اسم الصفحة</label>
                    <input name="page_name" type="text" class="form-control" id="page_name_id" value="">
                </div>

                <div class="form-group px-2">
                    <label for="route_system_name_id">اسم الرابط الرئيسي</label>
                    <input name="route_system_name" type="text" id="route_system_name_id" value=""
                        class="form-control">
                </div>


                <div class="form-group px-2">
                    <label for="route_name_id">رابط الصفحة</label>
                    <input name="route_name" type="text" class="form-control" id="route_name_id" value="">
                </div>

            </div>

            @include('layouts.2button', ['name' => 'حفظ', 'name1' => 'مسح'])
        </form>
    </section>

    <section class="m-5">
        <table class="table border">
            <thead>
                <th>#</th>
                <th>status_name</th>
                <th>p_id</th>
                <th>p_id_sub</th>
                <th>اسم النظام</th>
            </thead>
            <tbody>
               
                    @foreach ( $all_data as $data )
                    <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->status_name}}</td>
                    <td>{{$data->status_p_id->status_name??'//'}}</td>
                    <td>{{$data->status_p_id_sub->status_name??'//'}}</td>
                    <td>{{$data->systemname->system_name??''}}</td>
                    <td></td>
                    <td></td> 
                </tr>
                    @endforeach
                    
               
            </tbody>
        </table>
    </section>

    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
@endsection
