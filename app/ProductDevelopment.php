<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDevelopment extends Model
{
  public function dokumentasipd()
  {
    return $this->hasMany('App\DokumentasiPd', 'product_development_id');
  }
  public function mockuppd($value='')
  {
    return $this->hasMany('App\mockuppd', 'product_development_id');
  }
}
