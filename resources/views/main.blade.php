@extends('layouts.master')
@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection
@section('content')


@include('layouts._alert-session')

    <div class=" ">
        {{-- style="height: 70vh;" --}}
        <div class="d-flex m-auto" style="height: 200px;" >
            <h1  class="m-auto fw-bolder text-center ">المؤسسة الدولية للإغاثة</h1>
        </div>

        <div>
            <div class="container">
                <div class="row ">
                    <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box bg-info">
                            <div class="inner">
                              <a href="{{route('damages.missing.create')}}"><h5 class="text-light">اضرار بشرية</h5></a>  

                               
                                <a href="{{route('damages.missing.create')}}"> <p class="text-light"> استبانة حصر جثث الشهداء المتواجدين تحت الانقاض</p></a>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('damages.missing.create')}}" class="small-box-footer"> رابط الاستبانة <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6" style="height: 170px;">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h5>53<sup style="font-size: 20px">%</sup></h5>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h5>44</h5>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h5>65</h5>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
