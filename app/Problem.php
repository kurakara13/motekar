<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Problem extends Model
{
    protected $table = "problems";
    protected $primaryKey = 'problem_id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function interests(){
      return $this->hasMany('App\ProblemInterest', 'problem_id', 'problem_id');
    }

    public function units(){
      return $this->belongsTo('App\Unit', 'unit_id');
    }
}
