<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function users()
  {
    return $this->belongsTo('App\User', 'project_owner');
  }
  public function member(){

    return $this->hasMany('App\Member', 'project_id');
  }
  public function unit(){

    return $this->belongsTo('App\Unit', 'unit_id');
  }
  public function paingain()
  {
      return $this->hasOne('App\Paingain','project_id');
  }
  public function userjourney()
  {
      return $this->hasOne('App\UserJourney','project_id');
  }
  public function goldencircle()
  {
      return $this->hasOne('App\Goldencircle','project_id');
  }
  public function summary()
  {
      return $this->hasOne('App\Summary','project_id');
  }
  public function productdevelopment()
  {
      return $this->hasOne('App\ProductDevelopment','project_id');
  }
  public function problem()
  {
      return $this->belongsTo('App\Problem','problem_id');
  }
  public function pilotproject()
  {
      return $this->hasOne('App\PilotProject','project_id');
  }
  public function dasarimplementasi()
  {
    return $this->hasMany('App\DasarImplementasi','project_id');
  }
  public function sosialisasi()
  {
    return $this->hasOne('App\Sosialisasi','project_id');
  }
  public function impact()
  {
    return $this->hasMany('App\Impact','project_id');
  }
}
