<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageURL() }}">
                <div>
                    <h3 class="card-title mb-0"><a href="#">{{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->getUsername($user) }}</span>
                </div>
            </div>

            {{-- @auth --}}
                {{-- @if (Auth::id() === $user->id) --}}
                @can('update', $user)
                    <div>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                @endcan
                {{-- @endif --}}
            {{-- @endauth --}}
        </div>

        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">{{ $user->bio }}</p>

            @include('users.shared.user-stats')

            @auth
                {{-- @if (Auth::id() !== $user->id) --}}
                @if(Auth::user()->isNot($user))
                    <div class="mt-3">
                        @if (Auth::user()->follows($user))
                            <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm"> @lang('ideas.unfollow') </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"> @lang('ideas.follow') </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
