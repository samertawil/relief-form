<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>تسجيل الدخول</title>
</head>

<body>
    <div class="d-flex " style="height: 500px;">
        <div class="container  m-auto w-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-header">تسجيل الدخول</div>
                        @include('layouts._alert_session')
                        <div class="card-body">
                            <form action="{{ route('login') }}"  method="POST" >
                                @csrf

                                <div class="row mb-3">
                                    <label for="idc"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.idc') }}</label>

                                    <div class="col-md-6">
                                        <input id="idc" type="text"
                                            class="form-control @error('idc') is-invalid @enderror" name="idc"
                                            value="{{ old('idc') }}" required autocomplete="idc" autofocus>

                                        @error('idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                             
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <div class=" ">
                                            <button type="submit" class="btn btn-success">
                                                {{ __('mytrans.Login') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>

 
                            </form>
                            <div class="dropdown-divider"></div>

                            <div class="d-lg-flex  justify-content-center">
                                <div class="my-3 my-lg-0">
                                    <a href="{{ route('register') }}"
                                        class="btn btn-primary btn-sm">{{ __('mytrans.register_new_account') }}</a>
                                </div>

                                <div style="margin-right: 10px;" id="change_id">
                                    <a href="{{ route('change.password' , 800097818) }}"
                                        class="btn btn-primary btn-sm">{{ __('mytrans.Forgot Your Password') }}</a>
                                </div>

                              


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jQuery.js') }}"></script>

</body>

</html>
