<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Attendance;
use App\Status;
use App\StatusSearch;

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

    // Home Main Page
    public function index() {
        
        // Catch Data for select input
        $att = Attendance::pluck('day', 'id');
        $status = StatusSearch::pluck('status_Name', 'id');
        
        // Check status type is submited and asign her value
        if(filter_input(INPUT_GET, 'status_id')) {
            if($_GET['status_id'] == 1) {
                $stats = Status::where('present', '1')->get();
            } else if ($_GET['status_id'] == 2) {
                $stats = Status::where('absent', '1')->get();
            } else if ($_GET['status_id'] == 3) {
                $stats = Status::where('sick_leave', '1')->get();
            } else if ($_GET['status_id'] == 4) {
                $stats = Status::where('day_off', '1')->get();
            }

            // Selcet all Employees
            $emps = Employee::all();
        } // Find the employees with date selected
        else if(filter_input(INPUT_GET, 'att_id')){
            $emps = Employee::where('id', $_GET['att_id'])->orderBy('id', 'asc')->get();
            $stats = [];
        } else {
            $emps = Employee::orderBy('id', 'asc')->paginate(10);
            $stats = [];
        }

        // Return Data to the page
        $empData = [
            'stats' => $stats,
            'emps' => $emps,
            'att' => $att,
            'status' => $status
        ];
        return view('home')->with($empData);
    }

    // Create Employee page
    public function create() {
        return view('create');
    }

    // Store New Employee
    public function store(Request $request) {
        
        // Check for validation and submited
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

    // Edit Employee page
    public function edit($id) {
        
        // Return data of selected employee to edit
        $emp = Employee::find($id);
        return view('edit', compact('emp'));
    }

    // Update edited employee info
    public function update(Request $request, $id) {
        
        // Check for validation and submited
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

    // Delete an Employee
    public function destroy($id) {

        // Catch employee
        $emp = Employee::findOrFail($id);
        $emp->delete();

        return redirect('/');
    }

    // Create new Attendance page
    public function createAtt() {

        // Return types of status to select from it
        $status = StatusSearch::pluck('status_name', 'id');

        return view('createAtt', compact('status'));
    }

    // Store new Attendance 
    public function storeAtt(Request $request) {

        // Check for validation and submited
        $this->validate($request, [
            'employee_id' => 'required',
            'status_id' => 'required',
            'work_hours' => 'required',
            'day' => 'required'
        ]);
        
        // Create new Attendance and new Status
        $att = new Attendance;
        $stat = new Status;

        // Insert Status
        if($request->input('status_id') == 1) {
            $stat->present = 1;
            $stat->absent = 0;
            $stat->sick_leave = 0;
            $stat->day_off = 0;

        } else if ($request->input('status_id') == 2) {
            $stat->absent = 1;
            $stat->present = 0;
            $stat->sick_leave = 0;
            $stat->day_off = 0;

        } else if ($request->input('status_id') == 3) {
            $stat->sick_leave = 1;
            $stat->absent = 0;
            $stat->present = 0;
            $stat->day_off = 0;
        } else if ($request->input('status_id') == 4) {
            $stat->day_off = 1;
            $stat->absent = 0;
            $stat->present = 0;
            $stat->sick_leave = 0;
        }


        // Catch employee
        $emp = Employee::where('name', $request->input('employee_id'))->get();
        // Catch employee id to save into attendance's employee_id
        foreach($emp as $em){
            $att->employee_id = $em->id;
        }
        
        // Catch last status id to add to attendance's status_id
        $stat_last_id = Status::all()->last()->id;
        $att->status_id = ($stat_last_id+1);

        // Return work hours and day date
        $att->work_hours = $request->input('work_hours');
        $att->day = $request->input('day');

        $att->save();
        $stat->save();
        
        return redirect('/');
    }

    // Report page
    public function report(){

        // Check for select filters
        if(filter_input(INPUT_GET, 'emp_name')) {
            if(filter_input(INPUT_GET, 'start_date')) {
                if(filter_input(INPUT_GET, 'last_date')) {
                    
                    // Catch employee id
                    $emps_id = Employee::where('name', $_GET['emp_name'])->select('id')->get();
                    foreach($emps_id as $emp_id) {
                        $emp_id;
                    }

                    // Catch wanted attendance
                    $atts = Attendance::where('employee_id', $emp_id->id)->get();

                    // total hours attending for employee between to dates
                    $from = $_GET['start_date'];
                    $to = $_GET['last_date'];

                    // Array of work ours
                    $work_hs = Attendance::where('employee_id', $emp_id->id)->whereBetween('day', [$from, $to])->select('work_hours')->get();
                    
                    // Calculate total hours
                    $hours_total = 0;
                    foreach($work_hs as $work_h) {
                        $hours_total += $work_h->work_hours;
                    }

                    // Calculate total dates
                    $days_count = count($work_hs);

                    $empData = [
                        'atts' => $atts,
                        'hours_total' => $hours_total,
                        'days_count' => $days_count,
                        'emp_name' => $_GET['emp_name']
                    ];

                    return view('report')->with($empData);
                }
            }
        }
        
        // Prevent Error
        $empData = [
            'atts' => [],
            'hours_total' => '',
            'days_count' => '',
            'emp_name' => ''
        ];

        return view('report')->with($empData);
    }

    // Employee of the month
    public function empMonth() {

        // Catch all employees
        $emps = Employee::all();

        // Calculate work hours to all employee
        foreach($emps as $emp) {

            // Catch work hours
            $work_hs = Attendance::where('employee_id', $emp->id)->select('work_hours')->get();

            // Calculate total work hours
            $hours_total = 0;
            foreach($work_hs as $work_h) {
                $hours_total += $work_h->work_hours;
            }

            // Save employees work hours to Array
            $emps_month[] = $hours_total;
        }

        // Catch max total work hours
        $emp_month = max($emps_month);

        // Catch employee id with max total work hours
        $emp_month_id = array_search($emp_month, $emps_month)+1;

        // Catch employee name with max total work hours
        $emp_month_name = Employee::find($emp_month_id)->name;

        $emps_month_data = [
            'emp_month' => $emp_month,
            'emp_month_name' => $emp_month_name
        ];

        return view('empMonth')->with($emps_month_data);
    }
}
