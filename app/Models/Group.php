<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $fillable = ['title', 'sort', 'board_id'];
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class)->orderBy('sort');
    }

    public function board(): belongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
