@extends('layouts.master')

@section('css-link')


@endsection


@section('content')
    <div class="container">

        @include('layouts._error-form')

        @include('layouts._alert-session')
    </div>


    <section>

        <form action="{{ route('damages.places.store') }}" method="post">
            @csrf
       
         @include('layouts._title-header',['title'=>'استبانة حصر المنشاءات السكنية المتضررة/اضافة مبنى متضرر '])

                <div class="container   mt-2 mb-5 bg-white ">

                <div class="text-start p-3">
                
                    <p class="card-header ">
                        <a data-toggle="collapse" href="#collapse-building-name" aria-expanded="true"
                            aria-controls="collapse-building-name" id="heading-building-name" class="d-block fw-bold ">
                            <i class="fa fa-chevron-down pull-right "></i>
                            بيانات المبنى
                        </a>

                    </p>

                </div>

                <div id="collapse-building-name" class="collapse show" aria-labelledby="collapse-building-name">

                    <div class="mb-4">

                        <div class="row justify-content-between">

                            <div class="p-3 col-lg-3" id="building_name_div">
                                <label for="building_name" class="form-label">{{ __('mytrans.building_name') }} <span
                                        style="font-size: 10px;" class="text-muted">مثال:بيت عائلة ال**,عمارة الوطن </span>
                                </label>

                                <input type="text" name="building_name" value="{{ old('building_name') }}"
                                    id="building_name" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('building_name'),
                                    ])>
                                @include('layouts._show-error', ['field_name' => 'building_name'])
                            </div>

                            <div class="p-3 col-lg-1" id="floor_div">
                                <label style="width: 110px;" for="floor"
                                    class="text-start form-label">{{ __('mytrans.floor') }}</label>
                                <input type="number" name="floor" min="1" max="25" id="floor" value="{{old('floor')}}"
                                    @class(['form-control', 'is-invalid' => $errors->has('floor')])>
                                @include('layouts._show-error', ['field_name' => 'floor'])
                            </div>
                            <div class="p-3 col-lg-1" id="units_count_div">
                                <label style="width: 110px;" for="units_count"
                                    class="text-start  form-label">{{ __('mytrans.units_count') }}</label>
                                <input type="number" name="units_count" min="1" max="25" id="units_count" value="{{old('units_count')}}"
                                    @class(['form-control', 'is-invalid' => $errors->has('units_count')])>
                                @include('layouts._show-error', ['field_name' => 'units_count'])
                            </div>

                            <div class="p-3  col-lg-5">

                                <label class="form-label "> {{ __('mytrans.building_type') }}
                                </label>

                                <div class="d-flex">
                                    @foreach (config('damagmodule')['buildingType'] as $key => $buildingType)
                                        <div class="p-2" id="building_type_div">

                                            <input type="radio" name="building_type"
                                                id="building_type{{ $buildingType }}" value="{{ $buildingType }}"
                                                @checked(old('building_type') == $buildingType) @class([
                                                    'form-check-input',
                                                    'is-invalid' => $errors->has('building_type'),
                                                ])>
                                            <label for="building_type{{ $buildingType }}"
                                                class="form-label fw-normal mr-4">{{ $key }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @include('layouts._show-error', ['field_name' => 'building_type'])
                            </div>


                        </div>

                    </div>

                    <div class="row justify-content-evently ">

                        <div class="p-3 col-lg-3">
                            <label for="damage_date" class="form-label">{{ __('mytrans.damage_date') }}</label>
                            <div>

                            </div>
                            <input type="date" name="damage_date" id="damage_date" value="{{ old('damage_date') }}"
                                @class(['form-control', 'is-invalid' => $errors->has('damage_date')])>
                            @include('layouts._show-error', ['field_name' => 'damage_date'])
                        </div>
                        <div class="p-3 col-lg-6">

                            <label class="form-label" for="notes">ملاحظات</label>
                            <textarea maxlength="255" name="notes" rows="3" id="notes" @class(['form-control'])>{{ old('notes') }}</textarea>

                        </div>


                    </div>


                    <div id="address_form_id">
                        @include('AddressModule::address._address-form', [
                            'address_title' => 'عنوان المبنى المستهدف',
                            'type' => 54,
                        ])

                    </div>

                </div>

                <div>

                    @include('layouts.2button', ['name' => 'حفظ واستمرار'])

                </div>
            </div>
            </div>
        </form>

    </section>



    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
  
        $('#idc').on('change', function() {
            let idcvalue = $('#idc').val();
            let route = "{{ route('api.get.idc') }}";

            $.ajax({
                type: 'get',
                url: route + '/' + idcvalue,
                success: function(res) {

                    let card = `<p>  صاحب الهوية: ` + res['CI_FIRST_ARB'] + ' ' + res['CI_FATHER_ARB'] +
                        ' ' +
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
