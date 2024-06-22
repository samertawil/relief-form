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
                <div>
                    <table class="table border container my-4">
                        <thead>
                            <th>#</th>
                            <th>{{ __('mytrans.damage_type') }}</th>
                            <th>{{ __('mytrans.created_at') }}</th>
                            <th>{{ __('mytrans.damage_specific') }}</th>
                            <th class="text-center">{{ __('mytrans.table_operations') }}</th>

                        </thead>
                        <tbody>

                            @foreach ($damagesAll as $key => $damage)
                                <form action="{{ route('damages.detail.store', $damage->id) }}" method="post">
                                    @csrf
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $damage->statusName->status_name }}</td>
                                        <td>{{ $damage->created_at->format('d/m/Y') }}</td>
                                        <td>

                                            <select name="damage_specific"
                                                class="form-select @error('damage_specific') is-invalid
                                                
                                            @enderror">
                                                @if ($damage->damage_type == 21)
                                                    @foreach (config('damagmodule')['hummanDamageTypes'] as $key => $damageSpecific)
                                                        <option id="d2" value="{{ $damageSpecific }}">
                                                            {{ $key }}</option>
                                                    @endforeach
                                                @elseif ($damage->damage_type == 22)
                                                    @foreach (config('damagmodule')['economyDamageTypes'] as $key => $damageSpecific)
                                                        <option value="{{ $damageSpecific }}">{{ $key }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </td>


                                        <td class="d-flex align-items-center justify-content-between">


                                            <button type="submit" id="d1"
                                                class="btn btn-info">{{ __('mytrans.add_new') }}</button>
                                </form>

                                <form action="#" method="post">
                                    <button type="submit"
                                        class="btn btn-danger">{{ __('mytrans.delete_record') }}</button>

                                    @csrf
                                    @method('delete')
                                </form>

                                </td>
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


    <div class="container">
        <table class="table hover border container" id="mytable">
            <thead>
                <tr>
                    <th>{{ __('mytrans.file_num') }}</th>
                    <th>{{ __('mytrans.damage_type') }}</th>
                    <th>{{ __('mytrans.damage_specific') }}</th>
                    <th>{{ __('mytrans.created_at') }}</th>
                    <th>{{ __('mytrans.table_operations') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alldata as $data)
                    <tr>

                        <td>{{ $data->id }}</td>
                        <td>{{ $data->damageMaster->statusName->status_name }}</td>
                        <td>{{ $data->statusName->status_name }}</td>
                        <td>{{ $data->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex">

                            <form>
                                <button class="btn btn-md btn-primary mx-3">تقديم استثمارة</button>
                            </form>

                            <form action="#" method="post">
                                <button type="submit" class="btn btn-danger">{{ __('mytrans.delete_record') }}</button>

                                @csrf
                                @method('delete')
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    {{-- @include('layouts._datatable') --}}
    
@endsection
