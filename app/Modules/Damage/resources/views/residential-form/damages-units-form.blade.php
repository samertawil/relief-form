@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myTableResponsive.css') }}">

@endsection


@section('content')
    <div class="container">

        @include('layouts._error-form')

        @include('layouts._alert-session')
    </div>


    <section>

        <form action="{{ route('damages.places.store') }}" method="post">
            @csrf
            <input name="created_by" type="hidden" value="{{ Auth::user()->profile->id ?? 9999999999 }}"
                class="form-control container">

            <div class="container border mt-2 mb-5 bg-white ">
                <div class="text-center">
                    <p class="lead py-4 fw-bold ">استبانة حصر المنشاءات السكنية المتضررة <span class="text-danger fw-bolder text-center ">النموذج الثاني</span> </p>
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

         
        <div class="container border mt-2 mb-5 bg-white ">

            <div class="text-start p-3">
            
                <p class="card-header ">
                    <a data-toggle="collapse" href="#collapse-units" aria-expanded="true" aria-controls="collapse-units"
                        id="heading-units" class="d-block fw-bold ">
                        <i class="fa fa-chevron-down pull-right "></i>
                        بيانات الوحدات المكونة للمبنى
                    </a>

                </p>

            </div>
            <div id="collapse-units" class="collapse show" aria-labelledby="collapse-units">
                <div class="mb-4">

                    <div class="row justify-content-between ">
                        <div class="p-3 col-lg-2">
                            <label for="owner_idc" class="form-label">{{ __('mytrans.owner_idc') }}</label>
                            <input type="text" name="owner_idc" id="owner_idc" value="{{ old('owner_idc') }}"
                                @class(['form-control', 'is-invalid' => $errors->has('owner_idc')])>
                            @include('layouts._show-error', ['field_name' => 'idc'])
                            <p id="citzenname"></p>
                        </div>


                        <div class="p-3 col-lg-2  ">
                            <label class="form-label ">{{ __('mytrans.citizen_type') }}</label>
                            <div class="d-flex">
                                <div>
                                    <input type="radio" id="id71" name="citizen_type" value="71"
                                        @checked(old('citizen_type') == 71)
                                        class="form-check-input @error('citizen_type')
                                    is-invalid
                                @enderror">
                                    <label for="id71" class="form-label fw-normal mr-4">مواطن</label>
                                </div>

                                <div class="mx-4">

                                    <input type="radio" id="id72" name="citizen_type" value="72"
                                        @checked(old('citizen_type') == 72)
                                        class="form-check-input @error('citizen_type')
                                is-invalid
                            @enderror">
                                    <label for="id72" class="form-label fw-normal mr-4 ">لاجئ</label>
                                    @include('layouts._show-error', ['field_name' => 'citizen_type'])
                                </div>
                            </div>
                        </div>


                        <div class="p-3 col-lg-2 ">

                            <label for="" class="form-label">{{ __('mytrans.undp_number') }}</label>

                            <input type="text" name="undp_number" id="undp_number" value="{{ old('undp_number') }}"
                                style="width: 200px;" @class(['form-control', 'is-invalid' => $errors->has('undp_number')])>
                            @include('layouts._show-error', ['field_name' => 'undp_number'])

                        </div>




                        <div class="p-3 col-lg-2 ">
                            <label for="unit_damage_date" class="form-label">{{ __('mytrans.unit_damage_date') }}</label>

                            <input type="date" name="unit_damage_date" id="unit_damage_date"
                                value="{{ old('unit_damage_date') }}" @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('unit_damage_date'),
                                ])>
                            @include('layouts._show-error', ['field_name' => 'unit_damage_date'])
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
                                            'pr-2',
                                            'form-check-input',
                                            'is-invalid' => $errors->has('unit_type'),
                                        ])>

                                    <label for="unit{{ $unitType }}"
                                        class="form-label fw-normal mx-4">{{ $key }}</label>
                                @endforeach

                            </div>

                        </div>


                        <div class="p-3 col-lg-2">
                            <label for="beneficiary_idc" class="form-label">رقم هوية المستأجر</label>
                            <input type="text" name="beneficiary_idc" id="beneficiary_idc"
                                value="{{ old('beneficiary_idc') }}" @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('beneficiary_idc'),
                                ])>
                            @include('layouts._show-error', ['field_name' => 'beneficiary_idc'])
                            <p id="beneficiaryname"></p>
                        </div>


                        <div class="  d-flex " style="margin-top:35px;">
                            <label for="" @class(['form-label px-2 text-center '])>حجم الضرر:</label>

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

            </div>
            @include('layouts.2button')
        </div>
        <main>
            <div role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover container " id="mytable">

                    <tr class="m-auto">
                        <th>اسم المفقود</th>
                        <th>تاريخ الفقد</th>
                        <th>مقيم/نازح</th>
                        <th>اسم المبنى المستهدف</th>
                        <th>اسم اقرب معلم</th>
                        <th>الاجراءات</th>

                    </tr>


                    <tr style=" align-items: center;">
                        <td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="d-flex align-items-center justify-content-between">

                            <form action="#" method="post">
                                <button type="submit" class="btn btn-lg"
                                    onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                        class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                @csrf
                                @method('delete')
                            </form>

                        </td>
                    </tr>



                </table>
            </div>
        </main>
    </section>



    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>
    <script>
        $('#btn1').on("click", function() {
            alert('dsds');
        });


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
