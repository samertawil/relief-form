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
                <p class="my-auto"> اضرا قطاع النقل والمواصلات </p>
            </div>
            <div>
                <a href="{{ route('damages.transports.create') }}" class="btn btn-md bg-primary"> اضافة جديد</a>
            </div>
        </div>


        <main class="my-5">
            <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover container " id="mytable">

                    <tr class="m-auto thead-light ">
                        <th>اسم المالك حسب الرخصة</th>
                        <th>اسم الحائز</th>
                        <th>{{__('mytrans.transport_category')}}</th>
                        <th>{{__('mytrans.transport_type')}}</th>
                        <th>{{__('mytrans.transport_no')}}</th>
                        <th>{{__('mytrans.damage_date')}}</th>
                        <th>{{__('mytrans.damage_size')}}</th>
                                             
                        <th>الاجراءات</th>

                    </tr>
                    {{-- ->citizen_full_name  --}}
                    @forelse    ($transports as $transport)
                        <tr style=" align-items: center;">
                       
                            <td>{{ $transport->citizen->citizen_full_name}}  </td>  
                            <td>{{ $transport->owner_name }}  </td>  
                            <td>{{ $transport->transport_category==89?'مركبة' : 'منشاة' }}  </td>  
                            <td>{{ $transport->StatusType->status_name??'' }}  </td>  
                            <td>{{ $transport->transport_no }}  </td>  
                            <td>{{  date('d/m/Y',strtotime($transport->damage_date)) }}</td>
                            <td>{{ $transport->transport_damage_size==92?'ضرر كلي':'ضرر جزئي' }}  </td>  
                          
                            <td class="d-flex align-items-center justify-content-between">

                                <form action="{{ route('damages.transports.destroy',$transport->id) }}"
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
                        <div class="text-center">
                            <p>لا يوجد بيانات مدخلة</p>
                        </div>
                    @endforelse


                </table>
            </div>
        </main>
    </section>



    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/myTableResponsive.js') }}"></script>
@endsection
