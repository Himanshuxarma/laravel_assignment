<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizDetails extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'question_id',
        'is_reviewed',
        'is_attempted',
        'is_correct',
        'status'
    ];
}
