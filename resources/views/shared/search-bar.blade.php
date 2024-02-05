<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">@lang('ideas.search')</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard') }}" method="GET">
            <input value="{{ request('search', '') }}" name="search" placeholder="..." class="form-control w-100" type="text">
            <button class="btn btn-dark mt-2" type="submit">@lang('ideas.search')</button>
        </form>
    </div>
</div>