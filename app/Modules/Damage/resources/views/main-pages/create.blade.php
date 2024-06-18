@extends('layouts.master')

@section('css-link')
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/screenMediaCss.css') }}">
@endsection

@section('content')
    @include('layouts._alert-session')

    @include('layouts._error-form')



    <section class="container my-2">

        <a data-toggle="collapse" href="#collapse-system" aria-expanded="true" aria-controls="collapse-system"
            id="heading-system" class="d-block ">
            <i class="fa fa-chevron-down pull-right "></i>
            اضافة اضرار
        </a>

        <div id="collapse-system" class="collapse show" aria-labelledby="heading-system">
            <p class="card-header"> </p>

            <div>

                <form action="{{ route('damages.store') }}" method="post">
                    @csrf
                    <div class="d-flex border h-0 align-items-center p-2 ">

                        <div class="form-check px-0">
                            @foreach (config('damagmodule')['damageType'] as $key => $damages)
                                <input name="damage_type" type="radio" id="damage_type{{ $damages }}"
                                    value="{{ $damages }}"
                                    class=" mx-0   form-check-input @error('damage_type') is-invalid)  @enderror"
                                    @checked(old('damage_type') === 'not active')>
                                <label for="damage_type{{ $damages }}"
                                    class="mx-4   form-check-label">{{ $key }}</label>
                            @endforeach

                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">{{ $name ?? 'اضافة' }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <section>
                <div class="container">
                    <table class="table  my-4">
                        <thead>
                            <th>#</th>
                            <th>{{ __('mytrans.damage_type') }}</th>
                            <th>{{ __('mytrans.created_at') }}</th>

                        </thead>
                        <tbody>

                            @foreach ($damagesAll as $key => $damage)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $damage->status->status_name }}</td>
                                    <td>{{ $damage->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </section>
        </div>


  



        </div>


        </div>
    </section>



    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    @include('layouts._datatable')
@endsection
