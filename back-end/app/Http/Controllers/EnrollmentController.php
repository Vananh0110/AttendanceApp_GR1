<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::all();
        return response()->json($enrollments);
    }

    public function show($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        return response()->json($enrollment);
    }

    public function store(Request $request)
    {
        $enrollment = Enrollment::create($request->all());
        return response()->json($enrollment, 201);
    }

    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());
        return response()->json($enrollment, 200);
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();
        return response()->json(null, 204);
    }
}
