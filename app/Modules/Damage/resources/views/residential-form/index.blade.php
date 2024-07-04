@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">


            <div class="card-header text-center bg-light "style="float:none ">
                <p class="lead fw-bold ">استبانة حصر المنشاءات السكنية المتضررة </p>
            </div>

            <div class="card-body">
                <div class="card-text">
                    <p class="text-sm p-2">اخي الموطن : الاستبانة عبارة عن نموذجين ادخال , النموذج الاول ادخال بيانات
                        المبنى
                        السكني نفسه والنموذج الثاني لادخال بيانات الوحدات المكونة للمبنى مع صاحب كل وحدة سكنية </p>

                    <p>النموذج الاول: <a href="{{ route('damages.places.create') }}">اضافة مبنى</a></p>

                    <table class="table hover border striper mb-5" id="mytable">

                        <thead>
                            <tr class="thead-light">
                                <th>اسم المبنى</th>
                                <th>العنوان</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($damagedPlaces as $place)
                                    <td>{{ $place->building_name }}</td>
                                    <td>{{ $place->address->cityname->city_name }}</td>

                                @empty
                                @endforelse

                            </tr>
                        </tbody>
                    </table>

                    <p >النموذج الثاني: <a href="{{ route('damages.places.create') }}">اضافة حدات سكنية ومالكين</a></p>

                    <table class="table hover border striper" id="mytable">

                        <thead>
                            <tr class="thead-light">
                                <th>اسم المبنى</th>
                                <th>العنوان</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($damagedPlaces as $place)
                                    <td>{{ $place->building_name }}</td>
                                    <td>{{ $place->address->cityname->city_name }}</td>

                                @empty
                                @endforelse

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@endsection
