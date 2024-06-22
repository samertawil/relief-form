@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection

@section('css')
    <style>
        .form-label {
            font-weight: 400 !important;
        }
    </style>
@endsection
@section('content')
    @include('layouts._error-form')

    @include('layouts._alert-session')


    <section>
        <form action="{{route('damages.missing.store')}}" method="post">
            @csrf
       
        <div class="container border mt-2 mb-5 bg-white ">
            <div class="text-center">
                <p class="lead py-4 fw-bold ">استبانة حصر جثث الشهداء المتواجدين تحت الانقاض</p>
            </div>
            <div class="d-flex justify-content-between  ">
                <div class="p-3">
                    <label for="" class="form-label">تاريخ تعبئة الاستثمارة</label>
                    <input type="date" name="created_at" value="{{ now()->format('Y-m-d') }}" class="form-control"
                        disabled>
                </div>
                <div class="p-3" style="width: 140px;">
                    <label for="" class="form-label">رقم الاستثمارة</label>
                    <input type="text" class="form-control  text-end" value="" disabled>
                </div>

            </div>

            <div class="dropdown-divider"></div>
            <div>

                <div class="text-start p-3">
                    <p class="text-primary fw-bold">بيانات مقدم الاستبانة:</p>
                </div>
                <div class="d-flex justify-content-between   ">

                    <div class="p-3">
                        <label for="" class="form-label">اسم مقدم الاستبانة </label>
                        <input type="text" value="{{ Auth::user()->full_name }}" class="form-control" disabled>
                    </div>
                    <div class="p-3">
                        <label for="" class="form-label">رقم الهوية</label>
                        <input type="text" value="{{ Auth::user()->idc }}" class="form-control" disabled>
                    </div>
                    <div class="p-3">
                        <label for="" class="form-label">رقم الجوال </label>
                        <input type="text" value="{{ Auth::user()->profile->mobile1 }}" class="form-control" disabled>
                    </div>

                </div>


            </div>
            <div class="dropdown-divider"></div>
            <div>

                <div class="text-start p-3">
                    <p class="text-primary fw-bold">بيانات المبنى المستهدف: </p>
                </div>
                <div class="d-flex justify-content-between   ">

                    <div class="p-3">
                        <label for="" class="form-label">تاريخ استهداف المبنى </label>
                        <input type="date" name="strike_date" class="form-control">
                    </div>
                    <div class="p-3">
                        <label for="" class="form-label">اسم المبنى المستهدف </label>
                        <input type="text" name="building_name" class="form-control">
                    </div>
                    <div class="p-3">
                        <label for="" class="form-label">عدد طوابق المبنى </label>
                        <input type="number" name="floor" class="form-control" min="1" max="25">
                    </div>
                    <div class="p-3">
                        <label for="" class="form-label"> نوع المبنى</label>
                        <select name="building_type" class="form-select">
                            @foreach ( $buildingTypes as $buildingType )
                            <option value="{{$buildingType->id}}">{{$buildingType->status_name}}</option>
                            @endforeach
                           
                        </select>
                    </div>

                </div>


            </div>
            <div class="dropdown-divider"></div>

            <div class="text-start p-3">
                <p class="text-primary fw-bold"> عنوان المبنى المستهدف: </p>
            </div>

            @include('AddressModule::address.address')

            <div class="dropdown-divider"></div>
            <div>

                <div class="text-start p-3">
                    <p class="text-primary fw-bold">بيانات المفقودين تحت الانقاض:</p>
                </div>

              
                <table class="table border ">
                    <thead class="text-center" style=" background-color:#dddddd;">
                        <tr>
                            <th>الاسم رباعي</th>
                            <th>العمر</th>
                            <th>الجنس</th>
                            <th>مقيم/نازح</th>
                        </tr>
                    <tbody  >
                        <tr >
                            <td><input type="text" class="form-control"></td>
                            <td> <input type="number" class="form-control" min="1" max="100"></td>
                            <td>
                                <div class="p-3 d-flex">
                                    <div class="mx-4">
                                        <label for="male" class="form-label mx-2">ذكر</label>
                                        <input type="radio" id="male" name="gender" value="1"
                                            class="form-check-input">
                                    </div>

                                    <div>
                                        <label for="female" class="form-label  mx-2">انثى</label>
                                        <input type="radio" id="female" name="gender" value="0"
                                            class="form-check-input">
                                    </div>

                                </div>
                            </td>
                            <td>
                                <div class="p-3 d-flex">
                                    <div class="mx-4">
                                        <label for="male" class="form-label mx-2">نازح</label>
                                        <input type="radio" id="male" name="type1" value="1"
                                            class="form-check-input">
                                    </div>

                                    <div>
                                        <label for="female" class="form-label  mx-2">مقيم</label>
                                        <input type="radio" id="female" name="type1" value="0"
                                            class="form-check-input">
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
        @include('layouts.2button')
    </form>
    </section>
@endsection
