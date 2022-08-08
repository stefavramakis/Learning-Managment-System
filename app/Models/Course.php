<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'authorname', 'description',
    ];

    protected $table = 'courses';

    public function seafarers()
    {
        return $this->belongsToMany(Seafarer::class, 'completion', 'course_id');
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

    public function completions()
    {
        return $this->hasMany(Completion::class);
    }
}
