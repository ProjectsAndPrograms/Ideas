@auth
    <h4> @lang('ideas.share_your_ideas') </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>

                @error('content')
                <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                {{-- $message is injected by larvel itself, it is the error/exception message --}}
                @enderror

            </div>
            <div class="">
                <button type="submit" class="btn btn-dark"> @lang('ideas.share') </button>
            </div>
        </form>
    </div>
@endauth

@guest
    <h1>{{ __('ideas.login_to_share') }}</h1>
    {{--OR <h1>{{ trans('ideas.login_to_share') }}</h1> --}}
    {{--OR @lang('ideas.login_to_share') --}}
@endguest
<hr>