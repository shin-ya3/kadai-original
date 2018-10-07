<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'post', 'visitor'. 'thread_id'];
    
    public function thread()
    {
      return $this->belongsTo(Thread::class);
    }
}
