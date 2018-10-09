<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['name', 'comment', 'ip', 'thread_id','inner_id'];
    
    protected $hidden = ['password','remember_token'];
    
    public function thread()
    {
      return $this->belongsTo(Thread::class);
    }
}
