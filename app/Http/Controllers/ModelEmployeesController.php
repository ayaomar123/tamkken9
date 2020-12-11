<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Session,Redirect;

class ModelEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Employee::get();

        return view('ModelEmployees.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ModelEmployees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'empNo' => 'required',
            'department_id' => 'required',

        ]);

        Employee::create($request->all());
        Session::flash("msg","Employee Created Successfully");

        return redirect()->route('modelEmployees.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $item = Employee::find($id);
        return view('modelEmployees.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $item = Employee::find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("modelEmployees.index"));
        }
        return view('modelEmployees.edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'empNo' => 'required',
            'department_id' => 'required',

        ]);
        Employee::where("id",$id)->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'empNo' => $request['empNo'],
            'department_id' => $request['department_id']
        ]);        Session::flash("msg","Employee Updated Successfully");
        return redirect()->route('modelEmployees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Employee::find($id)->delete();
        Session::flash("msg","Employee Deleted Successfully");
        return Redirect::to('modelEmployees');
    }
}
