@extends('layouts.master')

@section('css-link')
    {{-- <link rel="stylesheet" href="{{ asset('css/pace-theme-flat-top.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection

@section('css')
    <style>
        @media (min-width:991px) {
            .w13 {
                width: 150px;
            }

            .w18 {
                width: 200px;
            }

            .w20 {
                width: 220px;
            }

        }
    </style>
@endsection




@section('content')
    <section class="content container">

        @include('layouts._alert_session')

        @include('layouts._error_form')


        <div class="card">
            <div class="card-header d-flex justify-content-between">


                <p class="card-header">
                    <a data-toggle="collapse" href="#collapse-address" aria-expanded="true" aria-controls="collapse-address"
                        id="heading-address" class="d-block ">
                        <i class="fa fa-chevron-down pull-right "></i>
                        تكوين عنوان
                    </a>

                </p>


            </div>
            <form action="{{ route('address.store') }}" method="post">
                @csrf
                <div id="collapse-address" class="collapse show" aria-labelledby="heading-address">
                    <div class="card-body">
                        <div class="d-flex">


                            <div class="form-group">
                                <label class="form-label">اسم مختصر للعنوان </label>
                                <input name="address_name" type="text" @class(['form-control', 'is-invalid' => $errors->has('address_name')])>
                                @include('layouts._show_error', ['field_name' => 'address_name'])
                            </div>
                            <div class="form-group px-2 w13">
                                <label for="near_loc_id">طبيعة العنوان</label>
                                <select name="near_loc_id" @class([
                                    'js-example-basic-single form-control',
                                    'is-invalid' => $errors->has('near_loc_id'),
                                ]) id="near_loc_id">
                                    <option value="" hidden>اختار </option>
                                    @foreach ($nearlocs->where('p_id_sub', 5) as $nearloc)
                                        <option value="{{ $nearloc->id }}">{{ $nearloc->status_name }}</option>
                                    @endforeach
                                </select>
                                @include('layouts._show_error', ['field_name' => 'near_loc_id'])
                            </div>
                        </div>

                        <div class="card-text">
                            <div class="d-lg-flex">

                                <div class="form-group px-2 w13">
                                    <label for="region_id">المحافظة</label>
                                    <select name="region_id" @class([
                                        ' form-control',
                                        ' js-example-basic-single',
                                        'is-invalid' => $errors->has('region_id'),
                                    ]) id="region_id" required>
                                        <option value="" hidden>اختار </option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'near_loc_id'])
                                </div>
                                <div class="form-group px-2 w13">
                                    <label for="city_id">المدينة</label>
                                    <select name="city_id" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('city_id'),
                                    ]) id="city_id" required>
                                        <option value="" hidden>اختار </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'city_id'])
                                </div>

                                <div class="form-group px-2 w18">
                                    <label for="area_id">المنطقة</label>
                                    <select name="area_id" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('area_id'),
                                    ]) id="area_id" required>
                                        <option value="" hidden>اختار </option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'area_id'])
                                </div>
                                <div class="form-group px-2 w18">
                                    <label for="neighbourhood_id">الحي</label>
                                    <select name="neighbourhood_id" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('neighbourhood_id'),
                                    ]) id="neighbourhood_id"
                                        required>
                                        <option value="" hidden>اختار </option>
                                        @foreach ($neighbourhoods as $neighbourhood)
                                            <option value="{{ $neighbourhood->id }}">
                                                {{ $neighbourhood->neighbourhood_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'neighbourhood_id'])
                                </div>
                                <div class="form-group px-2 w20">
                                    <label for="street_id">الشارع</label>
                                    <select name="street_id" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('street_id'),
                                    ]) id="street_id">
                                        <option value="" hidden>اختار </option>
                                        @foreach ($streets as $street)
                                            <option value="{{ $street->id }}">{{ $street->street_name }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'street_id'])
                                </div>

                                <div class="form-group px-2 w13">
                                    <label for="nearest_location_type">اقرب معلم</label>
                                    <select name="nearest_location_type" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('nearest_location_type'),
                                    ])
                                        id="nearest_location_type">
                                        <option value="" hidden>اختار </option>
                                        @foreach ($nearlocs->where('p_id_sub', 2) as $nearloc)
                                            <option value="{{ $nearloc->id }}">{{ $nearloc->status_name }}</option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', [
                                        'field_name' => 'nearest_location_type',
                                    ])
                                </div>
                                <div class="form-group px-2 w20">
                                    <label for="near_loc_id">اسم المعلم</label>
                                    <select name="near_loc_id" @class([
                                        'js-example-basic-single form-control',
                                        'is-invalid' => $errors->has('near_loc_id'),
                                    ]) id="near_loc_id">
                                        <option value="" hidden>اختار </option>
                                        @foreach ($nearlocnames as $nearlocname)
                                            <option value="{{ $nearlocname->id }}">{{ $nearlocname->location_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @include('layouts._show_error', ['field_name' => 'near_loc_id'])
                                </div>


                            </div>
                            <div class="form-group px-2">
                                <label>استكمال للعنوان </label>
                                <input name="address_specific" type="text" name="address_specific"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('address_specific'),
                                    ])>
                                @include('layouts._show_error', ['field_name' => 'address_specific'])
                            </div>

                        </div>

                        <div>
                            @include('layouts.2button')
                        </div>

                    </div>
            </form>
        </div>
        </div>
        <div>



        </div>
    </section>

    <section>
        <div class="container">
            <table class="table brder">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الاختصار</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $addresses   as $address )
                    <tr>
                        <td>{{$address->id}}</td>
                        <td>{{$address->address_name}}</td>
                        <td>{{$address->regionname->region_name}}</td>
                        <td>{{$address->cityname->city_name}}</td>
                        <td>{{$address->areaname->area_name}}</td>
                        <td>{{$address->neighbourhoodname->neighbourhood_name}}</td>
                        <td>{{$address->streetname->street_name}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.js-example-basic-single').select2({
            placeholder: 'اختار'
        });
    </script>
@endsection
