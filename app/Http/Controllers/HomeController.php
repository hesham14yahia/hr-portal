<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::all();
        return view('home', compact('emps'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'hire_date' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);

        // Create Employee
        $emp = new Employee;
        $emp->name = $request->input('name');
        $emp->email = $request->input('email');
        $emp->mobile = $request->input('mobile');
        $emp->hire_date = $request->input('hire_date');
        $emp->save();
        
        return redirect('/');
    }

    public function edit($id){
        $emp = Employee::find($id);
        return view('edit', compact('emp'));
    }

    public function update(Request $request, $id) {
        
        $this->validate($request, [
            'name' => 'required',
            'hire_date' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ]);

        // Update Employee
        $emp = Employee::findOrFail($id);
        $emp->name = $request->input('name');
        $emp->email = $request->input('email');
        $emp->mobile = $request->input('mobile');
        $emp->hire_date = $request->input('hire_date');
        $emp->save();
        
        return redirect('/');
    }

    public function destroy($id){
        $emp = Employee::findOrFail($id);
        $emp->delete();

        return redirect('/');
    }
}
