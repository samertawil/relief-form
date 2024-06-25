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

    <form action="{{ route('registration.form') }}" method="get">
        @include('auth-relief-forms._chk-idc-form',['buttontitle'=>'البدء بعملية التسجيل'])
    </form>

    <script src="{{ asset('js/jQuery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>


</body>

</html>
