@extends('layouts.master')
 
@section('content')

 

    <section class="container">

        @include('layouts._alert_session')

        @include('layouts._error_form')

        <form action="{{ route('address.store') }}" method="post">
            @csrf
        
            @include('AddressModule::address._addressForm')
            
            <div>
                @include('layouts.2button')
            </div>

        </form>

    </section>

    @include('AddressModule::address._addressTable')

@endsection