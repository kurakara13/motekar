<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemInterest extends Model
{
    protected $table = "problem_interests";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function problem()
    {
        return $this->belongsTo('App\Problem', 'problem_id');
    }
}
