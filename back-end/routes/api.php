<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClazzController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('semesters', SemesterController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('students', StudentController::class);
Route::apiResource('clazzes', ClazzController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::get('/getStudentListByClazzCode/{clazzCode}', [EnrollmentController::class, 'getStudentListByClazzCode']);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('attendances', AttendanceController::class);
Route::apiResource('roles', RoleController::class);
Route::get('/getSchedulesByTeacherEmail/{userEmail}', [ScheduleController::class, 'getSchedulesByTeacherEmail']);
Route::get('/getSchedulesByTeacherEmailAndDate/{userEmail}/{date}', [ScheduleController::class, 'getSchedulesByTeacherEmailAndDate']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
