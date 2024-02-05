
<div class="card mb-3 overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary': '' }} nav-link rounded" href="{{route('dashboard')}}">
                    <span>@lang('ideas.home')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('feed') ? 'text-white bg-primary': '' }} nav-link rounded" href="{{route('feed')}}">
                    <span>@lang('ideas.feed')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ Route::is('terms') ? 'text-white bg-primary': '' }} nav-link rounded" href="{{route('terms')}}">
                    <span>@lang('ideas_terms.terms')</span>
                </a>
            </li>
           
        </ul>
    </div>
    <div class="card-footer {{ Route::is('profile') ? 'text-white bg-primary': '' }} text-center py-2" style='border-radius: 0px;'>
        <a class=" nav-link p-2 " href="{{route('profile')}}">
            @auth                
                @lang('ideas.view_profile')
            @endauth
            @guest
                @lang('ideas.login')
            @endguest
        </a>
    </div>
</div>