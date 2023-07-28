<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    public function store(Request $request)
    {
        $attendance = Attendance::create($request->all());
        return response()->json($attendance, 201);
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());
        return response()->json($attendance, 200);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(null, 204);
    }
}
