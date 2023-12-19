<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Successfully retrieved departments',
            'departments' => $departments
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department([
            'TenPB' => $request->get('TenPB')
        ]);

        $department->save();
        
        return response()->json([
            'statusCode' => 201,
            'message' => 'Department created successfully',
            'department' => $department
        ], 201);
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
        $department = Department::find($id);

        if (!$department) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Department not found'
            ], 404);
        }

        $department->TenPB = $request->get('TenPB');
        $department->save();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Department updated successfully',
            'department' => $department
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Department not found'
            ], 404);
        }

        $department->delete();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Department deleted successfully'
        ], 200);
    }
}
