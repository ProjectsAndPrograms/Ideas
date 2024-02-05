@extends('layout.layout')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="col-12 col-lg-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-12 col-lg-6">
            @include('shared.success-message')

            @include('users.shared.user-card')

            <hr>
            @forelse ($ideas as $idea)
                @include('ideas.shared.idea-card')
            @empty
                <p class="text-center mt-3">@lang('ideas.no_result_found')</p>
            @endforelse

            <div class="mt-2">
                {{ $ideas->withQueryString()->links() }}
                {{-- withQueryString() helps us to pass the query string to the next page that is used for searches --}}
            </div>
        </div>

        <div class="col-12 col-lg-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
