<div class="card mt-1  shadow bg-body rounded border-2 ">
    <div class="card-header pb-2 pt-2 border-0">
        <h5 class="">@lang('ideas.users')</h5>
    </div>
    <div class="card-body">

        @forelse ($users as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <img style="width: 50px;" class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}"
                        alt="Admins image">
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0 text-primary" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                    <p class="mb-0 ps-3 small text-truncate">{{ $user->getUsername($user) }}</p>
                </div>

                <a class="btn btn-success rounded icon-md ms-auto" href="{{ route('users.show', $user->id) }}">
                    <i class="fa-solid fa-eye"> </i>
                </a>
                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                    @csrf
                    @if (auth()->user()->id == $user->id)
                        <button class="btn btn-danger text-light rounded icon-md disabled">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    @else
                        <button type="submit" class="btn btn-danger text-light rounded icon-md">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    @endif
                </form>
            </div>
        @empty
        <p class="text-center">@lang('ideas.no_result_found')</p>
        @endforelse


    </div>
    <div class="card-footer pb-0 border-0">
        {{ $users->withQueryString()->links() }}
    </div>
</div>
