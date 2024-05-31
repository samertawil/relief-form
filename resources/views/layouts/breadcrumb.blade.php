 @php
     $route = Route::currentRouteName();
     $d1 = URL::current();
     $route_system_name = explode('.', $route);

     $b1 = \App\Models\status::select('id')->wherenotnull('route_name')->where('route_name', $route)->get();
     $routelink = count($b1);
     
 @endphp

 @if ($routelink == 0)

     <div class=" container" style="font-size: 14px;">

         <ol class="breadcrumb float-sm-right">
             {{-- <li class="breadcrumb-item"><a href="{{ route('index') }}">الموقع</a></li> --}}
             <li class="breadcrumb-item"><a href="{{ url('http://127.0.0.1:8000/') }}">الرئيسية</a></li>
         </ol>

     </div>

 @elseif($routelink >= 1)

     <div class=" container" style="font-size: 14px;">
         <ol class="breadcrumb float-sm-right">


             @foreach (\App\Models\status::where('p_id', 2)->where('route_system_name', $route_system_name[1])->orderby('id', 'desc')->get() as $systemsnames)
                 <li class="breadcrumb-item"><a @class([
                     'font-bold' => true,
                     'text-danger' => $route == $systemsnames->route_name,
                 ])
                         href="{{ route($systemsnames->route_name) }}">{{ $systemsnames->page_name }}</a></li>
             @endforeach

             {{-- <li class="breadcrumb-item"><a href="{{ route('index') }}">الموقع</a></li> --}}
             <li class="breadcrumb-item"><a href="{{ url('http://127.0.0.1:8000/') }}">الرئيسية</a></li>
           
           </ol>
     </div>


 @endif
