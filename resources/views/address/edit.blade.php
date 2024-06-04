@extends('layouts.master')
 
@section('content')
    <section class="container">

        @include('layouts._alert_session')

        @include('layouts._error_form')

        <form action="{{ route('address.update',$address->id) }}" method="post">
            @csrf
            @method('put')
         
            @include('address._addressForm')

            <div>
                @include('layouts.2button',['name'=>'تحديث'])
            </div>



        </form>

    </section>

    {{-- @include('address._addressTable') --}}

@endsection