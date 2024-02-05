<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/">
            <span class="fas fa-brain me-1 text-primary text-border-light">
                 </span>{{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                @guest
                <li class="nav-item">
                    <a class="{{ Route::is('login') ? 'active' : '' }} nav-link" aria-current="page" href="{{ route('login') }}">@lang('ideas.login')</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('register') ? 'active' : '' }} nav-link" href="{{ route('register') }}">@lang('ideas.register')</a>

                    

                </li>
                @endguest

                @auth
                @if (Auth::user()->is_admin)
                <li class="nav-item">
                    {{-- <a class="{{ Route::is('users') ? 'active' : '' }} nav-link" href="{{ route('admin.dashboard') }}">@lang('ideas.admin_dashboard')</a> --}}


                    <a class="nav-link" href="{{route('admin.dashboard')}}">@lang('ideas.admin_dashboard')</a>

                </li>
                @endif

                <li class="nav-item">
                    <a class="{{ Route::is('profile') ? 'active' : '' }} nav-link me-2" href="{{ route('profile') }}">@lang('ideas.welcome') {{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm my-2">@lang('ideas.logout')</button>
                    </form>
                </li>

                @endauth

            </ul>
        </div>
    </div>
</nav>