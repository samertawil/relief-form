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
                    <p class="text-sm p-2">اخي الموطن : الاستبانة عبارة عن نموذجين ادخال , النموذج الاول ادخال بيانات
                        المبنى
                        السكني نفسه والنموذج الثاني لادخال بيانات الوحدات المكونة للمبنى مع صاحب كل وحدة سكنية </p>

                    <p><a href="{{ route('damages.places.create') }}">اضافة مبنى ووحدات سكنية </a></p>

                    {{-- <table class="table bg-light hover border striper mb-5" id="mytable">
                        {{ $unitCount }}
                      
                        <thead>
                            <tr class="thead-light">
                                <th>اسم المبنى</th>
                                <th>العنوان</th>
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($myDamagedPlaces as $place)
                           
                                <tr>
                                    <td>{{ $place->building_name }}</td>
                                    <td>{{ $place->address->cityname->city_name }}</td>
                                    <td class="d-flex align-items-center justify-content-between">

                                        <form action="{{ route('damages.places.destroy', $place->id) }}" method="post">
                                            <button type="submit" class="btn btn-lg"
                                                onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                                    class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a class="btn btn-primary btn-md" href="{{ route('damages.units.create') }}">اضافة
                                            وحدة سكنية</a>
                                    </td>

                                </tr>
                            @empty
                            @endforelse


                        </tbody>
                    </table> --}}
                    <table class="table bg-light hover border striper mb-5" id="mytable">
               
                        <thead>
                            <tr class="thead-light">
                                <th>اسم المبنى</th>
                                <th>عدد الوحدات </th>
                                <th>العنوان</th>
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($unitCount as $unit)
                                <tr>
                                    <td>{{ $unit->places->building_name }}</td>
                                    <td>{{ $unit->total }}</td>
                                    <td>{{ $unit->places->address->cityname->city_name }}</td>
                                    <td class="d-flex align-items-center justify-content-between">

                                        <form action="{{ route('damages.places.destroy', $unit->places->id) }}"
                                            method="post">
                                            <button type="submit" class="btn btn-lg"
                                                onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                                    class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>

                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a class="btn btn-primary btn-md" href="{{ route('damages.units.create') }}">اضافة
                                            وحدة سكنية</a>
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
                                <th>الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($myDamagedUnits as $units)
                                <tr>
                                    <td>{{ $units->profile->citizen->citizen_full_name }}</td>
                                    <td>{{ $units->places->building_name }}</td>
                                    <td class="d-flex align-items-center justify-content-between">

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
