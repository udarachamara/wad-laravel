<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeSaveRequest;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::get();
        return view('pages.employee.all_employees', ['employeeData' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        $action = ['url' => '/employee', 'method' => 'POST'];
        return view('pages.employee.show_employee',
            [
                'edit' => true,
                'action' => (object) $action,
                'companies' => $companies
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EmployeeSaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeSaveRequest $request)
    {
        $filePath = "";
        try {
            try {
                if(isset($request->profile_photo)){
                    $profilePhoto = time().'_'.$request->profile_photo;
                    $filePath = $request->file('profile_photo')->storeAs('/', $profilePhoto, 'uploads');
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
            $employee = Employee::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_id' => $request->company_id,
                'profile_photo' => $filePath,
                'website' => $request->website
            ]);
            if ($employee) {
                \Session::flash('state', 'Successfully created ..!');
            } else {
                \Session::flash('state', 'Error creating ..!');
            }
        } catch (\Throwable $th) {
            \Session::flash('state', 'Error creating ..!');
        }

        return redirect('employee/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $edit = $request->edit ? true : false;
        $companies = Company::get();
        $action = ['url' => '/employee/'.$id, 'method' => 'PATCH'];
        $employee = Employee::find($id);
        return view('pages.employee.show_employee',
        [
            'id' => $id,
            'employeeData' => $employee,
            'edit' => $edit,
            'action' => (object) $action,
            'companies' => $companies
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EmployeeSaveRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeSaveRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        if(isset($request->profile_photo)){
            $employee->profile_photo = $request->profile_photo;
        }
        $employee->company_id = $request->company_id;
        $employee->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        return $employee->delete();
    }
}
