<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    protected $customErrorMessages = [
        'PasswordNV.required' => 'The PasswordNV field is required.',
        'TenNV.required' => 'The TenNV field is required.',
        'DiachiNV.required' => 'The DiachiNV field is required.',
        'NgaysinhNV.required' => 'The NgaysinhNV field is required.',
        'EmailNV.required' => 'The EmailNV field is required.',
        'PhanquyenNV.required' => 'The PhanquyenNV field is required.',
        'ChucvuNV.required' => 'The ChucvuNV field is required.',
        'MaPB.required' => 'The MaPB field is required.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::with('department')->get();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Successfully retrieved staffs',
            'staffs' => $staffs
        ], 200);
    }

    public function getStaffsByDepartment($id)
    {
        $staffs = User::where('MaPB', $id)->with('department')->get();
        return response()->json([
            'statusCode' => 200,
            'message' => 'Successfully retrieved staffs',
            'staffs' => $staffs
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
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'PasswordNV' => 'required',
            'TenNV' => 'required',
            'DiachiNV' => 'required',
            'NgaysinhNV' => 'required',
            'EmailNV' => 'required',
            'PhanquyenNV' => 'required',
            'ChucvuNV' => 'required',
            'MaPB' => 'required',
        ], $this->customErrorMessages);

        if ($validator->fails()) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Invalid data',
                'errors' => $validator->errors()
            ], 400);
        }

        $staff = User::create([
            'PasswordNV' => Hash::make($request->get('PasswordNV')),
            'TenNV' => $request->get('TenNV'),
            'DiachiNV' => $request->get('DiachiNV'),
            'NgaysinhNV' => $request->get('NgaysinhNV'),
            'EmailNV' => $request->get('EmailNV'),
            'PhanquyenNV' => $request->get('PhanquyenNV'),
            'ChucvuNV' => $request->get('ChucvuNV'),
            'MaPB' => $request->get('MaPB')
        ]);

        return response()->json([
            'statusCode' => 201,
            'message' => 'Staff created successfully',
            'staff' => $staff
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
        // Update method
        $staff = User::find($id);

        if (!$staff) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Staff not found'
            ], 404);
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'PasswordNV' => 'required',
            'TenNV' => 'required',
            'DiachiNV' => 'required',
            'NgaysinhNV' => 'required',
            'EmailNV' => 'required',
            'PhanquyenNV' => 'required',
            'ChucvuNV' => 'required',
            'MaPB' => 'required',
        ], $this->customErrorMessages);

        if ($validator->fails()) {
            return response()->json([
                'statusCode' => 400,
                'message' => 'Invalid data',
                'errors' => $validator->errors()
            ], 400);
        }

        $staff->update([
            'PasswordNV' => Hash::make($request->get('PasswordNV')),
            'TenNV' => $request->get('TenNV'),
            'DiachiNV' => $request->get('DiachiNV'),
            'NgaysinhNV' => $request->get('NgaysinhNV'),
            'EmailNV' => $request->get('EmailNV'),
            'PhanquyenNV' => $request->get('PhanquyenNV'),
            'ChucvuNV' => $request->get('ChucvuNV'),
            'MaPB' => $request->get('MaPB')
        ]);

        return response()->json([
            'statusCode' => 200,
            'message' => 'Staff updated successfully',
            'staff' => $staff
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
        // Delete method
        $staff = User::find($id);

        if (!$staff) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Staff not found'
            ], 404);
        }

        $staff->delete();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Staff deleted successfully'
        ], 200);
    }
}
