 
@section('css-link')
    <link rel="stylesheet" href="{{asset('css/screenMediaCss.css')}}">
@endsection

<section class="my-5">
    <div class="container table_direction">


        <table class="table brder hover " id="mytable" style="direction : rtl;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم الاختصار</th>
                    <th>المحافظة</th>
                    <th>المدينة</th>
                    <th>المنطقة</th>
                    <th>الحي</th>
                    <th>الشارع</th>
                    <th>اقرب معلم</th>
                    <th>كامل العنوان</th>
                    <th>كامل </th>
                    <th>كامل </th>
                    <th>الاجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->address_name }}</td>
                        <td>{{ $address->regionname->region_name }}</td>
                        <td>{{ $address->cityname->city_name }}</td>
                        <td>{{ $address->areaname->area_name }}</td>
                        <td>{{ $address->neighbourhoodname->neighbourhood_name ?? '' }}</td>
                        <td>{{ $address->streetname->street_name ?? '' }}</td>
                        <td>{{ $address->nearestlocname->status_name ?? '' }}</td>
                        <td>{{ $address->locname->location_name ?? '' }}</td>
                        <td>{{ $address->address_specific ?? '' }}</td>
                        <td>{{ $address->addresstypename->status_name ?? '' }}</td>
                        <td class="d-flex align-items-center justify-content-between">
                            <button class="d-inline btn  btn-lg   " title="edit">
                                <a class="d-inline " href="{{ route('address.edit', $address->id) }}">
                                    <i class="fas fa-edit" style="font-size: 22px;"></i></a>
                            </button>
                            <form action="#" method="post">
                                <button type="submit" class="btn btn-lg" onclick="alert('هل انت متاكد من الحذف ؟')"><i
                                        class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                @csrf
                                @method('delete')
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</section>

@include('layouts._datatable')
