<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::get();

        return response()->json([
            'message' => 'Successed',
            'data' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Students::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'message' => 'students added',
            'data' => $student
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        return response()->json([
            'message' => 'Successed',
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $student)
    {
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        return response()->json([
            'message' => 'student updated.',
            'data' => $student,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'student deleted.'
        ]);
    }
}
