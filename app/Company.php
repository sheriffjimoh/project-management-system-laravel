<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
       protected $fillable = [
         'name',
         'description',
         'photos',
          'user_id',
          'created_at',
          'updated_at'

    ];

     public function user()
    {
       return $this->belongsTo('App\User');
    }

     public function projects()
    {
       return $this->hasMany('App\Project');
    }
}
