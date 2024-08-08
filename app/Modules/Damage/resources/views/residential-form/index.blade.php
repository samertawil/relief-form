@extends('layouts.master')




@section('content')
    <div class="container">
        <div class="card">

            @include('layouts._alert-session')
            <div class="card-header text-center bg-light "style="float:none ">
                <p class="lead fw-bold "> حصر المنشاءات السكنية المتضررة </p>
            </div>

            <div class="card-body">
                <div class="card-text">
                   
      
                        <div class=" p-3  show w-100 mx-auto  " style="background-color:#fffa68 !important; ">
                            {{ 'اخي الموطن : الاستبانة عبارة عن نموذجين ادخال , النموذج الاول ادخال بيانات المبنى السكني نفسه والنموذج الثاني لادخال بيانات الوحدات المكونة للمبنى مع صاحب كل وحدة سكنية' }}
                            <button type="button" class="btn-close mx-2" data-bs-dismiss="alert" aria-label="Close">
                            </button>

                        </div>
                    

                    <p class="mt-4"><a href="{{ route('damages.places.create') }}">اضافة مبنى ووحدات سكنية </a></p>

                    <table class="table bg-light hover border striper mb-5" id="mytable">

                        <thead>
                            <tr class="thead-light">
                                <th>اسم المبنى</th>
                                <th>عدد الوحدات </th>

                                <th class="text-center">الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($unitCount as $unit)
                                <tr>
                                    <td>{{ $unit->building_name }}</td>
                                    <td>{{ $unit->total }}</td>

                                    <td class="d-flex align-items-center justify-content-evenly">
                                        <a class="btn btn-primary btn-md"
                                        href="{{ route('damages.units.create', $unit->master_places_id) }}">اضافة
                                        وحدة سكنية</a>
                                        <form action="{{ route('damages.places.destroy', $unit->master_places_id) }}"
                                            method="post">

                                            <button type="submit" class="btn btn-lg"
                                                onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                                    class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                            @csrf
                                            @method('delete')
                                        </form>
                                       
                                    </td>

                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>

                    {{-- <p>النموذج الثاني: <a href="{{ route('damages.units.create') }}">اضافة حدات سكنية ومالكين</a></p> --}}
                    <p>الوحدات التي تمت اضافتها</p>
                    <table class="table bg-light hover border striper" id="mytable">

                        <thead>
                            <tr class="thead-light">
                                <th>اسم المالك / المستأجر</th>
                                <th>اسم المبنى</th>
                                <th class="text-center"يب>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($myDamagedUnits as $units)
                                <tr>
                                    <td>{{ $units->citizen->citizen_full_name }}</td>
                                    <td>{{ $units->places->building_name }}</td>
                                    <td class="d-flex align-items-center justify-content-evenly">

                                        <a class="btn btn-primary btn-md"
                                        href="{{ route('damages.units.show', $units->id) }}">تفاصيل
                                         </a>
                                        <form action="{{ route('damages.units.destroy', $units->id) }}" method="post">
                                            <button type="submit" class="btn btn-lg"
                                                onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                                    class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                            @csrf
                                            @method('delete')
                                        </form>
                                      
                                    </td>

                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection
