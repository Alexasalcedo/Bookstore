<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\BookFactory;

class Book extends Model
{
    use SoftDeletes;

    public function archivo(): HasOne
    {
        return $this->hasOne(Archivo::class);
    }
    
    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }

    public function categories(): BelongsToMany 
    {
        return $this->BelongsToMany(Category::class);
    }

    protected static function Factory(): Factory
    {
        return BookFactory::new();
    }
}
