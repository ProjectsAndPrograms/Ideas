<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">@lang('ideas.who_to_follow')</h5>
    </div>
    <div class="card-body">

        @foreach ($topUsers as $user)

        <div class="hstack gap-2 mb-3">
            <div class="avatar">
               <img style="width: 50px;" class="avatar-img rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="">
            </div>
            <div class="overflow-hidden">
                <a class="h6 mb-0 text-primary" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                <p class="mb-0 small text-truncate"> {{  $user->followers()->count() }} @lang('ideas.followers')</p>
                
            </div>
            <a class="btn btn-light rounded icon-md ms-auto" href="{{ route('users.show', $user->id) }}"><i
                    class="fa-solid fa-eye"> </i></a>
        </div>
        
        @endforeach
        {{-- <div class="d-grid mt-3">
            <a class="btn btn-sm btn-primary-soft" href="#!">@lang('ideas.show_more')</a>
        </div> --}}
    </div>
</div>