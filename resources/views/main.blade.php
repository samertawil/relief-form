@extends('layouts.master')
@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection
@section('content')
    @include('layouts._alert-session')

    <div class=" ">
        {{-- style="height: 70vh;" --}}
        <div class="d-flex m-auto" style="height: 200px;">
            <h1 class="m-auto fw-bolder text-center ">اللجنة الوطنية للإغاثة</h1>
        </div>

        <div>
            <div class="container">
                <div class="row justify-content-start ">
                    <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box bg-info" style="height: 100%;">
                            <div class="inner">
                                <a href="{{ route('damages.missing.index') }}">
                                    <h5 class="text-light">اضرار بشرية</h5>
                                </a>


                                <a href="{{ route('damages.missing.index') }}">
                                    <p class="text-light"> استبانة حصر جثث الشهداء المتواجدين تحت الانقاض</p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('damages.missing.index') }}" class="small-box-footer"> رابط الاستبانة <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    {{-- <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box bg-success" style="height: 100%;">
                            <div class="inner">
                                <a href="{{ route('damages.places.index') }}">
                                    <h5 class="text-light">اضرار انشائية</h5>
                                </a>


                                <a href="{{ route('damages.places.index') }}">
                                    <p class="text-light"> استبانة حصر المنشاءات السكنية المتضررة </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('damages.places.index') }}" class="small-box-footer"> رابط الاستبانة <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box" style="height: 100%; background-color: rgb(0, 80, 100)">
                            <div class="inner">
                                <a href="{{ route('damages.places.index') }}">
                                    <h5 class="text-light">اضرار قطاع المواصلات</h5>
                                </a>


                                <a href="{{ route('damages.places.index') }}">
                                    <p class="text-light"> استبانة حصر اضرار قطاع النقل والمواصلات </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('damages.transports.index') }}" class="small-box-footer"> رابط الاستبانة <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}


                    {{-- <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box" style="height: 100%; background-color: rgb(237, 48, 183)">
                            <div class="inner">
                                <a href="{{ route('damages.places.index') }}">
                                    <h5 class="text-light">إغاثة اهل غزة </h5>
                                </a>


                                <a href="{{ route('damages.places.index') }}">
                                    <p class="text-light"> بيانات الحصص الاغاثية لاهالي قطاع غزة </p>
                                </a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('aid.index') }}" class="small-box-footer"> رابط المعلومات <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>

    </div>
@endsection
