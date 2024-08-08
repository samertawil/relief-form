@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center">
        <div>

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="الصور غير متاحة">
                <div class="card-body">
                    <p class="card-text fw-bold text-primary">{{ $myDamagedUnits->citizen->citizen_full_name }}</p>
                    <p class="card-text">{{ $myDamagedUnits->places->building_name }}</p>
                    <p class="card-text">{{ $myDamagedUnits->places->addressName->full_address }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ date('d/m/Y', strtotime($myDamagedUnits->unit_damage_date)) }}</li>

                    <li class="list-group-item">
                        @if ($myDamagedUnits->citizen_type == 71)
                            <span>مواطن</span>
                        @elseif ($myDamagedUnits->citizen_type == 72)
                            <span>لاجئ</span> {{ $myDamagedUnits->undp_number }}
                        @elseif ($myDamagedUnits->citizen_type != [71, 72])
                            <span>غير ذلك</span>
                        @endif

                    </li>

                    <li class="list-group-item">المقيم في الوحدة السكنية:
                        @if ($myDamagedUnits->unit_type == 65)
                            <span>المالك نفسه</span>
                        @elseif ($myDamagedUnits->unit_type == 66)
                            <span>مستأجرة</span>
                        @elseif ($myDamagedUnits->unit_type == 67)
                            <span>خالية</span>
                        @elseif ($myDamagedUnits->unit_type == 68)
                            <span>اخرى</span>
                        @elseif ($myDamagedUnits->unit_type != [65, 66, 67, 68])
                            <span>غير ذلك</span>
                        @endif

                    </li>

                    <li class="list-group-item">حجم الضرر:
                        @if ($myDamagedUnits->damage_size == 74)
                            <span> هدم كلي</span>
                        @elseif ($myDamagedUnits->damage_size == 75)
                            <span>جزئي غير صالح للسكن</span>
                        @elseif ($myDamagedUnits->damage_size == 76)
                            <span>جزئي صالح للسكن</span>
                        @elseif ($myDamagedUnits->damage_size != [74, 75, 76])
                            <span>غير ذلك</span>
                        @endif

                    </li>


                </ul>
                <div class="card-body text-end">
                    <a href="#" class="card-link" onclick="window.history.back()">رجوع</a>

                </div>
            </div>
        </div>
    </div>
@endsection
