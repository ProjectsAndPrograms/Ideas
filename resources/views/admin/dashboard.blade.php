@extends('layout.layout')
@section('title', 'Admin Dashboard')

@section('content')
    <h1 class=''>
        <span><i class="fa-solid fa-hashtag text-primary"></i></span>
        <u>@lang('ideas.admin_dashboard')</u>
    </h1>
    <br>

    <div>
    @include('admin.shared.tabs')

    <div class="row">
        <div class="col-12 col-md-8 mt-5 px-3">
            @include('shared.success-message')

            @include('admin.shared.show-admins')
        </div>
        <div class="col-12 col-md-4 ms-auto">
            @include('admin.shared.add-admin')
        </div>
    </div>
</div>
@endsection
