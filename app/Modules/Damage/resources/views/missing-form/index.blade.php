@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/myTableResponsive.css') }}">
@endsection


@section('content')
    <div class="container">

        @include('layouts._error-form')

        @include('layouts._alert-session')
    </div>


    <section>
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-primary  fw-bolder">
                <p class="my-auto">اسماء المفقودين تحت الانقاض</p>
            </div>
            <div>
                <a href="{{ route('damages.missing.create') }}" class="btn btn-md bg-primary"> اضافة جديد</a>
            </div>
        </div>


        <main class="my-5">
            <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover container " id="mytable">

                    <tr class="m-auto thead-light ">
                        <th>{{__('mytrans.missing_full_name')}}</th>
                        <th>{{__('mytrans.missing_date')}}</th>
                        <th>مقيم/نازح</th>
                        <th>اسم المبنى المستهدف</th>
                        <th>اسم اقرب معلم</th>
                        <th>الاجراءات</th>

                    </tr>
                    
                    @forelse    ($people as $person)
                        <tr style=" align-items: center;">
                            <td>{{ $person->missing_full_name??''  }} </td>  
                                      
                            <td>{{ myDateStyle1($person->missing_date) }}</td>
                            <td>{{ $person->livingStatusName->status_name }}</td>
                            <td>{{ $person->address->address_name ?? '' }}</td>
                            <td>{{ $person->address->locname->location_name ?? '' }}</td>
                            <td class="d-flex align-items-center justify-content-between">

                                <form action="{{route('damages.missing.destroy',$person->id)}}"
                                    method="post">

                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-lg"
                                        onclick="return confirm('هل انت متأكد من مسح البيان ؟')"><i
                                            class=" m-auto fas fa-trash text-danger mx-3 h5"></i></button>
                                  
                                </form>

                            </td>
                        </tr>
                    @empty
                        <div class="text-center">
                            <p>لا يوجد بيانات مدخلة</p>
                        </div>
                    @endforelse


                </table>
            </div>
        </main>
    </section>

    <div class="container">
       <span>لاضافة مفقودين تحت الانقاض لشهداء بدون ارقام هوية يرجى ارسال البيانات من خلال  </س><span>   <a href="{{route('gethelp')}}">الدعم الفني</a></span>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>
@endsection
