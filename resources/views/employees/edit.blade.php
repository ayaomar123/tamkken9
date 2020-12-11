@extends("layouts.main")
@section("title","Edit Employee")
@section("content")

<form method='post' action='{{asset("employees/".$item->id)}}'>
    @csrf
    @method("put")

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="fname">Employee First Name</label>
            <input autofocus='true' value='{{ old("fname",$item->fname) }}' type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">   
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="lname">Employee last Name</label>
            <input value='{{ old("lname",$item->lname) }}' type="text" class="form-control" name="lname" id="lname" placeholder="Enter last Name">   
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Employee Email</label>
            <input type="text" value='{{ old("email",$item->email) }}' class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="phone">Employee Phone</label>
            <input type="text" value='{{ old("phone",$item->phone) }}' class="form-control" name="phone" id="phone" placeholder="Enter Phone Number">
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">          
            <label>
            <input {{$item->gender=='m'?"checked":""}} type="radio" value='m' name="gender" />
            Male
            </label>
            <label>
            <input {{$item->gender=='f'?"checked":""}} type="radio" value='f' name="gender" />
            Female
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="notes">Employee Number</label>
            <input type="text" value='{{old("empNo",$item->empNo) }}' class="form-control" name="empNo" id="empNo" placeholder="Enter Employee Number">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Update</button>
    <a class='btn btn-light' href='{{route("employees.index")}}'>Cancel</a>

</form>
@endsection