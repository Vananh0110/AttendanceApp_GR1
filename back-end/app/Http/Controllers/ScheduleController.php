<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }

    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return response()->json($schedule);
    }

    public function store(Request $request)
    {
        $schedule = Schedule::create($request->all());
        return response()->json($schedule, 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());
        return response()->json($schedule, 200);
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return response()->json(null, 204);
    }

    public function getSchedulesByTeacherEmail(Request $request, $userEmail)
    {
        // Sử dụng câu truy vấn PostgreSQL với DISTINCT
        $schedules = DB::select('
            SELECT DISTINCT cr.course_name, cr.course_code, c.clazz_code, s.day_of_week, s.start_time, s.end_time, cr.course_name, s.destination
            FROM schedules s
            JOIN clazzes c ON s.clazz_id = c.id
            JOIN teachers t ON c.teacher_id = t.id
            JOIN courses cr ON c.course_id = cr.id
            WHERE t.teacher_email = ?
            ORDER BY s.day_of_week, s.start_time
        ', [$userEmail]);

        return response()->json($schedules);
    }

    public function getSchedulesByTeacherEmailAndDate(Request $request, $userEmail, $date)
    {
        // Sử dụng câu truy vấn PostgreSQL với DISTINCT
        $schedules = DB::select('
            SELECT cr.course_name, cr.course_code, c.clazz_code, s.start_time, s.end_time, s.destination, s.clazz_date
            FROM schedules s
            JOIN clazzes c ON s.clazz_id = c.id
            JOIN teachers t ON c.teacher_id = t.id
            JOIN courses cr ON c.course_id = cr.id
            WHERE t.teacher_email = ? AND s.clazz_date = ?
            ORDER BY s.start_time
        ', [$userEmail, $date]);

        return response()->json($schedules);
    }
}
