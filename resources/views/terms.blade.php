@extends('layout.layout')
@section('title', 'Terms')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-12 col-lg-6">
            <h1>@lang('ideas_terms.terms') : </h1>
            <div>
                @lang('ideas_terms.terms_body')
            </div>
        </div>
        <div class="col-12 col-lg-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
