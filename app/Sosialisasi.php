<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sosialisasi extends Model
{
    protected $table = 'sosialisasi';
    public function image($value='')
    {
      return $this->hasMany('App\SosialisasiImage', 'sosialisasi_id');
    }
    public function like($value='')
    {
      return $this->hasMany('App\Like', 'sosialisasi_id');
    }

    public function comment()
    {
      return $this->hasMany('App\Comments', 'sosialisasi_id');
    }
    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
