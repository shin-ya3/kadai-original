<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['name'];
    
    public function threads()
    {
      return $this->hasMany(Thread::class);
    }
}
