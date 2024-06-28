@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endsection


@section('content')
<div class="container">

    @include('layouts._error-form')

    @include('layouts._alert-session')
</div>

   
    <section>
        <form action="{{ route('damages.missing.store') }}" method="post">
            @csrf
            <input name="created_by" type="hidden" value="{{Auth::user()->profile->id??9999999999}}"  class="form-control container">
            <input name="provider" type="hidden" value="{{Auth::user()->profile->id??9999999999}}"  class="form-control container">
            <div class="container border mt-2 mb-5 bg-white ">
                <div class="text-center">
                    <p class="lead py-4 fw-bold ">استبانة حصر جثث الشهداء المتواجدين تحت الانقاض</p>
                </div>
                {{-- <div class="d-flex justify-content-between  ">
                <div class="p-3">
                    <label for="" class="form-label">تاريخ تعبئة الاستثمارة</label>
                    <input type="date" name="created_at" value="{{ now()->format('Y-m-d') }}" class="form-control"
                        disabled>
                </div>
                <div class="p-3" style="width: 135px;">
                    <label for="" class="form-label">رقم الاستثمارة</label>
                    <input type="text" class="form-control  text-end" value="" disabled>
                </div>

            </div> --}}

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

                        <label for="" class="form-label">رقم الهوية</label>

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
                                <label for="id56" class="form-label fw-normal mx-2">نازح</label>
                                <input type="radio" id="id56" name="living_type" value="56"
                                    @checked(old('living_type') == 56)
                                    class="form-check-input @error('living_type')
                                        is-invalid
                                    @enderror">
                            </div>

                            <div class="mx-4">
                                <label for="id57" class="form-label fw-normal mx-2 ">مقيم</label>
                                <input type="radio" id="id57" name="living_type" value="57"
                                    @checked(old('living_type') == 57)
                                    class="form-check-input @error('living_type')
                                    is-invalid
                                @enderror">
                                @include('layouts._show-error', ['field_name' => 'living_type'])
                            </div>

                        </div>

                    </div>

                </div>


                <div class="dropdown-divider"></div>
                <div>

                    <div class="text-start p-3">
                        <p class="text-primary fw-bold">بيانات المبنى المستهدف: </p>
                    </div>

                    <div class="d-lg-flex justify-content-between">

                        <div class="p-3">
                            <label for="" class="form-label">اسم المبنى المستهدف </label>
                            <input type="text" name="building_name" value="{{old('building_name')}}" @class([
                                'form-control',
                                'is-invalid' => $errors->has('building_name'),
                            ])>
                            @include('layouts._show-error', ['field_name' => 'building_name'])
                        </div>

                        <div class="p-3">
                            <label for="" class="form-label">عدد طوابق المبنى </label>
                            <input type="number" name="floor" min="1" max="25"
                                @class(['form-control', 'is-invalid' => $errors->has('floor')])>
                            @include('layouts._show-error', ['field_name' => 'floor'])
                        </div>

                        <div class="px-3 d-flex " style="margin-top:35px;">
                            <div>
                                <label for="" class="form-label p-3 text-center">نوع المبنى:</label>
                            </div>
                            @foreach (config('damagmodule')['buildingType'] as $key => $buildingType)
                                <div class=" p-3">

                                    <label for="building_type{{ $buildingType }}"
                                        class="form-label fw-normal mx-2">{{ $key }}</label>
                                    <input type="radio" name="building_type" id="building_type{{ $buildingType }}"
                                        value="{{ $buildingType }}" @checked(old('building_type') == $buildingType)
                                        @class([
                                            'form-check-input',
                                            'is-invalid' => $errors->has('building_type'),
                                        ])>

                                </div>
                            @endforeach
                            @include('layouts._show-error', ['field_name' => 'building_type'])
                        </div>

                    </div>

                </div>
                <div class="dropdown-divider"></div>



                @include('AddressModule::address._address-form', [
                    'address_title' => 'عنوان المبنى المستهدف',
                    'type' => 54,
                ])


                <div class="dropdown-divider"></div>
                <div>



                </div>
            </div>
            {{-- @include('layouts.2button') --}}
        </form>
        
        
        <table class="table border hover container mb-5 ">
            <thead  style=" background-color:#dddddd;">
                <tr>
                    <th>اسم المفقود</th>
                    <th>تاريخ الفقد</th>
                    <th>مقيم/نازح</th>
                    <th>اسم المبنى المستهدف</th>
                    <th>اسم اقرب معلم</th>
                    <th>الاجراءات</th>
                   
                </tr>
            <tbody> 
                
                @foreach ( $people as $person )
                <tr>
                    <td>{{$person->citizen->first_name.' '.$person->citizen->sec_name.' '.$person->citizen->thr_name
                    .' '.$person->citizen->last_name}}</td>
                    <td>{{date('d/m/Y',strtotime($person->missing_date))}}</td>
                    <td>{{$person->livingStatusName->status_name}}</td>
                    <td>{{ $person->address->address_name??''}}</td>
                    <td>{{ $person->address->locname->location_name??''}}</td>
                    <td class="d-flex align-items-center justify-content-between">
                        
                        <form action="{{route('damages.missing.destroy',[$person->id,$person->address_id])}}" method="post">
                            <button type="submit" class="btn btn-lg" onclick="alert('هل انت متاكد من الحذف ؟')"><i
                                    class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                            @csrf
                            @method('delete')
                        </form>

                    </td>
                </tr> 
                @endforeach
            
            </tbody>
            </thead>
        </table>
    </section>



    <script src="{{ asset('js/jquery.min.js') }}"></script>

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

                    let card = `<p>  صاحب الهوية: ` + res['first_name'] + ' ' + res['sec_name'] + ' ' +
                        res['thr_name'] + ' ' + res['last_name'] + `</p>`;

                    $('#citzenname').append(card);

                }
            })

        })
    </script>



  @endsection

 