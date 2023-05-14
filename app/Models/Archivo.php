<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'hash',
        'nombre',
        'extension',
        'mime',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(book::class);
    }
}
