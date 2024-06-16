 
<section class="my-5">
    <div class="container  ">


        <table class="table brder hover " id="mytable">
            <thead>
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
                {{-- @foreach ($addresses->whereIn('address_type',...$type) as $key=> $address) --}}
                @foreach ($addresses  as $key=> $address)
                    <tr>
                        <td>{{$key+1 }}</td>
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
                            <button class="d-inline btn  btn-lg   " title="edit">
                                <a class="d-inline " href="{{ route('address.edit', $address->id) }}">
                                    <i class="fas fa-edit" style="font-size: 22px; color:green;"></i></a>
                            </button>
                            <form action="{{route('address.destroy',$address->id)}}" method="post">
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
