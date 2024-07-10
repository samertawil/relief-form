<header>
    <nav class="navbar bg-dark  navbar-expand-md navbar-dark justify-content-between align-items-center py-3 ">
        <div class="container">

            <button class="navbar-toggler my-3" type="button" data-bs-toggle="collapse" data-bs-target=".navmenu">
                <span class="navbar-toggler-icon " style="color: yellow !important;"></span>
            </button>


            <div class="collapse navbar-collapse navmenu">
                <ul class="navbar-nav" style="text-align: start;">
                    <li id="t1" class="nav-item px-2"><a href="{{ url('/') }}" class="nav-link">الرئيسية</a>
                    </li>
                    <li class="hidden nav-item px-2"><a href="{{ route('address.index') }}" class="nav-link">بياناتي</a>
                    </li>


                    <div class=" hidden dropdown nav-item ">
                        <button class="btn  dropdown-toggle  nav-link" type="button" id="address_menu"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            الابلاغ عن اضرار
                        </button>
                        <div class="dropdown-menu" aria-labelledby="address_menu">
                            <a class="dropdown-item" href="{{ route('damages.missing.index') }}">استبانة مفقودين تحت
                                الانقاض</a>
                            <a class="dropdown-item" href="{{ route('damages.places.index') }}">استبانة حصر الاضرار
                                السكنية</a>

                        </div>
                    </div>

                    <li class="nav-item px-2"><a href="#" class="nav-link">حول الاغاثة</a></li>
                    <li class="nav-item px-2"><a href="{{ route('contact-us') }}" class="nav-link">اتصل بنا</a></li>

                </ul>
            </div>


            <div>

                <p class="h5 text-light bg-danger text-center">Relief</p>

                <div class="d-flex justify-content-between align-items-center">
                    <button
                        class="btn btn-small text-muted"><small>{{ Auth::user()->full_name ?? 'Guest' }}</small></button>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-small text-muted ">
                            <small>تسجيل
                                خروج</small> </button>
                    </form>

                </div>

            </div>
        </div>

    </nav>


</header>
