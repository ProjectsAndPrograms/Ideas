@extends('layout.layout')
@section('title', Route::is('feed') ? 'Feed' : 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-12 col-lg-6">
            @include('shared.success-message')
            @include('ideas.shared.submit-idea')
       

            {{--
                @if (count($ideas) > 0)
                    @foreach ($ideas as $idea)
                        @include('shared.idea-card')
                    @endforeach
                @else
                    <p class="text-center mt-3">No result found.</p>
                @endif
           --}}

            @forelse ($ideas as $idea)
                @include('ideas.shared.idea-card')
            @empty
                <p class="text-center mt-3"> @lang('ideas.no_result_found') </p>
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
