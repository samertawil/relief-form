@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/myTableResponsive.css') }}">
@endsection


@section('content')
    <div class="container">

        @include('layouts._error-form')

        @include('layouts._alert-session')
    </div>


    <section>

        <form action="{{ route('damages.units.store') }}" method="post" id="form">
            @csrf
            <input name="created_by" type="hidden" value="{{ Auth::user()->profile->id ?? 9999999999 }}"
                class="form-control container">

            <div class="container border mt-2 mb-5 bg-white ">
                <div class="text-center">
                    <p class="lead py-4 fw-bold ">استبانة حصر المنشاءات السكنية المتضررة <span
                            class="text-danger fw-bolder text-center ">النموذج الثاني</span> </p>
                </div>

                <div class="dropdown-divider"></div>
                <div>

                    <div class="text-start p-2 d-flex">
                        <p class="text-primary fw-bold"> مقدم الاستبانة:</p>
                        <p> {{ Auth::user()->full_name }} </p>
                        <p class="px-4"><span
                                class="text-primary fw-bold">جوال:</span>{{ Auth::user()->profile->mobile1 ?? '' }} </p>
                    </div>
                </div>


                <div class="container border mt-2 mb-5 bg-white ">


                    <p class="text-primary  my-3 p-2"> بيانات الوحدات المكونة للمبنى </p>

                    <div class="my-4 p-2">

                        <select name="places_id" @class(['form-select', 'is-invalid' => $errors->has('places_id')])>
                            <option value="" hidden><span class="text-muted">اختار المبنى </span></option>
                            @foreach ($myDamagedPlaces as $place)
                                <option value="{{ $place->id }}" {{ old('places_id') == $place->id ? 'selected' : '' }}>
                                    {{ $place->building_name . ' - ' . $place->address->cityname->city_name }} </option>
                            @endforeach
                        </select> </a>
                        @include('layouts._show-error', ['field_name' => 'places_id'])
                    </div>


                    <div class="mb-4 ">

                        <div class="row justify-content-between  p-2">

                            <div class="py-3 col-lg-2">
                                <label for="owner_idc" class="form-label">{{ __('mytrans.owner_idc') }}</label>
                                <input type="text" name="owner_idc" id="idc" value="{{ old('owner_idc') }}"
                                    @class([
                                        'form-control getCitzenName',
                                        'is-invalid' => $errors->has('owner_idc'),
                                    ])>
                                @include('layouts._show-error', ['field_name' => 'owner_idc'])
                                <p></p>
                            </div>


                            <div class="py-3 col-lg-3 ">
                                <label for="unit_damage_date"
                                    class="form-label">{{ __('mytrans.unit_damage_date') }}</label>

                                <input type="date" name="unit_damage_date" id="unit_damage_date"
                                    value="{{ old('unit_damage_date') }}" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('unit_damage_date'),
                                    ])>
                                @include('layouts._show-error', ['field_name' => 'unit_damage_date'])
                            </div>


                            <div class="px-2 col-lg-3 my-3  ">
                                <label @class(['form-label px-2 text-center '])>{{ __('mytrans.citizen_type') }}</label>
                                <div>

                                    @foreach (config('damagmodule')['citizenType'] as $key => $citizenType)
                                        <input type="radio" id="citizen_type{{ $citizenType }}" name="citizen_type"
                                            value="{{ $citizenType }}" @checked(old('citizen_type') == $citizenType)
                                            @class([
                                                'undpGetValue',
                                                'pr-2',
                                                'form-check-input',
                                                'is-invalid' => $errors->has('citizen_type'),
                                            ])>

                                        <label for="citizen_type{{ $citizenType }}"
                                            class="form-label fw-normal mx-4">{{ $key }}</label>
                                    @endforeach

                                </div>


                            </div>

                            <div @class([
                                'py-3 col-lg-2',
                                'd-none',
                                'd-block' => old('citizen_type') == 72,
                            ]) id="undp_number_div">

                                <label for="undp_number" class="form-label">{{ __('mytrans.undp_number') }}</label>

                                <input type="text" name="undp_number" id="undp_number" value="{{ old('undp_number') }}"
                                    @class(['form-control', 'is-invalid' => $errors->has('undp_number')])>
                                @include('layouts._show-error', ['field_name' => 'undp_number'])

                            </div>


                        </div>

                        <div class="d-lg-flex justify-content-between">

                            <div class=" px-2 col-lg-5 my-3 ">
                                <label for="" @class(['form-label px-2 text-center '])>المقيم في الوحدة السكنية:</label>

                                <div class="">
                                    @foreach (config('damagmodule')['unitType'] as $key => $unitType)
                                        <input type="radio" id="unit{{ $unitType }}" name="unit_type"
                                            value={{ $unitType }} @checked(old('unit_type') == $unitType)
                                            @class([
                                                'unitTypeGetValue',
                                                'pr-2',
                                                'form-check-input',
                                                'is-invalid' => $errors->has('unit_type'),
                                            ])>

                                        <label for="unit{{ $unitType }}"
                                            class="form-label fw-normal mx-4">{{ $key }}</label>
                                    @endforeach

                                </div>

                            </div>


                            <div @class([
                                'py-3 col-lg-2',
                                'd-none',
                                'd-block' => old('unit_type') == 66,
                            ]) id="beneficiary_idc_div">
                                <label for="beneficiary_idc" class="form-label">رقم هوية المستأجر</label>
                                <input type="text" name="beneficiary_idc" id="beneficiary_idc"
                                    value="{{ old('beneficiary_idc') }}" @class([
                                        'form-control getCitzenName',
                                        'is-invalid' => $errors->has('beneficiary_idc'),
                                    ])>
                                @include('layouts._show-error', ['field_name' => 'beneficiary_idc'])
                                <p id="beneficiaryname"></p>
                            </div>





                        </div>

                        <div class="p-2">

                            <label for="" @class(['form-label px-2 text-center '])>{{ __('mytrans.damage_size') }}</label>
                            <div class="  d-flex ">
                                <div>
                                    @foreach (config('damagmodule')['damageSize'] as $key => $damageSize)
                                        <input type="radio" id="id{{ $damageSize }}" name="damage_size"
                                            value="{{ $damageSize }}" @checked(old('damage_size') == $damageSize)
                                            @class([
                                                'form-check-input',
                                                'is-invalid' => $errors->has('damage_size'),
                                            ])>
                                        <label for="id{{ $damageSize }}"
                                            class="form-label fw-normal mx-4">{{ $key }} </label>
                                    @endforeach

                                </div>

                            </div>
                        </div>

                    </div>


                    @include('layouts.2button', ['name' => 'حفظ واستمرار'])
                </div>

        </form>

        <main>
            <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover container " id="mytable">

                    <tr class="m-auto">
                        <th>الاسم</th>
                        <th>المبنى</th>
                        <th>عنوان المبنى</th>
                        <th>حجم الضرر</th>
                        <th>الاجراءات</th>

                    </tr>

                    @foreach ($myDamagedUnits as $units)
                        <tr>

                            <td>{{ $units->profile->citizen->citizen_full_name }}</td>
                            <td>{{ $units->places->building_name }}</td>
                            <td>{{ $units->places->address->cityname->city_name }} </td>

                            <td>
                                @if ($units->damage_size == 74)
                                    هدم كلي
                                @elseif ($units->damage_size == 75)
                                    جزئي غير صالح للسكن
                                @elseif ($units->damage_size == 76)
                                    جزئي صالح للسكن
                                @endif
                            </td>

                            <td class="d-flex align-items-center justify-content-between">

                                <form action="{{route('damages.units.destroy',$units->id)}}" method="post">
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>


    <script>
        $(document).ready(function() {

            var oldValue = $(this).data("oldValue");

            let unitValue1 = $(this).val();
            $('.undpGetValue').on('click', function() {
                let undpValue = $(this).val();

                if (undpValue == 71) {
                    $('#undp_number_div').addClass("d-none");
                } else {
                    $('#undp_number_div').removeClass("d-none");
                }
            });


            $('.unitTypeGetValue').on('click', function() {
                let unitValue = $(this).val();

                if (unitValue == 66) {
                    $('#beneficiary_idc_div').removeClass("d-none");
                } else {
                    $('#beneficiary_idc_div').addClass("d-none");
                }
            });

        });
    </script>

    
</div>
 
    <script src="{{asset('js/idc.js')}}"> </script>
        
   


@endsection
