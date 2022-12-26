<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Throwable;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $emp = Employee::paginate(10);
        } catch(Throwable $e) {
            report($e);
            return false;
        }
        return view('employee.index', ['emp' => $emp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $emp = new Employee();
        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->save();

        return redirect()->back()->with('message', 'Successfully Created Employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StoreEmployeeRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request)
    {
        Employee::find($request->emp_id)->update([
            'first_name' => $request->update_first_name,
            'last_name' => $request->update_last_name,
        ]);
        return redirect()->back()->with('message', 'Successfully Updated Employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Employee::find($request->delete_emp_id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted Employee');
    }
}
