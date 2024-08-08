@extends('layouts.master')

@section('css-link')
<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{asset('css/myTableResponsive.css')}}">
@endsection

@section('content')

<section class="my-5">
    <div class="container  ">

      <div class="text-center">
        <span >{{ $citizen->idc??'انت غير مسجل' }}</span>  <a href="$">اضغط للتسجيل الان</a>  
        </div> 
        
  @if (!$citizen=='')
      
        <main>
            <div class="bg-light" role="region" aria-labelledby="Cap1" tabindex="0">
                <table class=" table hover " id="mytable">
                  
                        <tr class="thead-light">
                            <th>{{__('mytrans.idc')}}</th>
                            <th>{{__('mytrans.name')}}</th>
                            <th>{{__('mytrans.birthday')}}</th>
                            <th>{{__('mytrans.mobile_primary')}}</th>
                            <th>{{__('mytrans.mobile_secondary')}}</th>
                             <th>{{__('mytrans.gender')}}</th>
                             <th>{{__('mytrans.marital_status')}}</th>
                           {{-- <th>العنوان بالتفصيل </th>
                            <th>الاجراءات</th>   --}}
                        </tr>
                                        
                     
                      
                            <tr  class="table-striped">
                                <td >{{ $citizen->idc }}</td>
                                <td >{{ Auth::user()->full_name }}</td>
                                <td >{{ myDateStyle1($citizen->birthday) ??'' }}</td>
                            
                                <td>{{ $citizen->mobile_primary??'' }}</td>
                                <td>{{$citizen->mobile_secondary??'' }}</td>
                                <td>{{ $citizen->gender==1?'ذكر':'انثى'}}</td>
                               <td>{{ $citizen->maritalStatus->status_name ?? '' }}</td>
                              
                                <td class="d-flex align-items-center justify-content-between">
                                    <button class="d-inline btn  btn-lg   " title="edit">
                                        <a class="d-inline " href="#">
                                            <i class="fas fa-edit" style="font-size: 22px; color:green;"></i></a>
                                    </button>
                                   

                                </td>
                            </tr>
                       
                   
                </table>
            </div>
        </main>
        @endif
    </div>
</section>
<script src="{{ asset('js/myTableResponsive.js') }}"></script>

<script>

@include('layouts._datatable')


@endsection