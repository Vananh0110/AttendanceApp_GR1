<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    protected $fillable = [
        'clazz_id',
        'student_id',
        'teacher_id',
        'face_image',
        'attendance_date',
        'attendance_time',
    ];

    public function clazz()
    {
        return $this->belongsTo(Clazz::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
