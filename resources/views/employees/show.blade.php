@extends("layouts.main")
@section("title","Show employees")
@section("content")
<div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Employee Full Name</label>
        <input readonly autofocus='true' value='{{ $item->fname ." " .$item->lname}}' type="text" class="form-control" name="name" id="name" placeholder="Enter employees Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Employee Email</label>
            <input readonly type="text" value='{{ $item->email }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Employee Phone</label>
            <input readonly type="text" value='{{ $item->phone }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input disabled {{$item->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input disabled {{$item->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Employee Number</label>
            <textarea readonly class="form-control" name="empNo" id="empNo" placeholder="Enter Notes">{{ $item->empNo }}</textarea>
            
        </div>
    </div>
    
    <a href='{{ route("employees.edit",$item->id) }}' class='btn btn-sm btn-info'>Edit</a>
    <a class='btn btn-light' href='{{route("employees.index")}}'>Cancel</a>

</form>
@endsection