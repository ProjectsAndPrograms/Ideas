<div class="mb-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle" src="{{ $idea->user->getImageURL() }}"
                        alt="Mario Avatar">
                    <div>
                        <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                                {{ $idea->user->name }}
                            </a></h5>
                    </div>
                </div>

                <div>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                        @csrf
                        @method('delete') {{-- this is used to define delete request , we are simply spoofing our
                        request to delete --}}

                        <a class="btn btn-success ms-1 btn-sm" href="{{ route('ideas.show', $idea->id) }}"><i
                                class="fa-solid fa-eye"></i></a>

                        @auth
                            {{-- {{ dump($idea->user->id) }} --}}
                            {{-- {{dump(Auth::user()->id)}} --}}

                            {{-- @can('idea.delete', $idea) --}}
                            @can('update', $idea)
                                <a class="btn btn-success btn-sm" href="{{ route('ideas.edit', $idea->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                                <button class="btn ms-1 btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                            @endcan
                        @endauth

                    </form>
                </div>

            </div>
        </div>
        <div class="card-body">

            @if ($editing ?? false)
                {{-- if editing is undefined use default value --}}
                <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>

                        @error('content')
                            <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                            {{-- $message is injected by larvel itself, it is the error/exception message --}}
                        @enderror

                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark btn-sm mb-2"> @lang('ideas.update') </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif


            <div class="d-flex justify-content-between">

                @include('ideas.shared.like-button')

                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at->diffForHumans() }} </span>
                </div>
            </div>


            @include('ideas.shared.comment-box')

        </div>
    </div>
</div>
