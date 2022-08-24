<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function subComment() {
        return $this->hasOne(self::class, 'parent_id')->first();
    }
}
