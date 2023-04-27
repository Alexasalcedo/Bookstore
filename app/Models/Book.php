<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\BookFactory;

class Book extends Model
{
    use SoftDeletes;
    
    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }

    protected static function Factory(): Factory
    {
        return BookFactory::new();
    }
}
