<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

 

 

    @yield('css-link')
    <title>{{ env('APP_NAME') }}</title>
    <style>
        @font-face {
            font-family: 'Droid';
            src: url({{ asset('font/Droid.Arabic.Kufi_DownloadSoftware.iR_.ttf') }});

        }


        body {
            text-align: start !important;
            font-family: 'Droid', 'Courier New', Courier, monospace !important;
            direction: rtl;
            background-color:#f8f9fa;
        }
    </style>
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
