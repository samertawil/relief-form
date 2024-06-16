@extends('layouts.master')

@section('content')
    <section class="container">

        @include('layouts._alert-session')

        @include('layouts._error-form')



        <form action="{{ route('address.store', 8) }}" method="post">
            @csrf
            @if ($profiles->current_address_status == 12)
                @include('AddressModule::address._address-form', [
                    'address_title' => 'عنوان مركز الايواء',
                    'type' => 8,
                    'typeName' => 'طبيعة المركز ',
                    'locationName' => 'اسم مركز الايواء',
                ])
       @else
            @include('AddressModule::address._address-form', [
                'address_title' => 'عنوان النزوح',
                'type' => 8,
            ])

@endif

        </form>

    </section>
@endsection
