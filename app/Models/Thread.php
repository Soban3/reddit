<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Awobaz\Compoships\Compoships;

class Thread extends Model
{
    use HasFactory, Compoships;

    public function comments() {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function subComment() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function commentsWithSubComment() {
        return $this->comments()->subComment();
    }
}
