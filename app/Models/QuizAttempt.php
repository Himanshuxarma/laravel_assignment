<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
	public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id',
        'status'
    ];
}
