@section('css-link')
    {{-- <link rel="stylesheet" href="{{ asset('css/pace-theme-flat-top.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection

@section('css')
    <style>
        @media (min-width:991px) {
            .w13 {
                width: 170px;
            }

            .w18 {
                width: 220px;
            }

            .w20 {
                width: 240px;
            }


        }

        @media(max-width:992px) {
            .w13 {
                width: 200px;
            }

            .w18 {
                width: 200px;
            }

            .w20 {
                width: 200px;
            }

        }
    </style>
@endsection

@if ($profiles->current_address_status == 13)

    <div style="margin-bottom: 10px;">
        <p class="mx-4">المنزل الذي تسكن فيه الان يعود ل ؟</p>
        <div class="d-flex">

            <div>
                @foreach (config('hometype') as $key => $hometype)
                    <input type="radio" name="home_type" value="{{ $hometype }}" @checked(old('home_type') === $hometype)
                        id="home{{ $hometype }}" @class([
                            'form-check-input',
                            'is-invalid' => $errors->has('home_type'),
                        ])>
                    <label for="home{{ $hometype }}" class="form-check-label mx-4">{{ $key }}</label>
                @endforeach
                @include('layouts._show-error', ['field_name' => 'home_type'])
            </div>

        </div>

    </div>
@endif



<div class="card">
    <div class="card-header d-flex justify-content-between">


        <p class="card-header ">
            <a data-toggle="collapse" href="#collapse-address{{ $type ?? '' }}" aria-expanded="true"
                aria-controls="collapse-address{{ $type ?? '' }}" id="heading-address{{ $type ?? '' }}"
                class="d-block fw-bold ">
                <i class="fa fa-chevron-down pull-right "></i>
                {{ $address_title ?? 'تكوين عنوان' }}
            </a>

        </p>



    </div>

    <div class="card-body">
        <div id="collapse-address{{ $type ?? '' }}" class="collapse show"
            aria-labelledby="heading-address{{ $type ?? '' }}">

            <div class="card-text">
                <div class="d-lg-flex">

                    <div class="form-group px-2 w13">
                        <label for="region_id">المحافظة</label>
                        <select name="region_id" @class([
                            ' form-control',
                            ' js-example-basic-single',
                            'is-invalid' => $errors->has('region_id'),
                        ])>
                            <option value="{{ $address->region_id }}">{{ $address->regionname->region_name ?? null }}
                            </option>

                            @foreach ($regions->whereNotIn('id', $address->region_id) as $region)
                                <option {{ old('region_id') == $region->id ? 'selected' : '' }}
                                    value="{{ $region->id }}">
                                    {{ $region->region_name }}</option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'region_id'])
                    </div>
                    <div class="form-group px-2 w13">
                        <label for="city_id">المدينة</label>
                        <select name="city_id" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('city_id'),
                        ])>
                            <option value="{{ $address->city_id }}">{{ $address->cityname->city_name ?? null }}
                            </option>

                            @foreach ($cities->whereNotIn('id', $address->city_id) as $city)
                                <option {{ old('city_id') == $city->id ? 'selected' : '' }}
                                    value="{{ $city->id }}">
                                    {{ $city->city_name }}</option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'city_id'])
                    </div>

                    <div class="form-group px-2 w18">
                        <label for="area_id">المنطقة</label>
                        <select name="area_id" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('area_id'),
                        ])>
                            <option value="{{ $address->area_id }}">{{ $address->areaname->area_name ?? null }}
                            </option>
                            @foreach ($areas->whereNotIn('id', $address->area_id) as $area)
                                <option {{ old('area_id') == $area->id ? 'selected' : '' }}
                                    value="{{ $area->id }}">
                                    {{ $area->area_name }}</option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'area_id'])
                    </div>
                    <div class="form-group px-2 w18">
                        <label for="neighbourhood_id">الحي</label>
                        <select name="neighbourhood_id" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('neighbourhood_id'),
                        ])>
                            <option value="{{ $address->neighbourhood_id }}">
                                {{ $address->neighbourhoodname->neighbourhood_name ?? null }}</option>
                            @foreach ($neighbourhoods->whereNotIn('id', $address->neighbourhood_id) as $neighbourhood)
                                <option {{ old('neighbourhood_id') == $neighbourhood->id ? 'selected' : '' }}
                                    value="{{ $neighbourhood->id }}">
                                    {{ $neighbourhood->neighbourhood_name }}
                                </option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'neighbourhood_id'])
                    </div>
                    <div class="form-group px-2 w20">
                        <label for="street_id">الشارع</label>
                        <select name="street_id" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('street_id'),
                        ])>
                            <option value="{{ $address->street_id }}">{{ $address->streetname->street_name ?? null }}
                            </option>
                            @foreach ($streets->whereNotIn('id', $address->street_id) as $street)
                                <option {{ old('street_id') == $street->id ? 'selected' : '' }}
                                    value="{{ $street->id }}">{{ $street->street_name }}</option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'street_id'])
                    </div>

                    <div class="form-group px-2 w13">
                        <label for="nearest_location_type">{{ $typeName ?? 'اقرب معلم' }}</label>
                        <select name="nearest_location_type" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('nearest_location_type'),
                        ])>
                            <option value="{{ $address->nearest_location_type }}">
                                {{ $address->nearestlocname->status_name ?? null }}</option>
                            @foreach ($nearlocs->where('p_id_sub', 2)->whereNotIn('id', $address->nearest_location_type) as $nearloc)
                                <option {{ old('nearest_location_type') == $nearloc->id ? 'selected' : '' }}
                                    value="{{ $nearloc->id }}">{{ $nearloc->status_name }}</option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', [
                            'field_name' => 'nearest_location_type',
                        ])
                    </div>

                    <div class="form-group px-2 w20">
                        <label for="near_loc_id">{{ $locationName ?? 'اسم المعلم' }}</label>
                        <select name="near_loc_id" @class([
                            'js-example-basic-single form-control',
                            'is-invalid' => $errors->has('near_loc_id'),
                        ])>
                            <option value="{{ $address->near_loc_id }}">{{ $address->locname->location_name ?? null }}
                            </option>
                            @foreach ($nearlocnames->whereNotIn('id', $address->near_loc_id) as $nearlocname)
                                <option {{ old('near_loc_id') == $nearlocname->id ? 'selected' : '' }}
                                    value="{{ $nearlocname->id }}">{{ $nearlocname->location_name }}
                                </option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'near_loc_id'])
                    </div>


                </div>
                <div class="form-group px-2">
                    <label>{{ __('mytrans.address_specific') }}</label>
                    <input name="address_specific" type="text" name="address_specific"
                        value="{{ old('address_specific', $address->address_specific) }}"
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('address_specific'),
                        ])>
                    @include('layouts._show-error', ['field_name' => 'address_specific'])
                </div>

            </div>

            <section class="my-5">
                <div class="container  ">


                    <table class="table brder hover ">
                        <thead style="background-color: #efefef;">
                            <tr>
                                <th>#</th>
                                <th>طبيعة العنوان</th>
                                <th>المحافظة</th>
                                <th>المدينة</th>
                                <th>المنطقة</th>
                                <th>الحي</th>
                                <th>الشارع</th>
                                <th>اقرب معلم</th>
                                <th> اسم المعلم</th>
                                <th>استكمال للعنوان </th>
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addresses->where('address_type', $type) as $key => $address)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $address->addresstypename->status_name ?? '' }}</td>
                                    <td>{{ $address->regionname->region_name }}</td>
                                    <td>{{ $address->cityname->city_name }}</td>
                                    <td>{{ $address->areaname->area_name }}</td>
                                    <td>{{ $address->neighbourhoodname->neighbourhood_name ?? '' }}</td>
                                    <td>{{ $address->streetname->street_name ?? '' }}</td>
                                    <td>{{ $address->nearestlocname->status_name ?? '' }}</td>
                                    <td>{{ $address->locname->location_name ?? '' }}</td>
                                    <td>{{ $address->address_specific ?? '' }}</td>

                                    <td class="d-flex align-items-center justify-content-between">

                                        <div>
                                            <button formaction="{{ route('address.edit', $address->id) }}"
                                                formmethod="GET" class="btn " type="submit"> <i class="fas fa-edit "
                                                    style="font-size: 22px; color:green;"></i></button>

                                        </div>
                                        <div>
                                            <button formaction="{{ route('address.destroy', $address->id) }}"
                                                formmethod="POST" class="btn btn-lg" type="submit"   onclick="alert('هل انت متاكد من الحذف ؟')" > 
                                                <i class="m-auto fas fa-trash text-danger mx-3 h5 "
                                                    style="font-size: 22px; color:red;"></i></button>
                                                    @csrf @method('delete')
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </section>

        </div>

    </div>




    <div>
        @include('layouts.2button')
    </div>
</div>


@section('js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.js-example-basic-single').select2({
            placeholder: 'اختار',

        });
    </script>

    <script>
        $('.js-example-basic-single2').select2({
            placeholder: 'اختار',

        });
    </script>
@endsection



{{-- <div class="form-group ">
    <label class="form-label">اسم مختصر للعنوان </label>
    <input name="address_name" type="text" value="{{ old('address_name', $address->address_name) }}"
        @class(['form-control', 'is-invalid' => $errors->has('address_name')])>
    @include('layouts._show-error', ['field_name' => 'address_name'])
</div> --}}



{{-- <div class="d-flex">
                    <div class="form-group px-2 w13">
                        <label for="address_type">طبيعة العنوان</label>
                        <select name="address_type" @class([
                            'js-example-basic-single',
                            'form-control',
                            'is-invalid' => $errors->has('address_type'),
                        ])>
    
                            <option value="{{ $address->address_type }}" hidden>
                                {{ $address->addresstypename->status_name ?? null }} </option>
    
    
                            @foreach ($nearlocs->where('p_id_sub', 5)->whereNotIn('id', $address->address_type) as $nearloc)
                                <option value="{{ $nearloc->id }}"
                                    {{ old('address_type') == $nearloc->id ? 'selected' : '' }}> {{ $nearloc->status_name }}
                                </option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'address_type'])
                    </div>
                </div>
     --}}
