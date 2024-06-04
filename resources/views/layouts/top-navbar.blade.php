
   
 <header>
    <nav class="navbar bg-dark  navbar-expand-md navbar-dark justify-content-between align-items-center py-3 ">
        <div class="container">

            <button class="navbar-toggler my-3" type="button" data-bs-toggle="collapse" data-bs-target=".navmenu">
                <span class="navbar-toggler-icon " style="color: yellow !important;"></span>
            </button>


            <div class="collapse navbar-collapse navmenu">
                <ul class="navbar-nav" style="text-align: start;">
                    <li class="nav-item px-2"><a href="#" class="nav-link">الرئيسية</a></li>
                  
                  
                    <div class="dropdown nav-item ">
                        <button class="btn  dropdown-toggle  nav-link" type="button" id="address_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            العناوين والثوابت
                        </button>
                        <div class="dropdown-menu" aria-labelledby="address_menu">
                          <a class="dropdown-item" href="{{route('address.index')}}">قائمة العناوين</a>
                          <a class="dropdown-item" href="{{route('address.create')}}"> اضافة عنوان جديد</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item " href="{{route('status.create')}}">ثوابت النظام</a>
                         
                        </div>
                      </div>
                    <li class="nav-item px-2"><a href="#" class="nav-link">رؤيتنا</a></li>
                    <li class="nav-item px-2"><a href="#" class="nav-link">اتصل بنا</a></li>
                    <li class="nav-item px-2"><a href="#" class="nav-link">مدونات</a></li>
                    <li class="nav-item mx-lg-5 " id="login-span"><a href="{{ route('login') }}"
                            class="nav-link text-warning">دخول</a></li>
                </ul>
            </div>


{{-- 
            <div style="height: 50px; width: 60px; " class="py-1 d-none d-lg-block  " id="move-log">
                <a href="#"> <img src="{{ asset('media/html/logo/1.png') }}" alt="not available"
                        style="height: 100%; width:100%;"></a>
            </div> --}}
            <div>
                <p class="h3 text-light">Relief</p>
            </div>
        </div>

    </nav>
</header>
