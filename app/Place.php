<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function codes()
  {
    return $this->hasMany('App\Code', 'redimed_place_id');
  }
}
