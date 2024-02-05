<div class="card mt-3  shadow bg-body rounded border-2 ">
    <div class="card-header pb-0 border-0">
        <h5 class="">
            @lang('ideas.admins')
        </h5>
    </div>
    <div class="card-body">

        @foreach ($admins as $admin)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <img style="width: 50px;" class="avatar-img rounded-circle" src="{{ $admin->getImageURL() }}"
                        alt="Admins image">
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0 text-primary" href="{{ route('users.show', $admin->id) }}">{{ $admin->name }}</a>
                    <p class="mb-0 ps-3 small text-truncate">-{{ $admin->email }}</p>
                </div>

                <a class="btn btn-success rounded icon-md ms-auto" href="{{ route('users.show', $admin->id) }}">
                    <i class="fa-solid fa-eye"> </i>
                </a>

                @if ($admin->id === auth()->user()->id || count($admins) === 1)
                    <a type="submit" href="{{ route('admin.update', $admin->id) }}"
                        class="btn btn-danger text-light rounded icon-md disabled">
                        <i class="fa-solid fa-trash-can"></i> </a>
                @else
                    <a type="submit" href="{{ route('admin.update', $admin->id) }}"
                        class="btn btn-danger text-light rounded icon-md">
                        <i class="fa-solid fa-trash-can"></i>
                    </a>
                @endif





            </div>
        @endforeach



    </div>
</div>
