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
    public function index() {
        $att = Attendance::pluck('day', 'id');
        // $status = Status::pluck('present', 'id');
        // $statusSearch = ['Present', 'Absent', 'Sick Leave', 'Day Off'];
        $status = StatusSearch::pluck('status_Name', 'id');
        if(filter_input(INPUT_GET, 'status_id')) {
            if($_GET['status_id'] == 1) {
                $stats = Status::where('present', '1')->get();
                // return dd($stats->statusAtts->status_id);
                // return $stats; statusAtts
                // foreach($stats as $attend) {
                //     echo  Employee::find($attend->statusAtts->employee_id);
                // }
                // return 1;
                // return $atts = $stats->statusAtts;
                // foreach($stats as $stat) {
                //     $stat_att = Status::where('id', $stat->id);
                // }
                // foreach($stats as $stat) {
                // $atts .= Attendance::where('status_id', $stat->id);
                // }
                // $atts = Attendance::where('status_id', $stat->id);
            } else if ($_GET['status_id'] == 2) {
                $stats = Status::where('absent', '1')->get();
            } else if ($_GET['status_id'] == 3) {
                $stats = Status::where('sick_leave', '1')->get();
            } else if ($_GET['status_id'] == 4) {
                $stats = Status::where('day_off', '1')->get();
            }
            $emps = Employee::all();
            // $status = Status::where('')
            // $emps = Attendance::where('id', $_GET['status_id'])->orderBy('id', 'asc')->employee()->paginate(2);
        } else if(filter_input(INPUT_GET, 'att_id')){
            $emps = Employee::where('id', $_GET['att_id'])->orderBy('id', 'asc')->get();
            $stats = [];
        } else {
            $emps = Employee::orderBy('id', 'asc')->paginate(10);
            $stats = [];
        }

        $empData = [
            'stats' => $stats,
            'emps' => $emps,
            'att' => $att,
            'status' => $status
        ];
        return view('home')->with($empData);
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

    public function edit($id) {
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

    public function destroy($id) {
        $emp = Employee::findOrFail($id);
        $emp->delete();

        return redirect('/');
    }

    public function createAtt() {
        // $emps = Employee::select('name')->get()->toArray();
        $status = StatusSearch::pluck('status_name', 'id');
        // $emps = Employee::pluck('name', 'id');
        return view('createAtt', compact('status'));
    }

    public function storeAtt(Request $request) {
        $this->validate($request, [
            'employee_id' => 'required',
            'status_id' => 'required',
            'work_hours' => 'required',
            'day' => 'required'
        ]);

        $emp = Employee::where('name', $request->input('employee_id'))->get();
        // Create Attendance
        $att = new Attendance;
        $stat = new Status;
        $stat_last_id = Status::all()->last()->id;
        
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
        foreach($emp as $em){

            $att->employee_id = $em->id;
        }
        $att->status_id = ($stat_last_id+1);
        $att->work_hours = $request->input('work_hours');
        $att->day = $request->input('day');
        $att->save();
        $stat->save();
        
        return redirect('/');
    }
}
