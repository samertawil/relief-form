<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://drive.google.com/uc?export=view&id=1yTLwNiCZhIdCWolQldwq4spHQkgZDqkG"> --}}
    <title>تسجيل الدخول</title>
</head>
{{-- w-md-50 --}}

<body>


    <div class="d-flex" style="height: 600px; ">

        <div class="container  m-auto px-5  ">

            <div>

                <div class=" fw-bolder h4 text-dark d-flex justify-content-center align-items-center">

                    <strong class="mx-2">الخدمات الالكترونية الموحدة</strong>
    
                    <div class="mx-2"  style="width: 90px; height: 100px;">
                        <img src="{{ asset('assets/media/pal.png') }}" alt="palestine" style="width: 100%; height: 100%;">
                    </div>
                    
                </div>
            </div>
           

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header ">تسجيل الدخول</div>
                        @include('layouts._alert-session')
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class=" mb-3">
                                    <label for="idc" class="  col-form-label ">{{ __('mytrans.idc') }}</label>

                                    <div class=" ">
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

                                <div class=" mb-3">
                                    <label for="password" class="  col-form-label">{{ __('mytrans.password') }}</label>

                                    <div class=" ">
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


                                <div class="d-grid gap-2">

                                    <button type="submit" class="  btn btn-primary btn-block my-5">
                                        {{ __('mytrans.Login') }}
                                    </button>
                                </div>
                            </form>
                        

                            <div class="d-md-flex justify-content-between">
                                <div class="mb-4" id="change_id">
                                    <a href="{{route('change.password.form')}}" id="btn1"
                                        class="text-decoration-none ">{{ __('mytrans.Forgot Your Password') }} ؟ </a>
                                </div>
                                <a href="{{ route('register.create') }}"
                                    class="text-decoration-none">{{ __('mytrans.register_new_account') }}</a>
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
