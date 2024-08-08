 <section class="my-5">
     <div class="container  ">

 
         <main>
             <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                 <table class=" table hover " id="mytable">
                   
                         <tr class="thead-light">
                             <th >#</th>
                             <th class="text-primary fw-bolder">طبيعة العنوان</th>
                             <th>المحافظة</th>
                             <th>المدينة</th>
                             <th>الحي</th>
                             <th> اسم المعلم</th>
                             <th>العنوان بالتفصيل </th>
                             <th>الاجراءات</th>
                         </tr>
                                         
                         {{-- @foreach ($addresses->whereIn('address_type', ...$type) as $key => $address) --}}
                         @foreach ($addresses as $key => $address)
                             <tr  class="table-striped">
                                 <td >{{ $key + 1 }}</td>
                                 <td class="text-primary fw-bolder">{{ $address->addresstypename->status_name ?? '' }}</td>
                                 <td>{{ $address->regionname->region_name }}</td>
                                 <td>{{ $address->cityname->city_name }}</td>
                                 <td>{{ $address->neighbourhoodname->neighbourhood_name ?? '' }}</td>
                                 <td>{{ $address->locname->location_name ?? '' }}</td>
                                 <td>{{ $address->address_specific ?? '' }}</td>
                                 <td class="d-flex align-items-center justify-content-between">
                                     <button class="d-inline btn  btn-lg   " title="edit">
                                         <a class="d-inline " href="{{ route('address.edit', $address->id) }}">
                                             <i class="fas fa-edit" style="font-size: 22px; color:green;"></i></a>
                                     </button>
                                     <form action="{{ route('address.destroy', $address->id) }}" method="post">
                                         <button type="submit" class="btn btn-lg"
                                             onclick="return confirm(' هل انت متأكد من مسح البيان ؟ ')"><i
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

     </div>
 </section>
 <script src="{{ asset('js/myTableResponsive.js') }}"></script>

 <script>
 
 @include('layouts._datatable')
