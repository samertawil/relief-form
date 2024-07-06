@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/myTableResponsive.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection


@section('content')
    <div class="container">

        @include('layouts._error-form')

        @include('layouts._alert-session')
    </div>


    <section>
        <form action="{{ route('damages.missing.store') }}" method="post">
            @csrf
            <input name="created_by" type="hidden" value="{{ Auth::user()->profile->id ?? 9999999999 }}"
                class="form-control container">
            <input name="provider" type="hidden" value="{{ Auth::user()->profile->id ?? 9999999999 }}"
                class="form-control container">
            <div class="container border mt-2 mb-5 bg-white ">
                <div class="text-center">
                    <p class="lead py-4 fw-bold ">استبانة حصر جثث الشهداء المتواجدين تحت الانقاض</p>
                </div>


                <div class="dropdown-divider"></div>
                <div>

                    <div class="text-start p-3 d-flex">
                        <p class="text-primary fw-bold"> مقدم الاستبانة:</p>
                        <p> {{ Auth::user()->full_name }} </p>
                        <p class="px-4"><span
                                class="text-primary fw-bold">جوال:</span>{{ Auth::user()->profile->mobile1 ?? '' }} </p>
                    </div>
                </div>

                <div class="dropdown-divider"></div>
                <div class="text-start p-3">
                    <p class="text-primary fw-bold">بيانات المفقود تحت الانقاض: </p>
                </div>
                <div class="d-lg-flex justify-content-between ">
                    <div class="p-3">

                        <label for="" class="form-label">{{ __('mytrans.idc') }}</label>

                        <input type="text" name="idc" id="idc" value="{{ old('idc') }}"
                            @class(['form-control', 'is-invalid' => $errors->has('idc')])>
                        @include('layouts._show-error', ['field_name' => 'idc'])
                        <p id="citzenname"></p>
                    </div>

                    <div class="p-3">
                        <label for="" class="form-label">تاريخ الفقد </label>
                        <div>

                        </div>
                        <input type="date" name="missing_date" value="{{ old('missing_date') }}"
                            @class(['form-control', 'is-invalid' => $errors->has('missing_date')])>
                        @include('layouts._show-error', ['field_name' => 'missing_date'])
                    </div>
                    <div class="p-3">

                        <div class="px-3 d-flex " style="margin-top:35px;">
                            <label for="" @class(['form-label px-3 text-center '])>وجوده بالمبنى كـ:</label>

                            <div>

                                <input type="radio" id="id56" name="living_type" value="56"
                                    @checked(old('living_type') == 56)
                                    class="form-check-input @error('living_type')
                                        is-invalid
                                    @enderror">
                                <label for="id56" class="form-label fw-normal mr-4">نازح</label>
                            </div>

                            <div class="mx-4">

                                <input type="radio" id="id57" name="living_type" value="57"
                                    @checked(old('living_type') == 57)
                                    class="form-check-input @error('living_type')
                                    is-invalid
                                @enderror">
                                <label for="id57" class="form-label fw-normal mr-4 ">مقيم</label>
                                @include('layouts._show-error', ['field_name' => 'living_type'])
                            </div>

                        </div>

                    </div>

                </div>


                <div class="dropdown-divider"></div>

                <div class="mb-4">
                    @if (!$people->isEmpty())
                        <div class="d-flex text-start p-3 align-items-center">
                            <p class="text-primary mt-3 fw-bold">بيانات المبنى المستهدف: </p>
                            <select name="from_building_name" id=""
                                class="form-select w-lg-25 data-wrapper buildings">
                                <option value="0" hidden>اختار مبنى</option>
                                @foreach ($people->unique('building_name') as $person)
                                    <option value="{{ $person->id }}">
                                        {{ $person->building_name ?? ('' . ' - في مدينة : ' . $person->address->cityname->city_name ?? ('' . ' -  اقرب معلم  : ' . $person->address->locname->location_name ?? '' . ' - ' . $person->address->address_name)) }}
                                    </option>
                                @endforeach
                                <option value="0" class="text-primary">ادخال بيانات مبنى اخر</option>
                            </select>
                        </div>
                    @endif
                    <div class="d-lg-flex justify-content-between">

                        <div class="p-3" id="building_name_div">
                            <label for="" class="form-label"> {{ __('mytrans.building_name') }}</label> <span
                                style="font-size: 10px;" class="text-muted">مثال:بيت عائلة ال**,عمارة الوطن </span>
                            <input type="text" name="building_name" value="{{ old('building_name') }}"
                                id="building_name" @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('building_name'),
                                ])>
                            @include('layouts._show-error', ['field_name' => 'building_name'])
                        </div>

                        <div class="p-3" id="floor_div">
                            <label for="" class="form-label">{{ __('mytrans.floor') }}</label>
                            <input type="number" name="floor" min="1" max="25" id="floor"
                                value="{{ old('floor') }}" @class(['form-control', 'is-invalid' => $errors->has('floor')])>
                            @include('layouts._show-error', ['field_name' => 'floor'])
                        </div>

                        <div class="px-2 d-flex " style="margin-top:35px;">
                            <div id="building_type_div2">
                                <label for="" class="form-label p-2 text-center">نوع المبنى:</label>
                            </div>
                            @foreach (config('damagmodule')['buildingType'] as $key => $buildingType)
                                <div class=" p-2" id="building_type_div">


                                    <input type="radio" name="building_type" id="building_type{{ $buildingType }}"
                                        value="{{ $buildingType }}" @checked(old('building_type') == $buildingType)
                                        @class([
                                            'a1',
                                            'form-check-input',
                                            'is-invalid' => $errors->has('building_type'),
                                        ])>
                                    <label for="building_type{{ $buildingType }}"
                                        class="form-label fw-normal mr-4">{{ $key }}</label>
                                </div>
                            @endforeach
                            @include('layouts._show-error', ['field_name' => 'building_type'])
                        </div>



                    </div>

                </div>



                <div id="address_form_id">
                    @include('AddressModule::address._address-form', [
                        'address_title' => 'عنوان المبنى المستهدف',
                        'type' => 54,
                    ])

                </div>




                <div>

                    @include('layouts.2button')

                </div>
            </div>

        </form>

        <main>
            <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover container " id="mytable">

                    <tr class="m-auto thead-light ">
                        <th>اسم المفقود</th>
                        <th>تاريخ الفقد</th>
                        <th>مقيم/نازح</th>
                        <th>اسم المبنى المستهدف</th>
                        <th>اسم اقرب معلم</th>
                        <th>الاجراءات</th>

                    </tr>

                    @foreach ($people as $person)
                        <tr style=" align-items: center;">
                            <td>{{ $person->citizen->CI_FIRST_ARB .
                                ' ' .
                                $person->citizen->CI_FATHER_ARB .
                                ' ' .
                                $person->citizen->CI_GRAND_FATHER_ARB .
                                ' ' .
                                $person->citizen->CI_FAMILY_ARB }}
                            </td>
                            <td>{{ date('d/m/Y', strtotime($person->missing_date)) }}</td>
                            <td>{{ $person->livingStatusName->status_name }}</td>
                            <td>{{ $person->address->address_name ?? '' }}</td>
                            <td>{{ $person->address->locname->location_name ?? '' }}</td>
                            <td class="d-flex align-items-center justify-content-between">

                                <form action="{{ route('damages.missing.destroy', [$person->id, $person->address_id]) }}"
                                    method="post">
                                    <button type="submit" class="btn btn-lg"
                                        onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                            class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                    @csrf
                                    @method('delete')
                                </form>

                            </td>
                        </tr>
                    @endforeach


                </table>
            </div>
        </main>
    </section>



    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>
    <script>
        $('#idc').on('change', function() {
            let idcvalue = $('#idc').val();
            let route = "{{ route('api.get.idc') }}";

            $.ajax({
                type: 'get',
                url: route + '/' + idcvalue,
                success: function(res) {

                    let card = `<p class="text-sm mr-2 text-muted">   ` + res['CI_FIRST_ARB'] + ' ' +
                        res['CI_FATHER_ARB'] + ' ' +
                        res['CI_GRAND_FATHER_ARB'] + ' ' + res['CI_FAMILY_ARB'] + `</p>`;

                    $('#citzenname').append(card);

                }
            })

        })
    </script>


    <script>
        $('.buildings').on('change', function() {

            let x = $(this).val();
            if (x != 0) {
                $('#building_name_div').addClass("d-none");
                $('#floor_div').addClass("d-none");
                $('#building_type_div2').addClass("d-none");
                $('#building_type_div input,#building_type_div label').addClass("d-none");
                $('#address_form_id').addClass("d-none");

            } else {
                $('#building_name_div').removeClass("d-none");
                $('#floor_div').removeClass("d-none");
                $('#building_type_div2').addClass("d-none");
                $('#building_type_div input, #building_type_div label').removeClass("d-none");
                $('#address_form_id').removeClass("d-none");
            }
        });
    </script>
@endsection
