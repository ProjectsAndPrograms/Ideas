
<ul class="nav nav-tabs border-primary border-3" >
    <li class="nav-item ">
        <a  class="nav-link fs-5 border-3 {{ Route::is('admin.dashboard') ? 'border-primary active' : '' }} "aria-current="page" href="{{route('admin.dashboard')}}">@lang('ideas.admins')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link fs-5 border-3 {{ Route::is('admin.users') ? 'border-primary active' : '' }}" href="{{route('admin.users')}}">@lang('ideas.users')</a>
    </li>
</ul>


