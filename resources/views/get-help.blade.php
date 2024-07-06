<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>الدعم الفني</title>
</head>

<body>

    @include('layouts._alert-session')



    <div class="d-flex" style="height: 600px;">
        <div class="container m-auto">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('mytrans.get-help') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('getHelpstore')}}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="created_by_idc"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.created_by_idc') }}</label>

                                    <div class="col-md-6">
                                        <input id="created_by_idc" type="number"
                                            class="form-control @error('created_by_idc') is-invalid @enderror"
                                            name="created_by_idc" value="{{ old('created_by_idc') }}"
                                            autocomplete="created_by_idc">

                                        @error('created_by_idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">اسم مقدم
                                        الطلب</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" autocomplete="name">

                                        @error('name')
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
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('mytrans.email') }} </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="subject" class="col-md-4 col-form-label text-md-end">  
                                        الرجاء إختيار نوع الدعم المطلوب </label>

                                    <div class="col-md-6">
                                        
                                        <select name="subject" id="subject" class="form-select @error('subject') is-invalid @enderror">

                                            <option value="" hidden>اختار</option>
                                            @foreach (config('main')['technicalSupport'] as $key=>$value )
                                            <option value="{{$value}}">{{$key}}</option>    
                                            @endforeach
                                        </select>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="issue_description" class="col-md-4 col-form-label text-md-end">تفصيل
                                        الدعم الفني المطلوب</label>

                                    <div class="col-md-6">
                                        <textarea name="issue_description" id="issue_description" cols="30" rows="5"
                                            class="form-control @error('issue_description') is-invalid @enderror">{{ old('issue_description') }}</textarea>

                                        @error('issue_description')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>





                                <div class="row mb-0 ">
                                    <div class="col-md-6 offset-md-4 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            ارسال
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
