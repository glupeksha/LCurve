<nav class="navbar navbar-default navbar-static-top topbar">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar">icon</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', "L'Curve") }}
            </a>

            <span class="logo">
                <a href="{ url('/') }}" class="">
                    <img class="logo" src="{{asset('images/logoTrans100.PNG')}}" alt="L'Curve">
                </a>
            </span>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              <li><a href="{{url('users')}}">@lang('applang.users')</a></li>
              <li><a href="{{url('permissions')}}">@lang('applang.permission')</a></li>
              <li><a href="{{url('roles')}}">@lang('applang.role')</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">@lang('applang.basicConfig')
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('subjects')}}">@lang('applang.configSubject')</a></li>
                  <li><a href="{{url('grades')}}">@lang('applang.configGrade')</a></li>
                  <li><a href="{{url('classRooms')}}">@lang('applang.configClass')</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> @lang('applang.manage')
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{url('societies')}}">@lang('applang.societiesBar')</a></li>
                  <li><a href="{{url('sports')}}">@lang('applang.sportsBar')</a></li>
                </ul>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                <li><a href="{{url('locale/en')}}">@lang('applang.chooseEn')</a></li>
                <li><a href="{{url('locale/si')}}">@lang('applang.chooseSi')</a></li>
                <li><a href="{{url('locale/ta')}}">@lang('applang.chooseTa')</a></li>
                <li><a href="{{ route('login') }}">@lang('applang.loginbutton')</a></li>
                <li><a href="{{ route('register') }}">@lang('applang.RegisterReq')</a></li>
                @else
                <li><a href="{{url('locale/en')}}">@lang('applang.chooseEng')</a></li>
                <li><a href="{{url('locale/si')}}">@lang('applang.chooseSin')</a></li>
                <li><a href="{{url('locale/ta')}}">@lang('applang.chooseTam')</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-button" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li>

                            @role('Admin') {{-- Laravel-permission blade helper --}}
                                <a href="#"><i class="fa fa-btn fa-unlock"></i>Admin</a>
                            @endrole

                            <a href="{{route('home')}}">@lang('applang.profileBar')</a>


                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            @lang('applang.logoutBar')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
