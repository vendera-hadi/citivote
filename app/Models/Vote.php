<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  protected $fillable = [
      'user_id', 'candidate_id', 'vote_category_id'
  ];

  public function user()
  {
     return $this->belongsTo('App\Models\User');
  }

  public function candidate()
  {
     return $this->belongsTo('App\Models\User');
  }

  public function category()
  {
     return $this->belongsTo('App\Models\VoteCategory');
  }
}
