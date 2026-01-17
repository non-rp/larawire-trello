<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    protected $fillable = ['title'];
    public function groups(): hasMany
    {
        return $this->hasMany(Group::class)->orderBy('sort');
    }
    public function cards(): hasMany
    {
        return $this->hasMany(Card::class)->orderBy('sort');
    }
}
