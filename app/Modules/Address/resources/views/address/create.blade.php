@extends('layouts.master')
@section('css-link')
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{asset('css/myTableResponsive.css')}}">
@endsection
@section('content')
    <section class="container">

        @include('layouts._alert-session')

        @include('layouts._error-form')



        <form action="{{ route('address.store', 8) }}" method="post">
            @csrf
            @if ($profiles->current_address_status == 12)
                @include('AddressModule::address._address-form', [
                    'address_title' => 'عنوان مركز الايواء',
                    'type' => 8,
                    'typeName' => 'طبيعة المركز ',
                    'locationName' => 'اسم مركز الايواء',
                ])
            @else
                @include('AddressModule::address._address-form', [
                    'address_title' => 'عنوان النزوح',
                    'type' => 8,
                ])
            @endif


            @include('layouts.2button')

        </form>

        <section class="my-5">
            <div class="container  ">

                <main>
                    <div role="region" aria-labelledby="Cap1" tabindex="0">
                        <table class=" table hover " id="mytable">

                            <tr>
                                <th>#</th>
                                <th>طبيعة العنوان</th>
                                <th>المحافظة</th>
                                <th>المدينة</th>
                                <th>الحي</th>
                                <th> اسم المعلم</th>
                                <th>العنوان بالتفصيل </th>
                                <th>الاجراءات</th>
                            </tr>


                            @foreach ($addresses->where('address_type', 8) as $key => $address)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-primary fw-bolder">{{ $address->addresstypename->status_name ?? '' }}
                                    </td>
                                    <td>{{ $address->regionname->region_name }}</td>
                                    <td>{{ $address->cityname->city_name }}</td>
                                    <td>{{ $address->neighbourhoodname->neighbourhood_name ?? '' }}</td>
                                    <td>{{ $address->locname->location_name ?? '' }}</td>
                                    <td>{{ $address->address_specific ?? '' }}</td>

                                    <td class="d-flex align-items-center justify-content-between">

                                        <div>
                                            <form action="{{ route('address.edit', $address->id) }}" method="get">
                                                <button class="btn " type="submit"> <i class="fas fa-edit "
                                                        style="font-size: 22px; color:green;"></i></button>
                                            </form>
                                        </div>

                                        <div>
                                            <form action="{{ route('address.destroy', $address->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-lg" type="submit"
                                                    onclick="return confirm('هل انت متأكد من حذف البيان؟')">
                                                    <i class="m-auto fas fa-trash text-danger mx-3 h5 "
                                                        style="font-size: 22px; color:red;"></i></button>

                                            </form>

                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </main>
            </div>
        </section>
    </section>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>
    <script src="{{ asset('js/hidde.js') }}"></script>
@endsection
