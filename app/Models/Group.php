<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $fillable = ['name', 'sort'];
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class)->orderBy('sort');
    }
}
