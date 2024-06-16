@extends('layouts.master')

@section('content')
    <section class="container">

        @include('layouts._alert-session')

        @include('layouts._error-form')



        <div class="card my-5">

            <form action="{{ route('CitzenProfile.address_status.store') }}" method="post">
                @csrf
                <div class="card-body">



                    <p class="card-header text-primary text-justify fw-bold ">بيانات الاتصال والتواصل</p>

                    <div class=" my-3">

                        <div class="row">
                            <div class="col-4">
                                <label for="" class="fw-bold form-label"> الهاتف الخليوي </label>
                                <input type="text" name="mobile1" @class(['form-control', 'is-invalid' => $errors->has('mobile1')])
                                    value="{{ $profiles->mobile1 ?? $mobile }}">
                            </div>

                            <div class="col-4">
                                <label for="" class="fw-bold form-label"> الهاتف الخليوي 2</label>
                                <input type="text" name="mobile2" @class(['form-control', 'is-invalid' => $errors->has('mobile2')])
                                    value="{{ $profiles->mobile2 ?? '' }}">
                            </div>


                            <div class="col-4">
                                <label for="" class="fw-bold form-label"> البريد الالكتروني </label>
                                <input type="email" name="email" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                    value="{{ $profiles->email ?? '' }}">
                            </div>

                        </div>

                    </div>

                    <div class=" my-3">
                        <p class="fw-bold">الحالة الحالية للسكن</p>
                        @foreach ($nearlocs->where('p_id_sub', 10) as $nearloc)
                            <div class="form-check d-flex">

                                <input name="current_address_status" type="radio" value="{{ $nearloc->id }}"
                                    id="radio{{ $nearloc->id }}"
                                    class="form-check-input  @error('current_address_status') is-invalid
                                        
                                    @enderror"
                                    @checked($nearloc->id == ($profiles->current_address_status ?? ''))>
                                <label class="form-label h6 font-weight-normal mx-3" for="radio{{ $nearloc->id }}">
                                    {{ $nearloc->status_name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    @include('layouts.2button')
                </div>
            </form>
        </div>

    </section>
@endsection
