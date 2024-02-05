<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="comment" class="fs-6 form-control" rows="1"></textarea>
            @error('comment')
                <span class="text-danger fs-6 mt-2">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">@lang('ideas.post_comment')</button>
        </div>
    </form>

    @if (count($idea->comments) > 0)
        <hr>
    @endif

    @if (Route::is('ideas.*'))
        @forelse ($idea->comments as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('users.show', $comment->user->id) }}"
                            class="fs-6 text-dark text-decoration-none">{{ $comment->user->name }}
                        </a>

                        <small class="fs-6 fw-light text-muted ms-auto me-2">{{ $comment->created_at->diffForHumans() }}
                        </small>

                        @auth
                            @if ((bool) auth()->user()->is_admin)
                                <form action="{{ route('admin.delete.comment', $comment->id) }}" method="POST">
                                    @csrf
                                    <button class="btn ms-1 btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            @endif
                        @endauth
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-center mt-3">@lang('ideas.no_comment_found')</p>
        @endforelse
    @else
        @forelse ($idea->comments->take(1) as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('users.show', $comment->user->id) }}"
                            class="fs-6 text-dark text-decoration-none">{{ $comment->user->name }}
                        </a>

                        <small
                            class="fs-6 fw-light text-muted ms-auto me-2">{{ $comment->created_at->diffForHumans() }}
                        </small>

                        @auth

                            @if ((bool) auth()->user()->is_admin)
                                <form action="{{ route('admin.delete.comment', $comment->id) }}" method="POST">
                                    @csrf
                                    <button class="btn ms-1 btn-danger btn-sm"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            @endif
                        @endauth

                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
            @php $comments_available = true;  @endphp

        @empty
            @php $comments_available = false;  @endphp
        @endforelse
        {{-- <hr class="mt-0 mb-1"> --}}
        @if ($comments_available)
            <a href="{{ route('ideas.show', $idea->id) }}" class="text-dark text-start m-2">@lang('ideas.show_all')...</a>
        @endif
    @endif


</div>
