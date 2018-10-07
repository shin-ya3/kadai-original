<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'name','board_id'];
    
    public function board()
    {
      return $this->belongsTo(Board::class);
    }
    
    public function posts()
    {
      return $this->hasMany(Post::class);
    }
}