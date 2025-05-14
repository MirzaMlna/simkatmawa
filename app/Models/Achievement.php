<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'identity_number',
        'name',
        'phone',
        'study_program',
        'achievement_type',
        'program_by',
        'achievement_level',
        'participation_type',
        'execution_model',
        'event_name',
        'participant_count',
        'university_count',
        'nation_count',
        'achievement_title',
        'start_date',
        'end_date',
        'news_link',
        'certificate_file',
        'award_photo_file',
        'student_assignment_letter',
        'supervisor_number',
        'supervisor_assignment_letter',
        'status',
    ];
}
