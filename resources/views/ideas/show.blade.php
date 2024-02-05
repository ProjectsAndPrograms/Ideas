
@extends('layout.layout')
@section('title', (Route::is('ideas.edit') ? 'Edit Idea' : 'View Idea' ))

@section('content')

    <div class="row">
            <div class="col-12 col-lg-3">
              @include('shared.left-sidebar')
            </div>
            <div class="col-12 col-lg-6">
                @include('shared.success-message')
              
                @include('ideas.shared.idea-card')
            </div>
            <div class="col-12 col-lg-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
    </div>
   
@endsection