{{-- @section('css-link')
 
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
@endsection --}}

@section('css')
    <style>
        @media (min-width:991px) {
            .w13 {
                width: 170px;
            }

            .w20 {
                width: 240px;
            }

            .w21 {
                width: 280px;
            }

        }

        @media(max-width:992px) {
            .w13 {
                width: 200px;
            }

            .w20 {
                width: 260px;
            }

            .w21 {
                width: 300px;
            }


        }

        .select2-selection__clear {
            color: blue;
            margin: auto 10px;

        }
    </style>
@endsection

@if ($profiles && $profiles->current_address_status == 13)

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
    @php
        $type_for_edit = Route::currentRouteName();
    @endphp

    @if ($type_for_edit != 'address.edit')
        <input type="hidden" name="address_type" value={{ $type ?? '' }}>
    @endif

    <div class="card-body">
        <div id="collapse-address{{ $type ?? '' }}" class="collapse show"
            aria-labelledby="heading-address{{ $type ?? '' }}">

            <div class="card-text address-cont">
                <div class="d-lg-flex">

                    <div class="form-group px-2 w20">
                        <label for="region_id">المحافظة</label>

                        <select name="region_id" id="region_id" onchange="GetData()" @class([
                            'form-select',
                            ' form-control',
                            'a1',
                            'is-invalid' => $errors->has('region_id'),
                        ])>

                            <option value="" hidden><span class="text-gray">اختار</span></option>
                            <option value="2" @selected( old('region_id') == 2 )>خانيونس</option>
                            <option value="1" @selected( old('region_id') == 1 )>غزة</option>
                            <option value="3" @selected( old('region_id') == 3 )>الشمال</option>
                            <option value="4" @selected( old('region_id') == 4 )>الوسطى</option>
                            <option value="5" @selected( old('region_id') == 5 )>رفح</option>

                            {{-- <option value="1" @selected(old('region_id') ? old('region_id') == 1 : $address->region_id == 1)>غزة</option>
                            <option value="2" @selected(old('region_id') ? old('region_id') == 2 : $address->region_id == 2)>خانيونس</option>
                            <option value="3" @selected(old('region_id') ? old('region_id') == 3 : $address->region_id == 3)>الشمال</option>
                            <option value="4" @selected(old('region_id') ? old('region_id') == 4 : $address->region_id == 4)>الوسطى</option>
                            <option value="5" @selected(old('region_id') ? old('region_id') == 5 : $address->region_id == 5)>رفح</option> --}}

                        </select>
                        @include('layouts._show-error', ['field_name' => 'region_id'])
                    </div>

                    <div class=" form-group px-2 w20 ">
                        <label for="city_id">المدينة</label>

                        <select name="city_id" id="city_id" @class([
                            'js-example-basic-single form-control',
                            'a1',
                            'is-invalid' => $errors->has('city_id'),
                        ])>
                            {{-- <option {{ old('city_id') == $address->city_id ? ' selected' : '' }}
                                value="{{ $address->city_id }}"> {{ $address->cityname->city_name ?? null }}</option> --}}

                            @foreach ($oldCity as $city)
                                <option value="{{ $city->id }}" @selected(old('city_id') == $city->id)>
                                    {{ $city->city_name }} </option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'city_id'])
                    </div>


                    <div class="form-group px-2 w20">
                        <label for="neighbourhood_id">الحي</label>
                        <select name="neighbourhood_id" id="neighbourhood_id" @class([
                            'js-example-basic-single form-control',
                            'a1',
                            'is-invalid' => $errors->has('neighbourhood_id'),
                        ])>
                            {{-- <option value="{{ $address->neighbourhood_id }}">
                                {{ $address->neighbourhoodname->neighbourhood_name ?? null }}</option> --}}
                            @foreach ($oldneighbourhood as $neighbourhood)
                                <option value="{{ $neighbourhood->id }}" @selected(old('neighbourhood_id') == $neighbourhood->id)>

                                    {{ $neighbourhood->neighbourhood_name }}
                                </option>
                            @endforeach
                        </select>
                        @include('layouts._show-error', ['field_name' => 'neighbourhood_id'])
                    </div>



                    <div class="form-group px-2 w21">
                        <label for="near_loc_id">{{ $locationName ?? 'اسم اقرب معلم' }}</label>
                        <select name="near_loc_id" id="near_loc_id" @class([
                            'js-example-basic-single form-control',
                            'a1',
                            'is-invalid' => $errors->has('near_loc_id'),
                        ])>
                            {{-- <option value="{{ $address->near_loc_id }}">{{ $address->locname->location_name ?? null }}
                            </option> --}}
                            @foreach ($oldnearlocname as $nearlocname)
                                <option value="{{ $nearlocname->id }}" @selected(old('near_loc_id') == $nearlocname->id)>
                                    {{ $nearlocname->location_name }}

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


        </div>

    </div>

</div>

@section('js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.js-example-basic-single').select2({
            placeholder: 'اختار',
            allowClear: true,
        });
    </script>


    <script>
        $('#region_id').on('change', function() {

            $('#city_id').find('option').remove().end().append('<option value=""></option>').val('');
            $('#neighbourhood_id').find('option').remove().end().append('<option value=""></option>').val('');
            $('#near_loc_id').find('option').remove().end().append('<option value=""></option>').val('');

        });

        $('#city_id').on('change', function() {

            $('#neighbourhood_id').find('option').remove().end().append('<option value=""></option>').val('');
            $('#near_loc_id').find('option').remove().end().append('<option value=""></option>').val('');

        });

        $('#neighbourhood_id').on('change', function() {
            $('#near_loc_id').find('option').remove().end().append('<option value=""></option>').val('');

        });



        $('.a1').on('change', function() {
            var val = $(this).val();

            var field_name = $(this).attr('name');
            var route = "{{ route('api.address') }}";


            blockItem($('.address-cont'));


            $.ajax({
                type: 'get',
                url: route + '/' + val + '/' + field_name,
                success: function(res) {

                    if (field_name === 'region_id') {

                        res.forEach(element => {

                            var card =
                                `<option  value="${element.id}">${element.city_name}</option>`
                            $('#city_id').append(card);
                        });
                    } else if (field_name === 'city_id') {


                        res.forEach(element => {


                            var card =
                                `<option  value="${element.id}">${element.neighbourhood_name}</option>`;

                            $('#neighbourhood_id').append(card);
                        });
                    } else if (field_name === 'neighbourhood_id') {

                        res.forEach(element => {

                            var card =
                                `<option    value="${element.id}">${element.location_name}</option>`
                            $('#near_loc_id').append(card);
                        });
                    }
                }
            });
            unblockItem($('.address-cont'));
        })
    </script>
@endsection
