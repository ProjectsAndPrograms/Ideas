
<div class="row justify-content-center mt-5 mx-3">
    <div class="col-12 pb-4 px-4 shadow p-3 mb-5 bg-body rounded" style="border-top: 4px solid #e95420;">
       
        <form class="form mt-4 mb-4" action="{{ route('admin.users') }}" method="get">
            @csrf
            <h3 class="text-center text-dark mb-4 fw-b fs-2">
               @lang('ideas.find_user')
            </h3>
            <div class="form-group ">
                <label for="name" class="text-dark">
                    @lang('ideas.name'): 
                </label><br>
                <input type="text" name="search" id="search" class="form-control" value="{{request('search')}}"  placeholder="username">
                @error('name')
                    <span class="d-block ft-6 text-danger"> {{ $message }} </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="remember-me" class="text-dark"></label><br>
                <input type="submit" name="submit" class="btn btn-dark btn-md fs-6" value="@lang('ideas.search')">
            </div>
           
        </form>
    </div>
</div>
