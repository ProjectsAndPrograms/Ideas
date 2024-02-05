<div class="card">
    <div class="px-3 pt-4 pb-2">

        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                @auth
                    @can('update', $user)
                        <div>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-success btn-sm"><i
                                    class="fa-solid fa-eye"></i></a>
                        </div>
                    @endcan
                @endauth
            </div>

            <div class="mt-4">
                <label for="image">@lang('ideas.profile_pic') : </label>
                <input type="file" name="image" id="image" class="form-control" />
                @error('image')
                    <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> @lang('ideas.bio') : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>

                    @error('bio')
                        <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                        {{-- $message is injected by larvel itself, it is the error/exception message --}}
                    @enderror

                    <button class="btn btn-dark btn-sm mb-3 mt-3">@lang('ideas.save')</button>

                </div>

               @include('users.shared.user-stats')

            </div>

        </form>
    </div>
</div>
