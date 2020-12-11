<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table("employees")->get();
        return view("employees.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fname'=>'required|max:50',
            'lname'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|max:50',
            'gender'=>'required|max:1',
            'empNo'=>'required|max:50',
        ]);

        DB::table("employees")->insert([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'empNo' => $request['empNo'],
        ]);

        Session::flash("msg","employee Created Successfully");

        return redirect(route("employees.create"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table("employees")->find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("employees.index"));
        }
        return view("employees.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = DB::table("employees")->find($id);
        if(!$item){
            session()->flash("msg","Invalid Id");
            return redirect(route("employees.index"));
        }
        return view("employees.edit",compact('item'));
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
        request()->validate([
            'fname'=>'required|max:50',
            'lname'=>'required|max:50',
            'email'=>'required|email|max:50',
            'phone'=>'required|max:50',
            'gender'=>'required|max:1',
            'empNo'=>'required|max:50',
        ]);

        DB::table("employees")->where("id",$id)->update([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'empNo' => $request['empNo'],
        ]);
        session()->flash("msg","employees Updated Successfully");
        return redirect(route("employees.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("employees")->where("id",$id)->delete();
        session()->flash("msg","employees Deleted Successfully");
        return redirect(route("employees.index"));
    }
}
