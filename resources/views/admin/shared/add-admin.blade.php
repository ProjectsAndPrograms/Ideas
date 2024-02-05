
<div class="row justify-content-center mt-5 mx-3">
    <div class="col-12 pb-4 px-4 shadow p-3 mb-5 bg-body rounded" style="border-top: 4px solid #e95420;">
       
        <form class="form mt-4 mb-4" action="{{route('admin.store')}}" method="POST">
            @csrf
            <h3 class="text-center text-dark mb-4 fw-b fs-2">
               @lang('ideas.add_admin')
            </h3>
            <div class="form-group ">
                <label for="name" class="text-dark">
                    @lang('ideas.name'): 
                </label><br>
                <input type="text" name="name" id="name" class="form-control">
                @error('name')
                    <span class="d-block ft-6 text-danger"> {{ $message }} </span>
                @enderror
            </div>

            <div class="form-group mt-3 ">
                <label for="email" class="text-dark ">@lang('ideas.email'): </label><br>
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                    <span class="d-block ft-6 text-danger "> {{ $message }} </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password" class="text-dark">@lang('ideas.password'):</label><br>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class="d-block ft-6 text-danger"> {{ $message }} </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="confirm-password" class="text-dark">@lang('ideas.confirm_password'):</label><br>
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                @error('password_confirmation')
                    <span class="d-block ft-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md fs-6" value="@lang('ideas.add')">
            </div>
           
        </form>
    </div>
</div>
