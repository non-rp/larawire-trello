<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    protected $fillable = ['group_id', 'title', 'sort'];
    public function group(): belongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
