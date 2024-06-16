<!DOCTYPE html>
<html lang="ar" dir="rtl">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

 

    @yield('css-link')
    <title>{{ env('APP_NAME') }}</title>

@yield('css')

</head>

<body>


    <div>


        <div>

            @include('layouts.top-navbar')

        </div>

        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h3 class="m-0">@yield('page-name')</h3>
                </div>
                <div class="col-sm-6">
      
                  {{-- @include('layouts.breadcrumb') --}}
                  
                </div>
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

        <div >

            @yield('content')

        </div>



        <div>
            {{-- @include('web-site-public.footer') --}}
        </div>


    </div>






   <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>  
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> 
 
    @yield('js')
</body>

</html>
