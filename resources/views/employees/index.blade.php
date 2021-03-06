@extends("layouts.main")
@section("title","Manage Employees")
@section("content")

<a href='{{route("employees.create")}}' class='btn btn-success'>Create New Employee</a>

<table class="table table-striped table-sm mt-3">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Employee Number</th>
            <th width="20%">Options</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->fname ." ". $item->lname }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->gender=='m'?"Male":"Female" }}</td>
            <td>{{ $item->empNo }}</td>
            <td>
                <form method='post' action='{{asset("employees/".$item->id)}}'>
                    @csrf
                    @method("delete")
                    <a href='{{ route("employees.show",$item->id) }}' class='btn btn-sm btn-info'>Show</a>
                    <a href='{{ route("employees.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit <i class="fa fa-edit"></i></a>
                    <input type='submit' onclick='return confirm("Are you sure Dude?")' value='Delete' class='btn btn-danger btn-sm ' />                </form>    
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection