<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
