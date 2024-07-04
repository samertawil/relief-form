@extends('layouts.master')

@section('content')
    <section class="container">

        @include('layouts._alert-session')

        @include('layouts._error-form')

        <form action="{{ route('address.update', $address->id) }}" method="post">
            @csrf
            @method('put')

            @include('AddressModule::address._address-form', [
                'address_title' => 'عنوان ',
                'type' => $address->address_type,
            ])

            @include('layouts.2button')

        </form>

    </section>
@endsection
