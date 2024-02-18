<?php

namespace App\Models;

use App\Casts\CustomDateTimeCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => CustomDateTimeCast::class
    ];

    public function scopeSort($query, $sortKey)
    {
        return match ($sortKey) {
            'latest' => $query->latest(),
            'oldest' => $query->orderBy('created_at', 'asc'),
            'completed' => $query->orderByRaw('done_at is null')->latest(),
            'in-progress' => $query->orderByRaw('done_at is not null')->latest(),
            default => $query->latest()
        };
    }

}
