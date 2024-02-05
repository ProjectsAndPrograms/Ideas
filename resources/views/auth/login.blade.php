@extends('layout.layout')
@section('title', 'Login')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-10 col-sm-8 col-md-5 pb-4 px-4 shadow-lg p-3 mb-5 bg-body rounded" style="border-top: 4px solid #e95420;">
        <form class="form mt-4 mb-4" action="{{ route('login') }}" method="post">
            @csrf
            <h3 class="text-center mb-4 fs-2 text-dark">
                @lang('ideas.login')
            </h3>
            <div class="form-group mt-3">
                <label for="email" class="text-dark">
                    @lang('ideas.email'):
                </label><br>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="text-dark">
                    @lang('ideas.password'):
                </label><br>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
            </div>
            <div class="text-right mt-2">
                <a href="{{ route('register') }}" class="text-dark">
                    @lang('ideas.register_here')
                </a>
            </div>
        </form>
    </div>
</div>

@endsection