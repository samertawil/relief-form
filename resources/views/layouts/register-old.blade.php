<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>تسجيل حساب</title>
</head>

<body>

    @include('layouts._alert-session')



    <div class="d-flex" style="height: 600px;">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">تسجيل حساب جديد</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="idc"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.idc') }}</label>

                                    <div class="col-md-6">
                                        <input id="idc" type="number"
                                            class="form-control @error('idc') is-invalid @enderror" name="idc"
                                            value="{{ old('idc') }}" autocomplete="idc" autofocus onchange="GetQuestions()">

                                        @error('idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>

                                 

                                </div>

                                <div class="row mb-3">
                                    <label for="mobile"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.mobile') }} </label>

                                    <div class="col-md-6">
                                        <input id="mobile" type="number"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" autocomplete="mobile">

                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="birthday"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.birthday') }}</label>

                                    <div class="col-md-6">
                                        <input id="birthday" type="date" class="form-control @error('birthday') is-invalid
                                            
                                        @enderror" name="birthday"
                                            value="{{ old('birthday') }}" autocomplete="birthday">

                                            @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <label for="q1" class="col-md-4 col-form-label text-md-end">السؤال
                                        الاول</label>

                                    <div class="col-md-3">
                                        <p id="q1_p" type="text" class="form-control border-0">

                                        </p>

                                    </div>

                                    <div class="col-md-3">
                                        <input name="answer_q1" class="form-control">
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <label for="q2" class="col-md-4 col-form-label text-md-end">السؤال
                                        الثاني</label>

                                    <div class="col-md-3">
                                        <p id="q2_p" type="text" class="form-control border-0">
                                            {{-- {{ $questions->q2 }} --}}
                                        </p>

                                    </div>

                                    <div class="col-md-3">
                                        <input name="answer_q2" class="form-control">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                        {{ __('mytrans.password-confirm') }} </label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>




                                <div class="row mb-0 ">
                                    <div class="col-md-6 offset-md-4 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            تسجيل
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    
    <script>
        function GetQuestions() {

            // var btn1 = $('#btn1').on('click', function() {
                var idc = $('#idc').val();
                var route="{{route('api.idc.questions')}}";
                $.ajax({

                    type: 'get',
                    url: route+'/' + idc,
                    success: function(res) {

                        $('#q1_p').html('');
                        $('#q2_p').html('');

                        $('#q1_p').append(res.q1);
                        $('#q2_p').append(res.q2);

                        res.forEach(element => {

                            $('#q1_p').append(element.q1 + '؟');

                            $('#q2_p').append(element.q2 + '؟');
                        });


                        $('#btn1').attr('disabled', 'true');

                    }
                });

            // });
        }
    </script>

</body>

</html>
