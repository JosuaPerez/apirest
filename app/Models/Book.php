<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function getDescriptionAttribute($value): string
    {
        return substr($value, 1, 120);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
