<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.assignments') }}">ASSIGNMENTS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.students') }}">STUDENTS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.teachers') }}">TEACHERS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.exams') }}">EXAMS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.meetings') }}">MEETINGS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.rewards') }}">AWARDS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.stream.subjects') }}">FACILITATORS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.library.books') }}">BOOKS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.borrowed.books') }}">BORROWED BOOKS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.school.fields') }}">FIELDS</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('student.school.halls') }}">HALLS</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img width="30" height="30" class="rounded-circle" src="/storage/storage/{{Auth::user()->image }}" onerror="this.src='{{asset('static/avatar.png')}}'" style="margin: 6px;margin-top: 0px;margin-bottom: 0px">
                                        <span>Welcome: {{ Auth::user()->first_name }}</span>
                                        <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('student.profile') }}">Profile</a>
                                    <a class="dropdown-item" href="{{route('student.change-password.form')}}">Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>