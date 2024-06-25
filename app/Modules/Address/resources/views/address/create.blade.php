@extends('layouts.master')

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

        </form>

        <section class="my-5">
            <div class="container  ">
    
    
                <table class="table brder hover ">
                    <thead style="background-color: #efefef;">
                        <tr>
                            <th>#</th>
                            <th>طبيعة العنوان</th>
                            <th>المحافظة</th>
                            <th>المدينة</th>
                         
                            <th>الحي</th>
                            <th>الشارع</th>
                            <th>اقرب معلم</th>
                            <th> اسم المعلم</th>
                            <th>استكمال للعنوان </th>
                            <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses->where('address_type', 8) as $key => $address)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $address->addresstypename->status_name ?? '' }}</td>
                                <td>{{ $address->regionname->region_name }}</td>
                                <td>{{ $address->cityname->city_name }}</td>
                             
                                <td>{{ $address->neighbourhoodname->neighbourhood_name ?? '' }}</td>
                                <td>{{ $address->streetname->street_name ?? '' }}</td>
                                <td>{{ $address->nearestlocname->status_name ?? '' }}</td>
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
                                                onclick="alert('هل انت متاكد من الحذف ؟')">
                                                <i class="m-auto fas fa-trash text-danger mx-3 h5 "
                                                    style="font-size: 22px; color:red;"></i></button>
    
                                        </form>
    
                                    </div>
    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </section>
    </section>

@endsection
