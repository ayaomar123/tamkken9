@extends("layouts.main")
@section("title","Create Employee")

@section("content")

<form method='post' action='{{asset("employees")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="fname">Employee first Name</label>
            <input autofocus='true' value='{{ old("fname") }}' type="text" class="form-control" name="fname" id="name" placeholder="Enter First Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="lname">Employee Last Name</label>
            <input  value='{{ old("lname") }}' type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Employee Email</label>
            <input type="text" value='{{ old("email") }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Employee Phone</label>
            <input type="text" value='{{ old("phone") }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input {{old('gender')=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input {{old('gender')=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="empNo">Employee Number</label>
            <input type="text" value='{{ old("empNo") }}' class="form-control" name="empNo" id="empNo" placeholder="Enter Employee Number">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Create</button>
    <a class='btn btn-light' href='{{route("employees.index")}}'>Cancel</a>

</form>
@endsection