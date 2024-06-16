@extends('layouts.master')

@section('content')
    <section class="container">

        @include('layouts._alert-session')

        @include('layouts._error-form')

 

        <form action="{{ route('address.store', 7) }}" method="post">
            @csrf

            @include('AddressModule::address._address-form', ['address_title' => 'العنوان الدائم -(ما قبل الحرب)','type'=>7,  ])
                
          
        </form>


 

    </section>
@endsection
