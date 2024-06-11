
 
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
  
    @include('layouts._alert_session')

 
    
 <div class="d-flex" style="height: 500px;">
    <div class="container m-auto" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تسجيل حساب جديد</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
    
                           
                            <div class="row mb-3">
                                <label for="idc" class="col-md-4 col-form-label text-md-end">{{__('mytrans.idc')}}</label>
    
                                <div class="col-md-6">
                                    <input id="idc" type="number" class="form-control @error('idc') is-invalid @enderror" name="idc" value="{{ old('idc') }}"    autocomplete="idc" autofocus>
    
                                    @error('idc')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                         
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{__('mytrans.password')}}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"> {{__('mytrans.password-confirm')}} </label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end">{{__('mytrans.mobile')}} </label>
    
                                <div class="col-md-6">
                                    <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" >
    
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">{{__('mytrans.birthday')}}</label>
    
                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control" name="birthday"
                                     value="{{ old('birthday') }}"  autocomplete="birthday" >
    
                                </div>
                            </div>

    
                            <div class="row mb-0 ">
                                <div class="col-md-6 offset-md-4">
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
   
</body>
</html>

