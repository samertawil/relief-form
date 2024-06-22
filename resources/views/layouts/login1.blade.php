<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://drive.google.com/uc?export=view&id=1yTLwNiCZhIdCWolQldwq4spHQkgZDqkG">
    <title>تسجيل الدخول</title>
</head>
{{-- w-md-50 --}}
<body>
    <div class="d-flex " style="height: 500px; ">
        <div class="container  m-auto px-5  ">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card ">

                        <div class="card-header ">تسجيل الدخول</div>
                        @include('layouts._alert-session')
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class=" mb-3">
                                    <label for="idc"
                                        class="  col-form-label ">{{ __('mytrans.idc') }}</label>

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
                                    <label for="password"
                                        class="  col-form-label">{{ __('mytrans.password') }}</label>

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




                               <div class=" bg-danger d-flex w-100" style=" ">
                                    {{-- <div class="w-50 bg-info m-auto">
                                        <span class="m-auto">dsddsd</span>
                                    </div>   --}}

                                     <button type="submit" class=" m-auto btn btn-success btn-block my-5">
                                                {{ __('mytrans.Login') }}
                                            </button>  
                                </div>  

                                {{-- 
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                                            Login
                                        </button> --}}


                            </form>
                            {{-- <div class="dropdown-divider"></div> --}}

                            {{-- <div class="d-lg-flex  justify-content-center">
                                <div class="my-3 my-lg-0">
                                    <a href="{{ route('register') }}"
                                        class="btn btn-primary btn-sm">{{ __('mytrans.register_new_account') }}</a>
                                </div>

                                <div style="margin-right: 10px;" id="change_id">
                                    <a href="javascript:;" id="btn1"
                                        class="btn btn-primary btn-sm">{{ __('mytrans.Forgot Your Password') }}</a>

                                </div>


 --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jQuery.js') }}"></script>

    <script>
        $('#btn1').on('click', function() {
            let d1 = $('#idc').val();
            if (d1 === '') {
                alert('الرجاء ادخال رقم الهوية المطلوب تغير الباسورد');
            } else {
                window.location.href = "/change-password/" + d1;
            }
        });
    </script>

</body>

</html>
