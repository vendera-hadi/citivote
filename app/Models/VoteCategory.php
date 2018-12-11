<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteCategory extends Model
{
  protected $fillable = [
      'name', 'max', 'description'
  ];

  public function votes()
  {
      return $this->hasMany('App\Models\Vote');
  }
}
